<?php

class tusuario extends MySQL
{
	protected $TableName = "tusuario";
	protected $Fields = array("ID", "Nome", "Email", "Login", "Senha", "Ativo", "ClienteSistemaID", "CargoID", "Telefone", "Processo");
	public $ID, $Nome, $Email, $Login, $Senha, $Ativo, $ClienteSistemaID, $CargoID, $Telefone ,$Processo;
	protected $TimeOutSession = 1800; // 600 = 10 minutos

	/**
	 * Construtor da classe
	 */
	public function __construct()
	{
		parent::MySQL();
	}

	//private $SessionName = SessionName;

	/**
	 * Autenticação
	 *
	 * @access public
	 * @param string $Login
	 * @param string $Senha
	 * @return bool
	 */
	public function Authentication($Login, $Senha)
	{
		/*VERIFICA CLIENTE ATIVO*/
		$clienteSistemaID = explode("@", $Login)[1];
		$oClienteSistema = new tclientesistema();
		if(!($oClienteSistema->LoadByClienteSistemaID($clienteSistemaID) && $oClienteSistema->Ativo == "1"))
		{
			return false;
		}

		/*FIM VERIFICA CLIENTE ATIVO*/

		if($this->LoadSQL("call UsuarioAuthentication('" . $Login . "', '" . md5($Senha) . "', '" . $_SERVER["REMOTE_ADDR"] . "')"))
		{
			$_SESSION[SessionName]["UsuarioID"] = $this->ID;
			$_SESSION[SessionName]["ClienteSistemaID"] = $oClienteSistema->ID;
			$_SESSION[SessionName]["TimeOutSession"] = time() + $this->TimeOutSession;

			return true;
		}

		return false;
	}

	/**
	 * Verifica autenticação
	 *
	 * @access public
	 * @return bool
	 */
	public function CheckAuthentication() {
		if (time() >= intval($this->GetSession("TimeOutSession"))) {
			if(AppDebug) {
				$_SESSION[SessionName]["TimeOutSession"] = time() + $this->TimeOutSession;
			} else {
				return false;
			}
		} else {
			$_SESSION[SessionName]["TimeOutSession"] = time() + $this->TimeOutSession;
		}

		$this->SQLField = "*, UsuarioLastAccess(ID) AS UltimoAcesso";
		$this->SQLWhere = "tusuario.ClienteSistemaID = '" . intval(Util::GetSession("ClienteSistemaID")) . "'";
		return ($this->LoadByPrimaryKey(Util::GetSession("UsuarioID")) && $this->Ativo);
	}

	/**
	 * Logout
	 *
	 * @access public
	 * @return void
	 */
	public function Logout() {
		unset($_SESSION[SessionName]);
	}

	/**
	 * Carrega o usuario pelo login
	 *
	 * @access public
	 * @param string $Login
	 * @return bool
	 */
	public function LoadByLogin($Login)
	{
		$this->SQLWhere = "ClienteSistemaID = '" . intval(Util::GetSession("ClienteSistemaID")) . "' AND Login = '" . $Login . "'";
		return $this->LoadSQLAssembled();
	}

	public function LoadByProcesso($Processo)
	{
		$this->SQLWhere = "Processo = '" . $Processo . "' AND ClienteSistemaID = '" . intval(Util::GetSession("ClienteSistemaID")) . "' ";
		return $this->LoadSQLAssembled();
	}

	/**
	 * Carrega o usuario pelo login e ativo
	 *
	 * @access public
	 * @param string $Login
	 * @param bool $Ativo (Default: true)
	 * @return bool
	 */
	public function LoadByLoginAndAtivo($Login, $Ativo = true)
	{
		$this->SQLWhere = "Login = '" . $Login . "' AND " . (($Ativo) ? "Ativo = 1" : "(Ativo != 1 OR Ativo IS NULL)");
		return $this->LoadSQLAssembled();
	}

	public function LoadByUsuarioAndPermissaoMenuID($PermissaoMenuID)
	{
		$this->SQLField = " DISTINCT U.ID, U.Nome, U.Processo ";
		$this->SQLFrom  = " tusuario U ";
		$this->SQLJoin  = " INNER JOIN tusuariopermissaomenu UPM ON U.ID = UPM.UsuarioID ";
		$this->SQLWhere = " U.ClienteSistemaID = '" . Util::GetSession("ClienteSistemaID") . "' AND UPM.PermissaoMenuID = '" . $PermissaoMenuID . "' ";
		return $this->LoadSQLAssembled();
	}

	public $ListaProcesso = array(
		"direcao" => "Direção",
		"qualidade" => "Qualidade",
		"projetos-e-engenharia" => "Projetos e Engenharia",
		"relacionamento-com-clientes" => "Relacionamento com Clientes",
		"compras" => "Compras",
		"infraestrutura" => "Infraestrutura",
		"rh-e-sst" => "RH e SST",
		"planejamento-e-orçamentos" => "Planejamento e Orçamentos",
		"execucao-de-obras-e-ti" => "Execução de Obras e TI"
	);

	public $ListaStatus = array(
		"1" => "Ativo",
		"0" => "Inativo"
	);


}
