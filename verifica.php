<?php

include(explode(DIRECTORY_SEPARATOR . "m" . DIRECTORY_SEPARATOR, dirname(__FILE__), 2)[0] . "/config/config.php");

// Verificar autenticação do usuário

$oUsuarioLogado = new tusuario();

if (!$oUsuarioLogado->CheckAuthentication()) {
	header("Location: " . WebURL . "login.php?u=" . urlencode($_SERVER["REQUEST_URI"]));
	exit();
}

// Verificar cliente ativo

$oClienteSistema = new tclientesistema();
$oClienteSistema->LoadByClienteSistemaID($oUsuarioLogado->ClienteSistemaID);

if (!$oClienteSistema->Ativo) {
	header("Location: " . WebURL . "login.php?u=" . urlencode($_SERVER["REQUEST_URI"]));
	exit();
}

// Verificar permissão do usuário

$arrPermissaoRecurso = array();

//if (strstr($_SERVER["SCRIPT_NAME"], "/m/")) {
	//$arTmp = explode("/m/", $_SERVER["SCRIPT_NAME"], 2);

if (strstr($_SERVER[REQUEST_URI], "/m/")) {
	$arTmp = explode("/m/", $_SERVER[REQUEST_URI], 2);
	$arTmp = explode("/", $arTmp[1]);

	unset($arTmp[count($arTmp) - 1]);

	define("CHAVE_N1", $arTmp[0]);  // Raiz
	define("CHAVE_N2", $arTmp[1]);  // Nível 1
	define("CHAVE_N3", $arTmp[2]);  // Nível 2
	define("CHAVE_N4", $arTmp[3]);  // Nível 3
	define("CHAVE_N5", $arTmp[4]);  // Nível 4
	define("CHAVE_N6", $arTmp[5]);  // Nível 5
	define("CHAVE_N7", $arTmp[6]);  // Nível 6
	define("CHAVE_N8", $arTmp[7]);  // Nível 7
	define("CHAVE_N9", $arTmp[8]);  // Nível 8
	define("CHAVE_N10", $arTmp[9]); // Nível 9
	define("CHAVE_COMPLETA", "m/" . implode("/", $arTmp));

	$oPermissaoMenu = new tpermissaomenu();
	$oPermissaoMenu->LoadByUsuarioIdAndChaveSet($oUsuarioLogado->ID, $arTmp);

	$acessoNegado = false;
	$PaiId = null;

/*	for($d = count($arTmp) - 1; $d >= 0; $d--) {
		$oPermissaoMenu->Rewind();

		for($a = 0; $a < $oPermissaoMenu->NumRows; $a++) {
			if($oPermissaoMenu->Chave == $arTmp[$d] && $PaiId == null) {
				$PaiId = $oPermissaoMenu->PermissaoMenuPaiID;
				break;
			}
			else if($oPermissaoMenu->Chave == $arTmp[$d] && $oPermissaoMenu->ID == $PaiId) {
				if($oPermissaoMenu->PermissaoMenuPaiID != null) {
					$PaiId = $oPermissaoMenu->PermissaoMenuPaiID;
				}

				break;
			}
			else {
				$PaiId = null;
			}

			$oPermissaoMenu->MoveNext();
		}

		if($PaiId == null) {
			$acessoNegado = true;
			break;
		}
	}

	if($acessoNegado) {
		$oPermissaoMenu->SetMessage("warning", "Você não tem permissão para acessar essa ferramenta.");
		header("Location: " . WebURL);
		exit();
	}*/
}
else {
	define("CHAVE_N1", "");
	define("CHAVE_N2", "");
	define("CHAVE_N3", "");
	define("CHAVE_N4", "");
	define("CHAVE_N5", "");
	define("CHAVE_N6", "");
	define("CHAVE_N7", "");
	define("CHAVE_N8", "");
	define("CHAVE_N9", "");
	define("CHAVE_N10", "");
	define("CHAVE_COMPLETA", "");
}
