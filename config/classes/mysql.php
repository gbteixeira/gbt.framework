<?php

include_once(dirname(__FILE__)."/util.php");

$StoredConnection = null;

abstract class MySQL extends Util
{
    //Dados para a conexão com o banco de dados
    private $DBHost = null;
    private $DBUser = null;
    private $DBPass = null;
    private $DBSchema = null;
    private $DBCharset = null;

    //Objetos do mysql
    private $Connection = null;
    private $Result = null;
    private $IsWarning = false;
    private $StoreConnection = true;

    //Informações
    private $State = null;
    private $InsertID = 0;

    public $PrimaryKey = null;
    public $AffectedRows = 0;
    public $NumRows = 0;
    public $RowsCount = 0;
    public $GeneratedSQL = null;

    //Objetos auxiliares a sql
    public $SQLWhere = null;
    public $SQLGroup = null;
    public $SQLOrder = null;
    public $SQLLimit = null;
    public $SQLTotal = null;
    public $SQLField = null;
    public $SQLFrom = null;
    public $SQLJoin = null;
    public $SQLHaving = null;

    /**
     * Construtor da classe
     *
     * @access public
     * @param string $DBHost (Default: DatabaseHost)
     * @param string $DBUser (Default: DatabaseUser)
     * @param string $DBPass (Default: DatabasePass)
     * @param string $DBSchema (Default: DatabaseSchema)
     * @param string $DBCharset (Default: DatabaseCharset)
     * @param bool $IsWarning (Default: DatabaseIsWarning)
     * @param bool $StoreConnection (Default: DatabaseStoreConnection)
     * @return void
     */
    public function MySQL($DBHost = DatabaseHost, $DBUser = DatabaseUser, $DBPass = DatabasePass, $DBSchema = DatabaseSchema, $DBCharset = DatabaseCharset, $IsWarning = DatabaseIsWarning, $StoreConnection = DatabaseStoreConnection)
    {
        $this->DBHost = $DBHost;
        $this->DBUser = $DBUser;
        $this->DBPass = $DBPass;
        $this->DBSchema = $DBSchema;
        $this->DBCharset = $DBCharset;
        $this->IsWarning = $IsWarning;
        $this->StoreConnection = $StoreConnection;
        $this->PrimaryKey = $this->Fields[0];
    }

    /**
     * Abre conexão com o banco de dados
     *
     * @access private
     * @param bool $IsOpen (Default: false)
     * @return void
     */
    private function OpenConnection($IsOpen = false)
    {
        global $StoredConnection;

        if(!$this->StoreConnection || $StoredConnection == null || $IsOpen)
        {
            $this->Connection = mysqli_connect($this->DBHost, $this->DBUser, $this->DBPass) or die(mysqli_connect_error());
            if($this->DBCharset) mysqli_set_charset($this->Connection, $this->DBCharset);
            mysqli_select_db($this->Connection, $this->DBSchema) or die(mysqli_error($this->Connection));
            $StoredConnection = $this->Connection;
        }
        else
        {
            $this->Connection = $StoredConnection;
        }
    }

    /**
     * Fecha coneção com o banco de dados
     *
     * @access private
     * @param bool $IsOpen (Default: false)
     * @return void
     */
    private function CloseConnection($IsOpen = false)
    {
        global $StoredConnection;

        if(!$this->StoreConnection || $IsOpen)
        {
            $StoredConnection = null;
            mysqli_close($this->Connection);
        }
    }

    /**
     * Mostra warnings
     *
     * @access public
     * @return void
     */
    private function ShowWarnings()
    {
        if($this->IsWarning)
        {
            if(mysqli_warning_count($this->Connection))
            {
                $msg = "";
                if($result = mysqli_query($this->Connection, "SHOW WARNINGS"))
                {
                    $row = mysqli_fetch_row($result);
                    $msg = printf("<br />%s (%d): %s", $row[0], $row[1], $row[2]);
                    mysqli_free_result($result);
                }
                die("SQL: <b>" . $sql . "</b><br /><br />WARNINGS: " . $msg);
            }
        }
    }

