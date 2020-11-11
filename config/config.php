<?php
date_default_timezone_set("America/Sao_Paulo");

#Errors
define("DisplayError", 1);
define("DisplayStartupError", 1);
define("ReportingError", 0);//E_ALL & ~E_NOTICE);

//Debug
define("AppDebug", false);

//Web
define("WebTitle", "Neo Construction");
define("WebURL", "https://www.agapesjc.com.br/homologacao/neoconstruction/");
#define("WebURL", "http://localhost/svn/agape/html/dev-neo/neoconstruction/");
define("SessionName", "NeoConstruction");;

//Database
define("DatabaseCharset", "utf8");
define("DatabaseHost", "mysql01.agapesjc3.hospedagemdesites.ws");
define("DatabaseUser", "agapesjc3");
define("DatabasePass", "Sjc@g@DB2020");
define("DatabaseSchema", "agapesjc3");
define("DatabaseIsWarning", AppDebug);
define("DatabaseStoreConnection", true);

// Folder
define("FolderUserFiles", "arquivo");
define("FolderUserFilesEditor", "editor");
define("FolderCommon", "common");
define("FolderMMKT", "mmkt");

// Web - Default
define("WebURLUserFiles", WebURL . FolderUserFiles . "/");
define("WebURLUserFilesEditor", WebURLUserFiles . FolderUserFilesEditor . "/");
define("WebURLCommon", WebURL . FolderCommon . "/");
define("WebURLMMKT", WebURLCommon . FolderMMKT . "/");
define("URL", WebURL);

// Directory
define("DirectoryRoot", str_replace("\\", "/", dirname(dirname(__FILE__))));
define("DirectoryUserFilesName", "/" . FolderUserFiles . "/");
define("DirectoryUserFilesPath", DirectoryRoot . DirectoryUserFilesName);
define("DirectoryUserFilesEditorName", DirectoryUserFilesName . FolderUserFilesEditor . "/");
define("DirectoryUserFilesEditorPath", DirectoryRoot . DirectoryUserFilesEditorName);
define("DirectoryCommonName", "/" . FolderCommon . "/");
define("DirectoryCommonPath", DirectoryRoot . DirectoryCommonName);
define("DirectoryMMKTName", DirectoryCommonName . FolderMMKT . "/");
define("DirectoryMMKTPath", DirectoryRoot . DirectoryMMKTName);

#Set Variables
ini_set('display_errors', DisplayError);
ini_set('display_startup_errors', DisplayStartupError);
error_reporting(ReportingError);

if (!function_exists("__autoload")) {
	function __autoload($pClassName)
	{
		$pClassName = strtolower($pClassName);
		if (substr($pClassName, 0, 1) == "t") {
			include(DirectoryRoot . "/config/tabela/" . $pClassName . ".php");
		} else {
			$pClassName = DirectoryRoot . "/biblioteca/" . $pClassName . ".php";
			if (file_exists($pClassName)) include($pClassName);
			//else die("Erro: " . $pClassName);
		}
	}

	spl_autoload_register('__autoload');
}
