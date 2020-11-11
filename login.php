<?php

include(explode(DIRECTORY_SEPARATOR . "m" . DIRECTORY_SEPARATOR, dirname(__FILE__), 2)[0] . "/config/config.php");

$u = $_GET["u"];

$oUsuario = new tusuario();

if($_POST)
{
	$txtUsuario = $_POST["txtUsuario"];
	$txtSenha = $_POST["txtSenha"];

	if($oUsuario->Authentication($txtUsuario, $txtSenha))
	{
		header("Location: " . (($u) ? urldecode($u) : WebURL));
		exit();
	}
}

?>

<style type="text/css">
	body {
	 /*background-image: url("http://www.agapesjc.com.br/dev-neo/neoconstruction/img/img3.jpg");*/
	 background-image: url("http://www.agapesjc.com.br/homologacao/neoconstruction/img/login/img3.jpg");
	 -webkit-background-size: 100% 100%;
  -moz-background-size: 100% 100%;
  -o-background-size: 100% 100%;
  background-size: 100% 100%;

	}
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?=WebTitle;?> | Login</title>
	<link href="<?=WebURL;?>biblioteca/plugins/sbadmin2/componentes/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=WebURL;?>biblioteca/plugins/sbadmin2/componentes/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	<link href="<?=WebURL;?>biblioteca/plugins/sbadmin2/css/sb-admin-2.css" rel="stylesheet">
	<link href="<?=WebURL;?>biblioteca/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<?php if(is_file(dirname(__FILE__) . "/css/" . $Chave . "/" . (($css) ? $css : $Chave) . ".css")){ ?><link rel="stylesheet" href="<?=WebURL;?>css/<?=$Chave;?>/<?=(($css) ? $css : $Chave);?>.css"><?php } ?>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-body">
							<form role="form" class="form" method="post">
								<fieldset>
									<img src="<?=WebURL;?>img/neo_construction.png" class="img-thumbnail center-block" width="100%">
									<br>
									<noscript>
										<div class="alert alert-danger" role="alert">
											<strong>Erro!</strong> O javascript do seu navegador não está habilidado. É necessário habilitá-lo.
										</div>
									</noscript>
									<?php

									if($_POST)
									{
										?>
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Erro!</strong> Usuário e/ou senha inválido.
										</div>
										<?php
									}

									?>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" id="addon-usuario"><i class="fa fa-fw fa-user"></i></span>
											<input class="form-control" placeholder="Usuário" name="txtUsuario" type="text" aria-describedby="addon-usuario" maxlength="80" value="<?=$txtUsuario;?>" required <?=(!$_POST || trim($txtUsuario)=="") ? "autofocus" : "";?>>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" id="addon-senha"><i class="fa fa-fw fa-key"></i></span>
											<input class="form-control" placeholder="Senha" name="txtSenha" type="password"  aria-describedby="addon-senha" maxlength="20" required value="" <?=($_POST || trim($txtUsuario)!="") ? "autofocus" : "";?>>
										</div>
									</div>
									<button class="btn btn-lg btn-success btn-block" type="submit"><i class="fa fa-fw fa-sign-in"></i> Entrar</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var WebURL = "<?=WebURL;?>";</script>
		<script src="<?=WebURL;?>biblioteca/plugins/jquery/jquery.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/jquery/jquery.maskedinput.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/jquery/jquery.maskMoney.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/jquery/jquery.function.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/sbadmin2/componentes/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/sbadmin2/componentes/metisMenu/dist/metisMenu.min.js"></script>
		<script src="<?=WebURL;?>biblioteca/plugins/sbadmin2/js/sb-admin-2.js"></script>
		<script src="<?=WebURL;?>js/geral.js?noCache=3"></script>
		<?php if(is_file(dirname(__FILE__) . "/js/" . $Chave . "/" . (($js) ? $js : $Chave) . ".js")){ ?><script src="<?=WebURL;?>js/<?=$Chave;?>/<?=(($js) ? $js : $Chave);?>.js"></script><?php }	?>
		</body>

		</html>