    /**
     * Busca valores da coluna da tabela
     *
     * @access private
     * @return array
     */
    private function GetRow()
    {
        $row = array();
        foreach($this->Fields as $value)
        {
            $row[$value] = (($this->{$value} || $this->{$value} == "0") ? '"' . $this->AntiSQLInjection($this->{$value}) . '"' : 'null');
        }
        return $row;
    }

    /**
     * Insere registro na tabela
     *
     * @access private
     * @return int
     */
    private function Insert()
    {
        $row = $this->GetRow();
        unset($row[$this->PrimaryKey]);
        $this->ExecuteSQL("INSERT INTO " . $this->TableName . ' (' . implode(', ', array_keys($row)) . ') ' . 'VALUES (' . implode(', ', array_values($row)) . ')');
        $this->{$this->PrimaryKey} = $this->InsertID;
        $this->State = "U";
        return $this->InsertID;
    }

    /**
     * Altera registro na tabela
     *
     * @access private
     * @return int
     */
    private function Update()
    {
        $set = array();
        $row = $this->GetRow();
        foreach ($row as $col => $val)
        {
            array_push($set, $col . " = " . $val);
        }
        $this->ExecuteSQL("UPDATE " . $this->TableName . " SET " . implode(', ', $set) . " WHERE " . $this->TableName . "." . $this->PrimaryKey . " = '" . $this->AntiSQLInjection($this->{$this->PrimaryKey}) . "'");
        return $this->AffectedRows;
    }

    /**
     * Deleta registro na tabela
     *
     * @access private
     * @return int
     */
    private function Delete()
    {
        $this->ExecuteSQL("DELETE FROM " . $this->TableName . " WHERE " . $this->TableName . "." . $this->PrimaryKey . " = '" . $this->AntiSQLInjection($this->{$this->PrimaryKey}) . "'");
        return $this->AffectedRows;
    }

    /**
     * Preenche objeto com o resultado
     *
     * @access private
     * @return array
     */
    private function FillObject()
    {
        foreach($this->Fields as $c)
        {
            $this->{$c} = null;
        }

        $Data = mysqli_fetch_array($this->Result);
        if(is_array($Data))
        {
            foreach($Data as $c => $v)
            {
                $this->{$c} = $v;
            }
        }
        return $Data;
    }

    /**
     * Filtra linha e coluna no MYSQLI
     *
     * @access private
     * @param result $rs
     * @param int $row
     * @param int $field
     * @return mixed
     */
    private function mysqli_result($rs, $row = 0, $field = 0)
    {
        if(mysqli_data_seek($rs, $row))
        {
            $row = mysqli_fetch_array($rs);
            return $row[$field];
        }

        return false;
    }

    /**
     * Evita sql injection
     *
     * @access private
     * @param string $string
     * @return string
     */
    private function AntiSQLInjection($string)
    {
        $string = get_magic_quotes_gpc() ? stripslashes($string) : $string;
        return $string;
    }

    /**
     * Executa sql
     *
     * @access public
     * @param string $sql
     * @return resource
     */
    public function ExecuteSQL($sql)
    {
        $IsOpen = (strpos($sql, "call ") === 0);

        $this->OpenConnection($IsOpen);
        $this->GeneratedSQL = $sql;
        $rs = mysqli_query($this->Connection, $sql) or Util::SetMessage("danger", (mysqli_errno($this->Connection) == "1451") ? "O registro está sendo usado em outros cadastros." : mysqli_error($this->Connection) . " (Code: ".mysqli_errno($this->Connection) . ")" , "Erro!") /*die("SQL: <b>" . $sql . "</b><br /><br />ERROR: <b>" . mysqli_error($this->Connection) . "</b>")*/;
        $this->ShowWarnings();
        $this->AffectedRows = mysqli_affected_rows($this->Connection);
        $this->InsertID = mysqli_insert_id($this->Connection);
        $this->CloseConnection($IsOpen);
        return $rs;
    }

