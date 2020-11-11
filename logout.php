<?php

include(explode(DIRECTORY_SEPARATOR . "m" . DIRECTORY_SEPARATOR, dirname(__FILE__), 2)[0] . "/config/config.php");
include(DirectoryRoot . "/verifica.php");

$oUsuarioLogado->Logout();

header("Location: login.php");
exit();

?>