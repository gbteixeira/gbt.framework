<?php

include(explode(DIRECTORY_SEPARATOR . "m" . DIRECTORY_SEPARATOR, dirname(__FILE__), 2)[0] . "/config/config.php");
include(DirectoryRoot . "/verifica.php");

// Funções para construção do menu

function MenuTemFilho(&$arrPermissaoMenu, $PermissaoMenuPaiID)
{
	foreach ($arrPermissaoMenu as $arrN1) {
		if($arrN1["PermissaoMenuPaiID"] == $PermissaoMenuPaiID){
			return true;
		}
	}

	return false;
}

function CriarItemMenu(&$hMenu, $url, &$arrPermissaoMenu, $arr, $primeiroFilho = false)
{
	$divider = "<li class=\"divider\"></li>";
	$id = $arr["ID"];
	$titulo = $arr["Titulo"];

	if($primeiroFilho && MenuTemFilho($arrPermissaoMenu, $id)) {
		$hMenu .= "<ul class=\"dropdown-menu multi-level\">\n";

		foreach ($arrPermissaoMenu as $index => $arrInterno) {
			if($arrInterno["PermissaoMenuPaiID"] != $id) {
				continue;
			}

			CriarItemMenu($hMenu, $url, $arrPermissaoMenu, $arrInterno);
			$hMenu .= $divider;
		}

		$hMenu = substr_replace($hMenu, "", strrpos($hMenu, $divider), strlen($divider));
		$hMenu .= "</ul>";
		$hMenu .= "</li>\n";
		return;
	}

	$urlSub = $url . $arr["Chave"] . "/";

	if (MenuTemFilho($arrPermissaoMenu, $id)) {
		$hMenu .= "<li class=\"dropdown-submenu\"><a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{$titulo}</a>";
		$hMenu .= "<ul class=\"dropdown-menu\">\n";

		foreach ($arrPermissaoMenu as $index => $arrInterno) {
			if($arrInterno["PermissaoMenuPaiID"] != $id) {
				continue;
			}

			CriarItemMenu($hMenu, $urlSub, $arrPermissaoMenu, $arrInterno);
			$hMenu .= $divider;
		}

		$hMenu = substr_replace($hMenu, "", strrpos($hMenu, $divider), strlen($divider));
		$hMenu .= "</ul>";
		$hMenu .= "</li>\n";
		return;
	}

	$hMenu .= "<li><a href=\"{$urlSub}\">{$titulo}</a>";
	$hMenu .= "</li>\n";
	return;
}

// Montar breadcrumb
// Obter nome do módulo, submódulo e ferramenta

function CriarItemBreadcrumb(&$arrBreadcrumb, $chave, $PermissaoMenuPaiID = null)
{
	if($chave == "") {
		return;
	}

	$iconeA = "";
	$oPermissaoMenu = new tpermissaomenu();
	$oPermissaoMenu->LoadByChave($chave, $PermissaoMenuPaiID);

	if($PermissaoMenuPaiID == null)
	{
		$caminhoFisicoIcone = DirectoryRoot . "/img/icones/" . $oPermissaoMenu->Icone;
		$caminhoIcone = WebURL . "img/icones/" . $oPermissaoMenu->Icone;

		if(file_exists($caminhoFisicoIcone)) {
			$iconeA = "<img src=". $caminhoIcone . " width=\"24px\" heigth=\"24px\" />&nbsp;";
		}
	}

	if($iconeA != "") {
		$arrBreadcrumb[] = "{$iconeA} " . $oPermissaoMenu->Titulo;
	}
	else {
		$arrBreadcrumb[] = $oPermissaoMenu->Titulo;
	}

	return $oPermissaoMenu->ID;
}

$arrBreadcrumb = array();
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N1);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N2, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N3, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N4, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N5, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N6, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N7, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N8, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N9, $PermissaoMenuPaiID);
$PermissaoMenuPaiID = CriarItemBreadcrumb($arrBreadcrumb, CHAVE_N10, $PermissaoMenuPaiID);

