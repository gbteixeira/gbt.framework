<?php

include(explode(DIRECTORY_SEPARATOR . "m" . DIRECTORY_SEPARATOR, dirname(__FILE__), 2)[0] . "/config/config.php");
include(DirectoryRoot . "/verifica.php");


$clienteSistemaID = $oUsuarioLogado->ClienteSistemaID;

$oCliente = new tclientesistema();
$oCliente->LoadByClienteSistemaID($clienteSistemaID);

$img = Util::Thumbnail($oCliente->Imagem, 120, 120, "", false, true);

$oNews = new tnews();
$oNews->SQLWhere = "ClienteSistemaID = '" . $clienteSistemaID . "'";
$oNews->SQLOrder = "DataEscrita DESC";
$beditar = $oNews->LoadSQLAssembled();

$DataHoje = date("d/m/Y");

$oMaster = new Master();
$oMaster->Init(DirectoryRoot . "/padrao.php");
$oMaster->Open("PageContent");
?>
<center>
  <img src="<?= $img ?>"  style="margin-top:6%">
</center>
<?php
for($i = 0; $i < $oNews->NumRows; $i++){
  if($DataHoje == $oNews->DataApagar){
    $oNews->DeleteByID($oNews->ID);
  }
  ?>
  <div class="panel panel-default"  style="margin-top:2%">
    <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">
          <b><h4><?= $oNews->Titulo ?></h4></b>
        </div>
        <div class="col-md-1">

        </div>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-10">
        <?= $oNews->Mensagem ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <?php
        $arrArquivo = array();

        $oNewsArquivo = new tnewsarquivo();
        $oNewsArquivo->LoadByNewsID($oNews->ID);

        for ($c = 0; $c < $oNewsArquivo->NumRows; $c++) {
          $arrArquivo[] = array(
            "FilePath" => $oNewsArquivo->Arquivo,
            "FileName" => $oNewsArquivo->Nome
          );

          $oNewsArquivo->MoveNext();
        }

        for ($c = 0; $c < count($arrArquivo); $c++) {
          $FilePath = $arrArquivo[$c]["FilePath"];
          $FileName = $arrArquivo[$c]["FileName"];

          $imgCP = Util::Thumbnail($FilePath, 320, 320, "", false, true);

         ?>
      <a href="<?= $imgCP ?>"><img src="<?= $imgCP ?>" style="margin-top:10px; margin-bottom:10px; margin-left: 5px"></a>
      <?php } ?>
        </div>
      </div>
      <hr style="color: #000">
      <div class="row">
        <div class="col-md-6">
          Data de publicação: <?= $oNews->DataEscrita ?>
        </div>
      </div>
    </div>
  </div>

<?php
$oNews->MoveNext();
}

$oMaster->Close("PageContent");
$oMaster->End();

?>