    /**
     * Move ponteiro para posição desejada
     *
     * @access public
     * @param int $OffSet (Default: 0)
     * @return bool
     */
    public function DataSeek($OffSet = 0)
    {
        if($OffSet < $this->NumRows && $OffSet >= 0)
        {
            $b = mysqli_data_seek($this->Result, $OffSet);
            $this->FillObject();
            return $b;
        }
        else
        {
            return false;
        }
    }

    /**
     * Move para a próxima posição
     *
     * @access public
     * @return array
     */
    public function MoveNext()
    {
        return $this->FillObject();
    }

    /**
     * Move para a posição inicial
     *
     * @access public
     * @return bool
     */
    public function Rewind()
    {
        return $this->DataSeek();
    }

    /**
     * Busca linha e coluna específica do resultado
     *
     * @access public
     * @param int $Row (Default: 0)
     * @param int $Field (Default: 0)
     * @return string
     */
    public function ResultField($Row = 0, $Field = 0)
    {
        return $this->mysqli_result($this->Result, $Row, $Field);
    }

    /**
     * Define ação para inserir registro
     *
     * @access public
     * @return void
     */
    public function AddNew()
    {
        $this->State = "I";
    }

    /**
     * Define ação para alterar registro
     *
     * @access public
     * @return void
     */
    public function MarkAsUpdate()
    {
        $this->State = "U";
    }

    /**
     * Define ação para remover registro
     *
     * @access public
     * @return void
     */
    public function MarkAsDelete()
    {
        $this->State = "D";
    }

    /**
     * Executa ação definida (INSERT/UPDATE/DELETE)
     *
     * @access public
     * @return int
     */
    public function Save()
    {
        switch (strtoupper($this->State))
        {
            case "I":
                return $this->Insert();
                break;
            case "D":
                return $this->Delete();
                break;
            case "U":
                return $this->Update();
                break;
            default:
                throw new Exception("Necessário definir uma ação antes de salvar.");
                break;
        }
    }

    /**
     * Carrega sql
     *
     * @access public
     * @param string $ID
     * @return bool
     */
    public function LoadSQL($sql)
    {
        $this->Result = $this->ExecuteSQL($sql);
        $this->State = "U";
        $this->NumRows = mysqli_num_rows($this->Result);
        $this->RowsCount = $this->NumRows;
        $this->FillObject();
        return ($this->NumRows > 0);
    }

    /**
     * Gera sql auxiliar
     *
     * @access public
     * @return bool
     */
    public function LoadSQLAssembled()
    {
        // ---------------------------------------------------------------
        // Início: Controle de desenvolvimento
        // Verificar se o ClienteSistemaID foi informado no WHERE da query

        /*if (AppDebug) {
            $callers = debug_backtrace();
            $callers = (array) $callers[0]["object"];

            if (array_key_exists("ClienteSistemaID", $callers) && !strstr($this->SQLWhere, "ClienteSistemaID")) {
                echo "<h1>Atenção programador: O campo ClienteSistemaID não foi informado!</h1>";
                echo "<pre>"; print_r(array_reverse(debug_backtrace())); die("</pre>");
            }
        }*/
        // Fim: Controle de desenvolvimento
        // ---------------------------------------------------------------

        $sql = " SELECT " .
            (($this->SQLField) ? $this->SQLField : $this->TableName . ".*") .
            " FROM " .
            (($this->SQLFrom) ? $this->SQLFrom : $this->TableName) .
            " " . $this->SQLJoin .
            (($this->SQLWhere) ? " WHERE " . $this->SQLWhere : "") .
            (($this->SQLGroup) ? " GROUP BY " . $this->SQLGroup : "") .
            (($this->SQLHaving) ? " HAVING " . $this->SQLHaving : "") .
            (($this->SQLOrder) ? " ORDER BY " . $this->SQLOrder : "") .
            (($this->SQLTotal) ? " LIMIT " . (($this->SQLLimit) ? $this->SQLLimit : 0) . ", " . $this->SQLTotal : "");

        return $this->LoadSQL($sql);
    }