$arrBreadcrumb = array_reverse($arrBreadcrumb);

// Título da página

if (empty($PageTitle)) {
	$PageTitle = count($arrBreadcrumb) > 0 ? $arrBreadcrumb[0] : WebTitle;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<noscript>
		<meta http-equiv="refresh" content="0;URL=<?=WebURL;?>logout.php">
	</noscript>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= WebTitle; ?></title>
	<?php

	// Styles (CSS)

	$arrStyles = array(
		"biblioteca/plugins/sbadmin2/componentes/bootstrap/dist/css/bootstrap.min",
		"biblioteca/plugins/sbadmin2/componentes/bootstrap/dist/css/bootstrap-theme.min",
		"biblioteca/plugins/sbadmin2/componentes/metisMenu/dist/metisMenu.min",
		"biblioteca/plugins/sbadmin2/css/sb-admin-2",
		"biblioteca/plugins/font-awesome/css/font-awesome.min",
		"biblioteca/plugins/bootstrap-switch/bootstrap-switch",
		"css/padrao"
	);

	$pathCSS = DirectoryRoot . "/css/" . CHAVE_COMPLETA;
	$pathCSS.= "/" . end(explode("/", $pathCSS)) . ".css";

	if (is_file($pathCSS)) {
		$arrStyles[] = str_replace(array(DirectoryRoot . "/", ".css"), "", $pathCSS);
	}

	foreach ($arrStyles as $v) {
		$path = DirectoryRoot . "/" . $v . ".css";
		$href = str_replace(DirectoryRoot . "/", WebURL, $path) . "?t=" . filemtime($path);

		echo "<link href=\"" . $href . "\" rel=\"stylesheet\">" . PHP_EOL;
	}

	?>

	<?= $PageStyles; ?>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
		var WebURL = "<?= WebURL; ?>";
		var AppDebug = "<?= AppDebug; ?>";
		var TimeOutSession = <?= intval(Util::GetSession("TimeOutSession")) * 1000; ?>;
	</script>

	<?php

	// Scripts (Javascript)

	$arrScripts = array(
		"biblioteca/plugins/jquery/jquery.min",
		"biblioteca/plugins/jquery/jquery.maskedinput.min",
		"biblioteca/plugins/jquery/jquery.maskMoney.min",
		"biblioteca/plugins/jquery/jquery.function.min",
		"biblioteca/plugins/jquery/jquery.form",
		"biblioteca/plugins/sbadmin2/componentes/bootstrap/dist/js/bootstrap.min",
		"biblioteca/plugins/sbadmin2/componentes/metisMenu/dist/metisMenu.min",
		"biblioteca/plugins/sbadmin2/js/sb-admin-2",
		"biblioteca/plugins/highcharts/js/highcharts",
		"biblioteca/plugins/moment/moment.min",
		"biblioteca/plugins/bootstrap-switch/bootstrap-switch",
		"biblioteca/plugins/countdownjs/countdown.min",
		"js/geral",
		"js/highcharts"
	);

	$pathJS = DirectoryRoot . "/js/" . CHAVE_COMPLETA;
	$pathJS.= "/" . end(explode("/", $pathJS)) . ".js";

	if (is_file($pathJS)) {
		$arrScripts[] = str_replace(array(DirectoryRoot . "/", ".js"), "", $pathJS);
	}

	foreach ($arrScripts as $v) {
		$path = DirectoryRoot . "/" . $v . ".js";
		$href = str_replace(DirectoryRoot . "/", WebURL, $path) . "?t=" . filemtime($path);

		echo "<script src=\"" . $href . "\"></script>" . PHP_EOL;
	}

	?>

	<?= $PageScripts; ?>

</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="autocollapse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php

			$oClienteSistema = new tclientesistema();
			$oClienteSistema->LoadByClienteSistemaID($oUsuarioLogado->ClienteSistemaID);

			?>
			<a class="navbar-brand" href="<?=WebURL;?>">
				<img alt="Brand" src="<?=WebURL;?>img/neo_construction.png" height="40px" style="margin-top: -7px;">
			</a>
		</div>
		<div class="navbar-collapse collapse" aria-expanded="false">
			<ul class="nav navbar-nav">
					<?php

					$arrPermissaoMenu = array();
					$oPermissaoMenu = new tpermissaomenu();
					$oPermissaoMenu->LoadByUsuarioID($oUsuarioLogado->ID);

					for ($a = 0; $a < $oPermissaoMenu->NumRows; $a++) {

						if($oPermissaoMenu->Recurso == 1) {
							continue;
						}

						$arrPermissaoMenu[] = array(
							"ID" => $oPermissaoMenu->ID,
							"Titulo" => $oPermissaoMenu->Titulo,
							"Chave" => $oPermissaoMenu->Chave,
							"Icone" => $oPermissaoMenu->Icone,
							"PermissaoMenuPaiID" => $oPermissaoMenu->PermissaoMenuPaiID
						);

						$oPermissaoMenu->MoveNext();
					}

					foreach ($arrPermissaoMenu as $arr) {
						if($arr["PermissaoMenuPaiID"] != null) {
							break;
						}

						$titulo = $arr["Titulo"];
						$url  = WebURL . "m/" . $arr["Chave"] . "/";
						$caminhoFisicoIcone = DirectoryRoot . "/img/icones/" . $arr["Icone"];
						$caminhoIcone = WebURL . "img/icones/" . $arr["Icone"];
						$iconeA = "";
						$iconeB = "";
						$active = "";

						if(file_exists($caminhoFisicoIcone)) {
							$iconeA = "<img src=". $caminhoIcone . " width=\"24px\" height=\"24px\" />";
						}

						if(MenuTemFilho($arrPermissaoMenu, $arr["ID"])) {
							$iconeB = "<b class=\"caret\"></b>";
						}

						if(CHAVE_N1 == $arr["Chave"]) {
							$active = "class=\"active\"";
						}

						$hMenu .= "<li {$active}>"
								. "	<a href=\"{$url}\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"
								. " 	{$iconeA}"
								. " 	{$titulo}"
								. " 	{$iconeB}"
								. "</a>\n";

						CriarItemMenu($hMenu, $url, $arrPermissaoMenu, $arr, true);
						$hMenu .= "</li>\n";
					}

					echo $hMenu;
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-cog"></i><b class="caret"></b></a>
					<ul class="dropdown-menu multi-level">
						<li>
							<a href="<?=WebURL;?>alterar-senha.php">Alterar senha</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?=WebURL;?>logout.php">Sair</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row hidden-print">
				<div class="col-sm-12">
					<h2 class="page-header"><?= $PageTitle; ?></h2>

					<?php if (count($arrBreadcrumb) > 0) { ?>
						<ol class="breadcrumb">
							<?php for ($x = count($arrBreadcrumb) - 1; $x >= 0; $x--) { ?>
    							<li class="active"><?= $arrBreadcrumb[$x]; ?></li>
							<?php } ?>
						</ol>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?= $oUsuarioLogado->GetMessage(); ?>
				</div>
			</div>
			<?= $PageContent; ?>
		</div>
	</div>
</div>
</body>
</html>

<script>
	function autocollapse() {
		setTimeout(function() {
		var navbar = $('#autocollapse');
		navbar.removeClass('collapsed'); // set standart view

		if (navbar.innerHeight() > 80) // check if we've got 2 lines
		{
			navbar.addClass('collapsed'); // force collapse mode
			navbar.children('.navbar-collapse').removeClass('collapse')
			navbar.children('.navbar-collapse').addClass('collapse')
		}
		}, 300);
	}

	$(document).on('ready', autocollapse);
	$(window).on('resize', autocollapse);
</script>