    /**
     * Carrega registro pela chave primária
     *
     * @access public
     * @param int $ID
     * @return bool
     */
    public function LoadByPrimaryKey($ID)
    {
        $sWhere = $this->TableName . "." . $this->PrimaryKey . " = '" . $this->AntiSQLInjection(intval($ID)) . "'";

        if ($this->SQLWhere) $this->SQLWhere.= " AND " . $sWhere;
        else $this->SQLWhere = $sWhere;

        $sRet = $this->LoadSQLAssembled();
        $this->SQLWhere = "";
        return $sRet;
    }

    /**
     * Carrega registros com paginação
     *
     * @access public
     * @param int $Limit
     * @param int $Total
     * @return bool
     */
    public function LoadByPaginator($Limit, $Total)
    {
        $this->SQLLimit = intval($Limit);
        $this->SQLTotal = intval($Total);
        return $this->LoadSQLAssembled();
    }

    /**
     * Carrega o total de registros encontrados
     *
     * @access public
     * @return int
     */
    public function GetCount()
    {
        $sField = $this->SQLField;
        $sGroup = $this->SQLGroup;

        $this->SQLField = "COUNT(" . (($this->SQLField) ? "*" : $this->TableName . "." . $this->PrimaryKey) . ")";
        $this->SQLGroup = null;
        $this->LoadSQLAssembled();

        $this->SQLField = $sField;
        $this->SQLGroup = $sGroup;

        return intval($this->ResultField());
    }

    /**
     * Carrega a ordem na tabela
     *
     * @access public
     * @param string $Where (Default: null)
     * @param string $Field (Default: "Ordem")
     * @return int
     */
    public function GetOrdem($Where = null, $Field = "Ordem")
    {
        $rs = $this->ExecuteSQL("SELECT (" . $Field . " + 1) AS " . $Field . " FROM " . $this->TableName . (($Where) ? " WHERE " . $Where : "") . " ORDER BY " . $Field . " DESC Limit 0,1");
        return (($this->AffectedRows > 0) ? intval($this->mysqli_result($rs)) : 1);
    }

    /**
     * Altera a ordem na tabela
     *
     * @access public
     * @param bool $IsDown (Default: false)
     * @param string $Where (Default: null)
     * @param string $Field (Default: "Ordem")
     * @return void
     */
    public function SetOrdem($IsDown = false, $Where = null, $Field = "Ordem")
    {
        if($this->NumRows > 0)
        {
            $oTableName = new $this->TableName();
            $oTableName->SQLOrder = $Field . (($IsDown) ? " DESC " : " ASC ");
            $oTableName->SQLWhere = $Field . (($IsDown) ? " < " : " > ") . " '" . $this->{$Field} . "'" . (($Where) ? " AND " . $Where : "");
            if($oTableName->LoadByPaginator(0, 1))
            {
                $ordem2 = $oTableName->{$Field};
                $ordem = $this->{$Field};

                $this->{$Field} = $ordem2;
                $this->Save();

                $oTableName->{$Field} = $ordem;
                $oTableName->Save();
            }
        }
    }

    /**
     * Gera referencia
     *
     * @access public
     * @param string $Where
     * @param string $FieldBase (Default: "Titulo")
     * @param string $FieldReference (Default: "Referencia")
     * @return string
     */
    public function GenerateReference($Where = null, $FieldBase = "Titulo", $FieldReference = "Referencia")
    {
        $Reference = Util::PrepareToURL($this->{$FieldBase});

        $oTableName = new $this->TableName();
        if($oTableName->LoadByReference($Reference, $Where, $FieldReference))
        {
            if($oTableName->{$oTableName->PrimaryKey} !== $this->{$this->PrimaryKey})
            {
                return false;
            }
        }

        return $Reference;
    }

    /**
     * Carrega registro pela referencia
     *
     * @access public
     * @param string $Reference
     * @param string $Where
     * @param string $FieldReference (Default: "Referencia")
     * @return bool
     */
    public function LoadByReference($Reference, $Where = null, $FieldReference = "Referencia")
    {
        $this->SQLWhere = $this->TableName . "." . $FieldReference . " = '" . $this->AntiSQLInjection($Reference) . "'" . (($Where) ? " AND " . $Where : "");
        $sRet = $this->LoadSQLAssembled();
        $this->SQLWhere = "";
        return $sRet;
    }
}

?>
