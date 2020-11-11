<?php

include_once(dirname(dirname(__FILE__))."/config/config.php");

/**
 * Classe utilizada para várias funcionalidades
 *
 * @author Lotus Soluções Tecnológicas
 * @copyright Copyright (c), Lotus
 * @access public
 */
class Util
{
	public static $Week = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
	public static $Month = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
	public static $AddressType = array("Outros", "Aeroporto", "Alameda", "Area", "Avenida", "Campo", "Chácara", "Colônia", "Condomínio", "Conjunto", "Distrito", "Esplanada", "Estação", "Estrada", "Favela", "Fazenda", "Feira", "Jardim", "Ladeira", "Lago", "Lagoa", "Largo", "Loteamento", "Morro", "Núcleo", "Parque", "Passarela", "Pátio", "Praça", "Quadra", "Recanto", "Residencial", "Rodovia", "Rua", "Setor", "Sítio", "Travessa", "Trecho", "Trevo", "Vale", "Vereda", "Via", "Viaduto", "Viela", "Vila");
	public static $UF = array("AC" => "Acre", "AL" => "Alagoas", "AP" => "Amapá", "AM" => "Amazonas", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RS" => "Rio Grande do Sul", "RO" => "Rondônia", "RR" => "Roraima", "SC" => "Santa Catarina", "SP" => "São Paulo", "SE" => "Sergipe", "TO" => "Tocantins");
	public static $Country = array("AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AG" => "Antigua", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BW" => "Botswana", "BR" => "Brasil", "VG" => "British Virgin Islands", "BN" => "Brunei", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CV" => "Cape Verde", "KY" => "Cayman Islands", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CO" => "Colombia", "CG" => "Congo", "CK" => "Cook Islands", "CR" => "Costa Rica", "HR" => "Croatia", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djiibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FO" => "Faeroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GN" => "Guinea", "GY" => "Guyana", "HT" => "Haiti", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IQ" => "Iraq Republic", "IE" => "Ireland", "IL" => "Israel", "IT" => "Italy", "CI" => "Ivory Coast", "JM" => "Jamaica", "JP" => "Japan", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "MX" => "Mexico", "FM" => "Micronesia", "MD" => "Moldova", "MC" => "Monaco", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "NA" => "Namibia", "NP" => "Nepal", "AN" => "Netherlands Antilles", "NL" => "Netherlands", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "MP" => "Saipan", "SA" => "Saudi Arabia", "GB" => "Scotland", "SN" => "Senegal", "SC" => "Seychelles", "SG" => "Singapore", "SK" => "Slovak Republic", "SI" => "Slovenia", "ZA" => "South Africa", "KR" => "South Korea", "ES" => "Spain", "LK" => "Sri Lanka", "KN" => "St. Kitts and Nevis", "LC" => "St. Lucia", "VC" => "St. Vincent", "SR" => "Suriname", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "TW" => "Taiwan", "TZ" => "Tanzania", "TH" => "Thailand", "TG" => "Togo", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TC" => "Turks and Caicos Islands", "VI" => "U S Virgin Islands", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VA" => "Vatican City", "VE" => "Venezuela", "VN" => "Vietnam", "UK" => "Wales", "WF" => "Wallis &amp; Futuna", "YE" => "Yemen", "YU" => "Servia &amp; Montenegro", "ZR" => "Zaire", "ZM" => "Zambia", "ZW" => "Zimbabwe");

	public static $AtivoInativo = array("1" => "Ativo", "0" => "Inativo");
	public static $AprovadoReprovado = array("1" => "Aprovado", "0" => "Reprovado");
	public static $UnidadesContagem = array("m" => "m", "m2" => "m²", "m3" => "m³","sc" => "sc","g" => "g", "l" => "l", "un" => "un", "pc" => "pc", "cx" => "cx", "kg" => "kg", "tn" => "tn");
	public static $MinimoIntermediarioSuperior = array("1" => "Mínimo", "2" => "Intermediário", "3" => "Superior");


	/**
	 * Construtor da classe
	 *
	 * @access public
	 * @return void
	 */
	public function Util(){}

	/**
	 * Inicia permissões
	 *
	 * @access public
	 * @return void
	 */
	public static function InitSet()
	{
		if(version_compare(PHP_VERSION, "5.6", "<")) throw new Exception("Desculpe, a versão do PHP deve ser maior ou igual que 5.6");
		if(!function_exists("mysqli_connect")) throw new Exception("Desculpe, a extensão MYSQLI é necessária.");
		if(!function_exists("mail")) throw new Exception("Desculpe, a extensão MAIL é necessária.");
		if(!function_exists("gd_info")) throw new Exception("Desculpe, a extensão GD é necessária.");
		if(!function_exists("curl_init")) throw new Exception("Desculpe, a extensão CURL é necessária.");

		ini_set("safe_mode", "Off");
		ini_set("register_globals","Off");
		ini_set("allow_url_fopen", "Off");
		ini_set("max_execution_time", "0");
		ini_set("file_uploads", "On");
		ini_set("upload_max_filesize", "128M");
		ini_set("post_max_size", "128M");
		ini_set("memory_limit", "128M");

		if(AppDebug)
		{
			ini_set("track_errors", "On");
			ini_set("display_errors", "On");
		}
		else
		{
			ini_set("track_errors", "On"); //Off
			ini_set("display_errors", "On"); //Off
			error_reporting(0);
		}

		session_start();
		set_time_limit(0);
	}

	/**
	 * Verifica as variáveis
	 *
	 * @access public
	 * @return void
	 */
	public static function CheckVariables()
	{
		$_SERVER["QUERY_STRING"] = strip_tags($_SERVER["QUERY_STRING"]);

		function callback(&$v, $k)
		{
			$v = Util::HTMLEncode($v);
		}

		if(is_array($_GET)) { array_walk_recursive($_GET, "callback"); }
		if(is_array($_POST)) { array_walk_recursive($_POST, "callback"); }
		if(is_array($_REQUEST)) { array_walk_recursive($_REQUEST, "callback"); }
		if(is_array($_COOKIE)) { array_walk_recursive($_COOKIE, "callback"); }
	}

	/**
	 * Verifica URL
	 *
	 * @access public
	 * @param string $URL (Default: false)
	 * @return void
	 */
	public static function ForceURL($URL = false)
	{
		$URL = (($URL) ? $URL : WebURL);

		if((strpos("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"], $URL) === false)
			&& (strpos("https://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"], $URL) === false))
		{
			header("Location: " . $URL);
			exit();
		}
	}

	/**
	 * Verifica mobile
	 *
	 * @access public
	 * @param array $Mobiles (Default: array("iPhone", "webOS", "iPod", "iPad", "BlackBerry"))
	 * @return bool
	 */
	public static function IsMobile($Mobiles = array("iPhone", "webOS", "iPod", "iPad", "BlackBerry"))
	{
		foreach($Mobiles as $Mobile)
		{
			if(strstr(self::StringLower($_SERVER["HTTP_USER_AGENT"]), self::StringLower($Mobile)))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Filtra o ID do vídeo do youtube
	 *
	 * @access public
	 * @param array $Options (Default: array())
	 * @return mixed
	 */
	public static function SimpleCURL($Options = array())
	{
		$ch = curl_init();
		curl_setopt_array($ch, $Options);
		$Output = curl_exec($ch);
		$Info = curl_getinfo($ch);
		$Error = curl_error($ch);
		curl_close($ch);

		if($Error || $Info["http_code"] != "200" || !$Output)
		{
			throw new Exception("Problemas na requisição - " . $Output);
		}

		return array($Output, $Info, $Error);
	}

	/**
	 * Filtra o ID do vídeo do YouTube
	 *
	 * @access public
	 * @param string $Value
	 * @return string
	 */
	public static function GetYouTubeID($Value)
	{
		if(!$Value) return false;

		$Output = array();
		preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/]{11})/i", $Value, $Output);
		return (($Output[1]) ? $Output[1] : false);
	}

	/**
	 * Filtra o ID do vídeo do Vimeo
	 *
	 * @access public
	 * @param string $Value
	 * @return string
	 */
	public static function GetVimeoID($Value)
	{
		if(!$Value) return false;

		$Output = array();
		preg_match("/^(http|https):\/\/(www\.)?vimeo\.com\/(clip\:)?(\d+).*$/i", $Value, $Output);
		return (($Output[4]) ? $Output[4] : false);
	}

	/**
	 * Informações do YouTube
	 *
	 * @access public
	 * @param string $Value
	 * @return stdClass
	 */
	public static function GetYouTubeInfo($Value)
	{
		try
		{
			if(strpos(self::StringLower($Value), "youtu") !== false) $Value = self::GetYouTubeID($Value);
			if(!$Value) return false;

			$Options = array
			(
				CURLOPT_URL => "http://gdata.youtube.com/feeds/api/videos/" . $Value,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HEADER => false
			);

			list($Output, $Info, $Error) = self::SimpleCURL($Options);

			$obj = new stdClass;
			$entry = simplexml_load_string($Output);

			// get nodes in media: namespace for media information
			$media = $entry->children("http://search.yahoo.com/mrss/");
			$obj->title = $media->group->title;
			$obj->description = $media->group->description;

			// get video player URL
			$attrs = $media->group->player->attributes();
			$obj->watchURL = $attrs["url"];

			// get video thumbnail
			$attrs = $media->group->thumbnail[0]->attributes();
			$obj->thumbnailURL = $attrs["url"];

			// get <yt:duration> node for video length
			$yt = $media->children("http://gdata.youtube.com/schemas/2007");
			$attrs = $yt->duration->attributes();
			$obj->length = $attrs["seconds"];

			// get <yt:stats> node for viewer statistics
			$yt = $entry->children("http://gdata.youtube.com/schemas/2007");
			$attrs = $yt->statistics->attributes();
			$obj->viewCount = $attrs["viewCount"];

			// get <gd:rating> node for video ratings
			$gd = $entry->children("http://schemas.google.com/g/2005");
			if($gd->rating)
			{
				$attrs = $gd->rating->attributes();
				$obj->rating = $attrs["average"];
			}
			else
			{
				$obj->rating = 0;
			}

			// get <gd:comments> node for video comments
			$gd = $entry->children("http://schemas.google.com/g/2005");
			if($gd->comments->feedLink)
			{
				$attrs = $gd->comments->feedLink->attributes();
				$obj->commentsURL = $attrs["href"];
				$obj->commentsCount = $attrs["countHint"];
			}

			return $obj;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	/**
	 * Informações do Vimeo
	 *
	 * @access public
	 * @param string $Value
	 * @return array
	 */
	public static function GetVimeoInfo($Value)
	{
		try
		{
			if(strpos(self::StringLower($Value), "vimeo") !== false) $Value = self::GetVimeoID($Value);
			if(!$Value) return false;

			$Options = array
			(
				CURLOPT_URL => "http://vimeo.com/api/v2/video/" . $Value . ".json",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HEADER => false
			);

			list($Output, $Info, $Error) = self::SimpleCURL($Options);

			$Data = json_decode($Output, true);
			return ((count($Data) > 0) ? current($Data) : false);
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	/**
	 * Salva um arquivo externo
	 *
	 * @access public
	 * @param string $URL
	 * @param string $Folder
	 * @param string $Name
	 * @param string $Extension
	 * @return string
	 */
	public static function SaveExternalFile($URL, $Folder, $Name, $Extension)
	{
		$Path = self::CheckExternalFile($Folder, $Name);

		if($Path)
		{
			return $Path;
		}

		try
		{
			$Path = self::GenerateFilePath("externo/" . $Folder, $Name, $Extension);

			$fp = fopen($Path, "w");

			$Options = array
			(
				CURLOPT_URL => $URL,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HEADER => false,
				CURLOPT_FILE => $fp
			);

			list($Output, $Info, $Error) = self::SimpleCURL($Options);

			fclose($fp);

			return self::ParseFilePath($Path);
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	/**
	 * Verifica se o arquivo externo já existe
	 *
	 * @access public
	 * @param string $Folder
	 * @param string $Name
	 * @return string
	 */
	public static function CheckExternalFile($Folder, $Name)
	{
		$Files = glob(DirectoryUserFilesPath . "externo/" . $Folder . "/" . $Name . ".*");
		if(count($Files) > 0)
		{
			return self::ParseFilePath($Files[0]);
		}

		return false;
	}

	/**
	 * Analisa o Vídeo
	 *
	 * @access public
	 * @param string $Value
	 * @param string $Type (Default: null)
	 * @param string $ImageType (Default: null)
	 * @param int $IframeWidth (Default: 770)
	 * @param int $IframeHeight (Default: 440)
	 * @param bool $AutoPlay (Default: false)
	 * @param array $Params (Default: array())
	 * @return mixed
	 */
	public static function ParseVideo($Value, $Type = null, $ImageType = null, $IframeWidth = 770, $IframeHeight = 440, $AutoPlay = false, $Params = array())
	{
		$Type = self::StringLower($Type);
		$ImageType = self::StringLower($ImageType);
		$Params = (($AutoPlay) ? array_merge($Params, array("autoplay=1")) : $Params);

		if(strpos(self::StringLower($Value), "youtu") !== false)
		{
			$ID = self::GetYouTubeID($Value);
			$ImageTypeList = array("0", "1", "2", "3", "default", "mqdefault", "hqdefault", "maxresdefault");
			$ImageType = ((in_array($ImageType, $ImageTypeList)) ? $ImageType : "default");
			$Info = (($Type == "info" || $Type == "url") ? self::GetYouTubeInfo($ID) : false);

			if($ID)
			{
				switch($Type)
				{
					case "iframe":
						return "<iframe src=\"http://www.youtube.com/embed/" . $ID . ((count($Params) > 0) ? "?" . implode("&amp;", $Params) : "") . "\" width=\"" . $IframeWidth . "\" height=\"" . $IframeHeight . "\" frameborder=\"0\" allowFullScreen></iframe>";

					case "iframe_url":
						return "http://www.youtube.com/embed/" . $ID . ((count($Params) > 0) ? "?" . implode("&amp;", $Params) : "");

					case "image":
						return "http://i.ytimg.com/vi/" . $ID . "/" . $ImageType . ".jpg";

					case "image_save":
						return self::SaveExternalFile("http://i.ytimg.com/vi/" . $ID . "/" . $ImageType . ".jpg", "youtube", $ID . "_" . $ImageType, "jpg");

					case "info":
						return $Info;

					case "url":
						return $Info->watchURL;

					default:
						return $ID;
				}
			}
			else
			{
				return false;
			}
		}
		else if(strpos(self::StringLower($Value), "vimeo") !== false)
		{
			$ID = self::GetVimeoID($Value);
			$ImageTypeList = array("small", "medium", "large");
			$ImageType = ((in_array($ImageType, $ImageTypeList)) ? $ImageType : "medium");
			$Info = (($Type == "image" || $Type == "info" || $Type == "url") ? self::GetVimeoInfo($ID) : false);

			if($ID)
			{
				switch($Type)
				{
					case "iframe":
						return "<iframe src=\"http://player.vimeo.com/video/" . $ID . ((count($Params) > 0) ? "?" . implode("&amp;", $Params) : "") . "\" width=\"" . $IframeWidth . "\" height=\"" . $IframeHeight . "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";

					case "iframe_url":
						return "http://player.vimeo.com/video/" . $ID . ((count($Params) > 0) ? "?" . implode("&amp;", $Params) : "");

					case "image":
						return $Info["thumbnail_" . $ImageType];

					case "image_save":
						$Path = self::CheckExternalFile("vimeo", $ID . "_" . $ImageType);
						if(!$Path)
						{
							$Info = self::GetVimeoInfo($ID);
							$Path = self::SaveExternalFile($Info["thumbnail_" . $ImageType], "vimeo", $ID . "_" . $ImageType, self::GetExtension($Info["thumbnail_" . $ImageType]));
						}
						return $Path;

					case "info":
						return $Info;

					case "url":
						return $Info["url"];

					default:
						return $ID;
				}
			}
			else
			{
				return false;
			}
		}

		return false;
	}

	/**
	 * Retorna a primeira palavra
	 *
	 * @access public
	 * @param string $Value
	 * @param int $Offset (Default: 0)
	 * @param int $Length (Default: 1)
	 * @return string
	 */
	public static function FirstWords($Value, $Offset = 0, $Length = 1)
	{
		return implode(" ", array_slice(explode(" ", ucwords(self::StringLower(trim($Value)))), $Offset, $Length));
	}

	/**
	 * Remove caracter no primeiro ou último
	 *
	 * @access public
	 * @param string $Value
	 * @param bool $First (Default: true)
	 * @param bool $Last (Default: true)
	 * @param string $Caracter (Default: "/")
	 * @return string
	 */
	public static function RemoveCaracter($Value, $First = true, $Last = true, $Caracter = "/")
	{
		if($First)
		{
			while(substr($Value, 0, 1) == $Caracter)
			{
				$Value = substr($Value, 1);
			}
		}

		if($Last)
		{
			while(substr($Value, strlen($Value) - 1, 1) == $Caracter)
			{
				$Value = substr($Value, 0, strlen($Value) - 1);
			}
		}

		return $Value;
	}

	/**
	 * Busca Filtros
	 *
	 * @access public
	 * @param string $Value
	 * @param int $Init (Default: 0)
	 * @param string $Separator (Default: "/")
	 * @return array
	 */
	public static function GetFilter($Value, $Init = 0, $Separator = "/")
	{
		$Value = self::RemoveCaracter($Value, true, true, $Separator);

		$ar = array();
		$arSeparador = explode($Separator, $Value);
		for($i = $Init; $i < count($arSeparador); $i++)
		{
			$ar[$arSeparador[$i]] = $arSeparador[$i+1];
			$i++;
		}
		return $ar;
	}

	/**
	 * Define filtros
	 *
	 * @access public
	 * @param string $Base
	 * @param array $Filter
	 * @param array $Parameter (Default: array())
	 * @param bool $IsQueryString (Default: false)
	 * @param string $Separator (Default: "/")
	 * @return string
	 */
	public static function SetFilter($Base, $Filter, $Parameter = array(), $IsQueryString = false, $Separator = "/")
	{
		$Base = self::RemoveCaracter($Base, false, true, $Separator);

		$Filter = ((is_array($Filter)) ? $Filter : array());
		$Parameter = ((is_array($Parameter)) ? $Parameter : array());

		$ar = array_merge($Filter, $Parameter);
		$itens = array();

		foreach($ar as $key => $value)
		{
			if($key) array_push($itens, $key . (($IsQueryString) ? "=" : $Separator) . $value);
		}

		return $Base . (($IsQueryString) ? "?" . implode("&amp;", $itens) : $Separator . implode($Separator, $itens) . $Separator);
	}

	/**
	 * Remove o arquivo
	 *
	 * @access public
	 * @param string $File
	 * @return bool
	 */
	public static function RemoveFile($File)
	{
		if(is_file($File))
		{
			$PathInfo = pathinfo($File);

			$arGlob = glob(self::ParseDirectory("thumb", $File) . $PathInfo["filename"] . "*." . $PathInfo["extension"]);
			if(is_array($arGlob))
			{
				foreach($arGlob as $FileTemp)
				{
					unlink($FileTemp);
				}
			}

			$arGlob = glob(self::ParseDirectory("recortar-imagem", $File) . $PathInfo["filename"] . "*." . $PathInfo["extension"]);
			if(is_array($arGlob))
			{
				foreach($arGlob as $FileTemp)
				{
					unlink($FileTemp);
				}
			}

			return unlink($File);
		}

		return false;
	}

	/**
	 * Corta o texto sem cortar as palavras no meio
	 *
	 * @access public
	 * @param string $Text
	 * @param int $Limit
	 * @param int $Padding (Default: "...")
	 * @param bool $EndWord (Default: true)
	 * @return void
	 */
	public static function CutText($Text, $Limit, $Padding = "...", $EndWord = true)
	{
		$Text = strip_tags(self::HTMLDecode($Text));
		if(strlen($Text) > $Limit)
		{
			if($EndWord)
			{
				$Limit--;
				$Last = substr($Text, $Limit - 1, 1);
				while($Last != " " && $Limit > 0)
				{
					$Limit--;
					$Last = substr($Text, $Limit - 1, 1);
				}

				$Last = substr($Text, $Limit - 2, 1);
				if($Last == "," || $Last == ";"  || $Last == ":")
				{
					$Text = substr($Text, 0, $Limit - 2) . $Padding;
				}
				else if($Last == "." || $Last == "?" || $Last == "!")
				{
					$Text = substr($Text, 0, $Limit - 1);
				}
				else
				{
					$Text = substr($Text, 0, $Limit - 1) . $Padding;
				}
			}
			else
			{
				$Text = substr($Text, 0, $Limit) . $Padding;
			}
		}
		return $Text;
	}

	/**
	 * Retorna texto alinhado
	 *
	 * @access public
	 * @param string $Title
	 * @param int $TitleCount
	 * @param string $Text
	 * @param int $TextCount
	 * @param int $Count
	 * @return string
	 */
	public static function TextAlign($Title, $TitleCount, $Text, $TextCount, $Count)
	{
		$Limit = ceil($Count - ceil(strlen($Title) / $TitleCount)) * $TextCount;
		return (($Limit > 0) ? self::CutText($Text, $Limit) : "");
	}

	/**
	 * Retorna a saudação
	 *
	 * @access public
	 * @return string
	 */
	public static function Greeting()
	{
		$hour = date("H");
		if ($hour < 12)
		{
			return "Bom dia";
		}
		elseif ($hour < 18)
		{
			return "Boa tarde";
		}
		else
		{
			return "Boa noite";
		}
	}

	/**
	 * Formata endereço
	 *
	 * @access public
	 * @return string
	 */
	public function FormatAddress()
	{
		$sRet = "";
		$sRet .= (($this->Endereco) ? $this->Endereco : "");
		$sRet .= (($this->Numero) ? ", nº " . $this->Numero : "");
		$sRet .= (($this->Complemento) ? " - " . $this->Complemento : "");
		$sRet .= (($this->Bairro) ? " - " . $this->Bairro : "");
		$sRet .= (($this->CEP) ? "<br />CEP: " . $this->CEP : "");
		$sRet .= (($this->Cidade) ? " - " . $this->Cidade : "");
		$sRet .= (($this->Estado) ? " - " . $this->Estado : "");
		return $sRet;
	}

	/**
	 * Subistitui os acentos
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function ReplaceAccent($Text)
	{
		return strtr($Text, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž", "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz");
	}

	/**
	 * Prepara texto para pesquisa
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function ParseSearch($Text)
	{
		$Text = trim(self::StringLower(self::ReplaceAccent($Text)));
		$Text = preg_replace(array("([^a-z0-9 ])i", "[ ]", "/([a|e|i|o|u|c])/i"), array(".", ".*", "[$1]"), $Text);

		$Entities = array
		(
			"(a|ã|á|à|ä|â|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|Ã|Á|À|Ä|Â|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
			"(e|é|è|ë|ê|&eacute;|&egrave;|&euml;|&ecirc;|É|È|Ë|Ê|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
			"(i|í|ì|ï|î|&iacute;|&igrave;|&iuml;|&icirc;|Í|Ì|Ï|Î|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
			"(o|õ|ó|ò|ö|ô|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|Õ|Ó|Ò|Ö|Ô|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
			"(u|ú|ù|ü|û|&uacute;|&ugrave;|&uuml;|&ucirc;|Ú|Ù|Ü|Û|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
			"(c|ç|Ç|&ccedil;|&Ccedil;)"
		);

		$Text = str_replace(array("[a]", "[e]", "[i]", "[o]", "[u]", "[c]"), $Entities, $Text);

		return $Text;
	}

	/**
	 * Remove protocolo
	 *
	 * @access public
	 * @param string $Link
	 * @return string
	 */
	public static function RemoveProtocolo($Link)
	{
		return preg_replace("/^[^:]+:\/+(.*)$/", "\\1", $Link);
	}

	/**
	 * HTML Decode
	 *
	 * @access public
	 * @param string $Text
	 * @param string $Charset
	 * @return string
	 */
	public static function HTMLDecode($Text, $Charset = "UTF-8")
	{
		return html_entity_decode($Text, ENT_QUOTES, $Charset);
	}

	/**
	 * HTML Encode
	 *
	 * @access public
	 * @param string $Text
	 * @param string $Charset
	 * @return string
	 */
	public static function HTMLEncode($Text, $Charset = "UTF-8")
	{
		return htmlspecialchars($Text, ENT_QUOTES, $Charset);
	}

	/**
	 * Verifica a data
	 *
	 * @access public
	 * @param string $Date
	 * @return bool
	 */
	public static function DateCheck($Date)
	{
		return
			(
				$Date != ""
				&& $Date != "0000-00-00"
				&& $Date != "00:00:00"
				&& $Date != "0000-00-00 00:00:00"
			);
	}


	/**
	 * Compara duas datas
	 *
	 * @param $Data1
	 * @param $Data2
	 * @return 1: Data1 maior, 2: Data2 maior, 3: iguais
     */
	public static function CompareDate($Data1, $Data2) {

		$Data1 = strtotime($Data1);
		$Data2 = strtotime($Data2);

		if($Data1 > $Data2) {
			return 1;
		}

		if($Data1 < $Data2) {
			return 2;
		}

		if($Data1 == $Data2) {
			return 3;
		}

	}

	/**
	 * Converte a data para salvar
	 *
	 * @access public
	 * @param string $Date
	 * @return string
	 */
	public static function DateConvert($Date)
	{
		$sepDate = explode(" ", $Date);

		$d = explode("/", $sepDate[0]);
		$day = intval($d[0]);
		$month = intval($d[1]);
		$year = intval($d[2]);

		$t = explode(":", $sepDate[1]);
		$hour = intval($t[0]);
		$minute = intval($t[1]);
		$second = intval($t[2]);

		return "$year-$month-$day $hour:$minute:$second";
	}

	/**
	 * Formata a data para exibir
	 *
	 * @access public
	 * @param string $Date
	 * @return int
	 */
	public static function DateShow($Date)
	{
		$d = date("d", strtotime($Date));
		$m = date("m", strtotime($Date));
		$y = date("Y", strtotime($Date));
		$h = date("H", strtotime($Date));
		$i = date("i", strtotime($Date));
		$s = date("s", strtotime($Date));
		return strtotime("$m/$d/$y $h:$i:$s");
	}

	/**
	 * Formata a data para exibir
	 *
	 * @access public
	 * @param string $Format
	 * @param string $Date
	 * @return string
	 */
	public static function DateFormat($Format, $Date)
	{
		if (empty($Format) || empty($Date)) return;

		$Date = self::DateShow($Date);

		$Format = str_replace("week", "\\" . implode("\\", str_split(substr(self::$Week[intval(date("w", $Date))], 0, 3))), $Format);
		$Format = str_replace("WEEK", "\\" . implode("\\", str_split(self::$Week[intval(date("w", $Date))])), $Format);

		$Format = str_replace("month", "\\" . implode("\\", str_split(substr(self::$Month[intval(date("m", $Date))], 0, 3))), $Format);
		$Format = str_replace("MONTH", "\\" . implode("\\", str_split(self::$Month[intval(date("m", $Date))])), $Format);

		return date($Format, $Date);
	}

	/**
	 * Verifica e formata a data
	 *
	 * @access public
	 * @param string $Format
	 * @param string $Date
	 * @param bool $Now (Default: true)
	 * @param bool $Post (Default: true)
	 * @return string
	 */
	public static function DateCheckAndFormat($Format, $Date, $Now = true, $Post = true)
	{
		if(!self::DateCheck($Date))
		{
			if(!$Now)
			{
				return false;
			}

			return self::DateFormat($Format, date("Y-m-d H:i:s"));
		}

		if($Post && $_POST)
		{
			return $Date;
		}

		return self::DateFormat($Format, $Date);
	}

	/**
	 * Convertar data em mktime
	 *
	 * @access public
	 * @param string $DateTime
	 * @param int $AddDay
	 * @param int $AddMonth
	 * @param int $AddYear
	 * @return string
	 */
	public static function DateMktime($DateTime, $AddDay = 0, $AddMonth = 0, $AddYear = 0)
	{
		list($date, $time) = explode(" ", $DateTime);
		list($day, $month, $year) = explode("/", $date);
		list($hour, $min, $sec) = explode(":", $time);

		if (!checkdate($month, $day, $year)) return 0;

		if ($AddDay != 0) $day+= (int) $AddDay;
		if ($AddMonth != 0) $month+= (int) $AddMonth;
		if ($AddYear != 0) $year+= (int) $AddYear;

		return mktime(intval($hour), intval($min), intval($sec), $month, $day, $year);
	}

	/**
	 * Formata o valor para exibir
	 *
	 * @access public
	 * @param string $Decimal
	 * @return string
	 */
	public static function DecimalShow($Decimal)
	{
        if (!self::DecimalConvert($Decimal)) return "";

		return number_format($Decimal, 2, ",", ".");
	}

	/**
	 * Converte o valor para salvar
	 *
	 * @access public
	 * @param string $Decimal
	 * @return string
	 */
	public static function DecimalConvert($Decimal)
	{
		//return str_replace(",", ".", str_replace(".", "", (($Decimal) ? $Decimal : "0,0")));
        if (strstr($Decimal, ",")) {
            $Decimal = str_replace(".", "", $Decimal);
            $Decimal = str_replace(",", ".", $Decimal);
        }

		if (empty($Decimal)) $Decimal = "0";

        if (preg_match("#([0-9\.\-]+)#", $Decimal, $match)) $Decimal = $match[0];

        return floatval($Decimal);
	}

	/**
	 * Retorna a extensão de um arquivo
	 *
	 * @access public
	 * @param string $Path
	 * @return string
	 */
	public static function GetExtension($Path)
	{
		return self::StringLower(end(explode(".", $Path)));
	}

	/**
	 * Gera um nome genérico
	 *
	 * @access public
	 * @param int $Length (Default: 20)
	 * @return string
	 */
	public static function GenerateName($Length = 20)
	{
		$Toquen = md5(uniqid(rand(), true));
		$Name = self::StringLower(substr($Toquen, 0, $Length));
		return $Name;
	}

	/**
	 * Cria o diretório
	 *
	 * @access public
	 * @param string $Directory
	 * @return void
	 */
	public static function CreateDirectory($Directory)
	{
		$dirs = explode("/", $Directory);
		$dir = substr($_SERVER["DOCUMENT_ROOT"], 0, 1);
		if($dir != DIRECTORY_SEPARATOR)
		{
			$dir = "";
		}
		for ($z = 0; $z < count($dirs); $z++)
		{
			if (trim($dirs[$z]) != "")
			{
				$dir .= $dirs[$z] . "/";

				if (!is_dir($dir))
				{
					mkdir($dir, 0777);
					umask(0000);
					chmod($dir, 0777);
				}
			}
		}
	}

	/**
	 * Gera o caminho do arquivo disponível
	 *
	 * @access public
	 * @param string $DirName
	 * @param string $Name (Default: null)
	 * @param string $Extension
	 * @return string
	 */
	public static function GenerateFilePath($DirName, $Name = null, $Extension)
	{
		$Path = DirectoryUserFilesPath . $DirName . "/";
		self::CreateDirectory($Path);

		$File = "";
		$b = false;
		$count = 0;
		while($b == false)
		{
			$FileName = "";
			if($Name)
			{
				$FileName = $Name;
				if($count > 0)
				{
					$FileName .= "(" . $count . ")";
				}
				$count++;
			}
			else
			{
				$FileName = self::GenerateName();
			}

			$File = $Path . $FileName . "." . $Extension;
			$b = !is_file($File);
		}

		return $File;
	}

	/**
	 * Caminho do arquivo para ser salvo
	 *
	 * @access public
	 * @param string $File
	 * @return string
	 */
	public static function ParseFilePath($File)
	{
		return str_replace(DirectoryRoot, "", $File);
	}

	/**
	 * Analisa diretório
	 *
	 * @access public
	 * @param string $DirName
	 * @param string $File
	 * @param bool $CreateDirectory (Default: false)
	 * @return string
	 */
	public static function ParseDirectory($DirName, $File, $CreateDirectory = false)
	{
		$PathInfo = pathinfo($File);
		$BaseFile = self::RemoveCaracter(str_replace(array("../", "./", DirectoryRoot, DirectoryUserFilesName, DirectoryUserFilesPath), "", "/" . $PathInfo["dirname"] . "/"));
		$Directory = DirectoryUserFilesPath . self::RemoveCaracter($DirName) . "/" . $BaseFile . (($BaseFile) ? "/" : "");
		if($CreateDirectory) self::CreateDirectory($Directory);
		return $Directory;
	}

	/**
	 * Define mensagem
	 *
	 * @access public
	 * @param string $Type
	 * @param string $Message (Default: "")
	 * @param string $Title (Default: "")
	 * @return void
	 */
	public static function SetMessage($Type, $Message = "", $Title = "", $Close = true)
	{
		$_SESSION["Message"] = ((!$_SESSION["Message"]) ? array() : $_SESSION["Message"]);
		$_SESSION["Message"][] = array("Title" => $Title, "Message" => $Message, "Type" => $Type, "Close" => $Close);
	}

	/**
	 * Busca mensagem da sessão
	 *
	 * @access public
	 * @return string
	 */
	public static function GetMessage()
	{
		$sRet = "";
		if (is_array($_SESSION["Message"]))
		{
			foreach($_SESSION["Message"] as $c => $v)
			{
				$sRet .= self::CreateMessage($v["Type"], $v["Message"], $v["Title"], $v["Close"]);
			}
			unset($_SESSION["Message"]);
		}
		return $sRet;
	}

	/**
	 * Cria mensagem
	 *
	 * @access public
	 * @param string $Type
	 * @param string $Message (Default: null)
	 * @param string $Title (Default: null)
	 * @return string
	 */
	public static function CreateMessage($Type, $Message, $Title, $Close = true)
	{

		$Type = self::StringLower($Type);

		if(!$Close)
			return "<div class='alert alert-" . $Type . "' role='alert'><strong>" . $Title . "</strong> " . $Message . "</div>";
		else
			return "<div class='alert alert-" . $Type . " alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>" . $Title . "</strong> " . $Message . "</div>";

	}

	/**
	 * Força o download
	 *
	 * @access public
	 * @param string $Content
	 * @param string $Name (Default: null)
	 * @param bool $IsFile (Default: true)
	 * @return void
	 */
	public static function ForceDownload($Content, $Name = null, $IsFile = true)
	{
		if($IsFile)
		{
			if(!is_file($Content))
			{
				throw new Exception("Arquivo não encontrado.");
			}

			chmod($Content, 0777);

			$Name = ((!$Name) ? basename($Content) : $Name);
			$Extension = self::StringLower(substr(strrchr($Content, "."), 1));
			$Lenght = filesize($Content);
			$Content = file_get_contents($Content);
		}
		else
		{
			$Extension = self::StringLower(substr(strrchr($Name, "."), 1));
			$Lenght = strlen($Content);
		}

		switch ($Extension)
		{
			case "pdf": $ctype = "application/pdf"; break;
			case "exe": $ctype = "application/octet-stream"; break;
			case "zip": $ctype = "application/zip"; break;
			case "doc": $ctype = "application/msword"; break;
			case "xls": $ctype = "application/vnd.ms-excel"; break;
			case "ppt": $ctype = "application/vnd.ms-powerpoint"; break;
			case "gif": $ctype = "image/gif"; break;
			case "png": $ctype = "image/png"; break;
			case "jpe": case "jpeg": case "jpg": $ctype = "image/jpg"; break;
			default: $ctype = "application/force-download";
		}

		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		header("Content-Type: " . $ctype);
		header("Content-Disposition: attachment; filename=\"". $Name ."\";");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . $Lenght);
		echo $Content;
	}

	/**
	 * Gera chave para formulário
	 *
	 * @access public
	 * @param string $Name (Default: "")
	 * @return string
	 */
	public static function GenerateKeyForm($Name = "")
	{
		return "<input type=\"hidden\" id=\"hidFormKey" . $Name . "\" name=\"hidFormKey" . $Name . "\" value=\"1\" />";
	}

	/**
	 * Verifica chave do formulário
	 *
	 * @access public
	 * @param method $Method
	 * @param string $Name (Default: "")
	 * @return bool
	 */
	public static function CheckKeyForm($Method, $Name = "")
	{
		return ($Method && $Method["hidFormKey" . $Name] == "1");
	}

	/**
	 * Remove itens $_SERVER["QUERY_STRING"]
	 *
	 * @access public
	 * @param array $ar (Default: array())
	 * @param bool $encode (Default: false)
	 * @return string
	 */
	public static function RemoveQueryString($ar = array(), $encode = false)
	{
		$ret = "";
		$ar = ((is_array($ar)) ? $ar : array());
		$arParameter = explode("&", $_SERVER["QUERY_STRING"]);
		foreach($arParameter as $v)
		{
			if($v)
			{
				$parans = explode("=", $v);
				if(!in_array($parans[0], $ar))
				{
					$ret .= $v . (($encode) ? "&amp;" : "&");
				}
			}
		}
		return $ret;
	}

	/**
	 * Prepara template de respsota
	 *
	 * @access public
	 * @param string $Message (Default: null)
	 * @param string $TemplateName (Default: null)
	 * @param string $FolderTemplate (Default: "template-resposta")
	 * @param string $FileName (Default: "index.php")
	 * @return string
	 */
	public static function TemplateEmail($Message = null, $TemplateName = "padrao", $FolderTemplate = "template-email", $FileName = "index.php")
	{
		$File = dirname(dirname(__FILE__)) . "/" . $FolderTemplate . "/" . (($TemplateName) ? $TemplateName . "/" : "") . $FileName;

		if (is_file($File)) {
			//ob_start();
			//$_TEMPLATE = $Message;
			//include($File);
			//$Content = ob_get_contents();
			//ob_end_clean();

			//$Message $Content;
			$Template = file_get_contents($File);
			$Message  = str_replace(array("{{WebURL}}", "{{Message}}"), array(WebURL, $Message), $Template);
		}

		return $Message;
	}

	/**
	 * Formata tamanho do arquivo
	 *
	 * @access public
	 * @param int $Size
	 * @param int $Precision (Default: 0)
	 * @return string
	 */
	public static function FormatSize($Size, $Precision = 0)
	{
		if($Size == 0) return "";
		$Sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
		return (round($Size/pow(1024, ($i = floor(log($Size, 1024)))), $Precision) . $Sizes[$i]);
	}

	/**
	 * Prepara texto para colcoar na url
	 *
	 * @access public
	 * @param string $Text
	 * @param string $Separator (Default: "+")
	 * @return string
	 */
	public static function PrepareToURL($Text, $Separator = "-")
	{
		return self::StringLower(preg_replace(array("/ /", "/([^a-z0-9" . $Separator . "]+)/i"), array($Separator, ""), trim(self::ReplaceAccent($Text))));
	}

	/**
	 * Gera url amigável
	 *
	 * @access public
	 * @param string $Local
	 * @param string $Reference (Default: null)
	 * @param string $Title (Default: null)
	 * @param string $Extension (Default: "")
	 * @param string $Separator (Default: "/")
	 * @return string
	 */
	public static function GenerateFriendlyURL($Local, $Reference = null, $Title = null, $Extension = "", $Separator = "/")
	{
		$Param = "";
		if(is_array($Local))
		{
			foreach($Local as $c => $v)
			{
				$Param .= self::PrepareToURL($v) . $Separator;
			}
		}
		else
		{
			$Param = self::PrepareToURL($Local) . $Separator;
		}

		$Reference = (($Reference) ? $Reference . $Separator : "");
		$Title = (($Title) ? self::PrepareToURL($Title) . $Extension : "");

		return WebURL . $Param . $Reference . $Title;
	}

	/**
	 * Gera Thumbnail
	 *
	 * @access public
	 * @param string $Image
	 * @param int $Width
	 * @param int $Height
	 * @param string $ImageNotFound (Default: "")
	 * @param bool $Cut (Default: false)
	 * @param bool $Center (Default: false)
	 * @param bool $CenterX (Default: true)
	 * @param bool $CenterY (Default: true)
	 * @return string
	 */
	public static function Thumbnail($Image, $Width, $Height, $ImageNotFound = "", $Cut = false, $Center = false, $CenterX = true, $CenterY = true)
	{
		if(!$Image)
		{
			return $ImageNotFound;
		}

		try
		{
			$PathInfo = pathinfo($Image);

			$arGlob = glob(self::ParseDirectory("recortar-imagem", $Image) . $PathInfo["filename"] . "_" . $Width . "x" . $Height . "_*");
			if(is_array($arGlob))
			{
				foreach($arGlob as $File)
				{
					$Image = self::ParseFilePath($File);
					$PathInfo = pathinfo($Image);
					break;
				}
			}

			$Path = self::ParseDirectory("thumb", str_replace(DirectoryUserFilesName . "recortar-imagem/", DirectoryUserFilesName, $Image), true) . $PathInfo["filename"] . "_" . $Width . "x" . $Height . "_" . (($Cut) ? 1 : 0) . "_" . (($Center) ? 1 : 0) . "_" . (($CenterX) ? 1 : 0) . "_" . (($CenterY) ? 1 : 0) . "." . $PathInfo["extension"];

			if(!is_file($Path))
			{
				include_once(dirname(__FILE__) . "/resize.php");

				$oResize = new Resize(((is_file($Image)) ? "" : dirname(dirname(__FILE__))) . $Image);
				$oResize->NewWidth = $Width;
				$oResize->NewHeight = $Height;
				$oResize->IsCut = $Cut;
				$oResize->IsCenter = $Center;
				$oResize->IsCenterX = $CenterX;
				$oResize->IsCenterY = $CenterY;
				$oResize->Create(false, $Path);
			}

			if(strpos(WebURL, 'localhost'))
			{
				return $Path;
			}
			else
			{
				return WebURL . substr(self::ParseFilePath($Path), 1);
			}
		}
		catch(Exception $e)
		{
			return $ImageNotFound;
		}
	}

	/**
	 * Recortar imagem
	 *
	 * @access public
	 * @param string $Image
	 * @param int $Width
	 * @param int $Height
	 * @param string $AspectRatio (Default: null)
	 * @param int $MinWidth (Default: null)
	 * @param int $MinHeight (Default: null)
	 * @param int $MaxWidth (Default: null)
	 * @param int $MaxHeight (Default: null)
	 * @param string $Title (Default: null)
	 * @return void
	 */
	public static function CropImage($Image, $Width, $Height, $AspectRatio = null, $MinWidth = null, $MinHeight = null, $MaxWidth = null, $MaxHeight = null, $Title = null)
	{
		if(!$Image) return;

		$Width = ((is_array($Width)) ? $Width : array($Width));
		$Height = ((is_array($Height)) ? $Height : array($Height));
		$AspectRatio = ((is_array($AspectRatio)) ? $AspectRatio : array($AspectRatio));
		$MinWidth = ((is_array($MinWidth)) ? $MinWidth : array($MinWidth));
		$MinHeight = ((is_array($MinHeight)) ? $MinHeight : array($MinHeight));
		$MaxWidth = ((is_array($MaxWidth)) ? $MaxWidth : array($MaxWidth));
		$MaxHeight = ((is_array($MaxHeight)) ? $MaxHeight : array($MaxHeight));
		$Title = ((is_array($Title)) ? $Title : array($Title));

		if(count($Width) < 1 || count($Height) < 1) return;

		$PathInfo = pathinfo($Image);
		$ImageURL = self::Thumbnail($Image, 950, 500);
		$ImageSource = str_replace(WebURL, DirectoryRoot . "/", $ImageURL);
		$ImageSize = getimagesize($ImageSource);
		$ImageWidth = intval($ImageSize[0]);
		$ImageHeight = intval($ImageSize[1]);

		?>
		<table class="lista" style="width:auto;">
			<?php
			foreach($Width as $p => $w)
			{
				$ImageCut = glob(self::ParseDirectory("recortar-imagem", $Image) . $PathInfo["filename"] . "_" . $Width[$p] . "x" . $Height[$p] . "_*");

				if(is_array($ImageCut) && count($ImageCut) > 0)
				{
					$ImageCutPathInfo = pathinfo($ImageCut[0]);
					$ImageCutPosition = array_reverse(explode("_", $ImageCutPathInfo["filename"]));

					$x1 = intval($ImageCutPosition[3]);
					$y1 = intval($ImageCutPosition[2]);
					$x2 = intval($ImageCutPosition[1]);
					$y2 = intval($ImageCutPosition[0]);
				}
				else
				{
					$x1 = 0;
					$y1 = 0;
					$x2 = $ImageWidth;
					$y2 = $ImageHeight;
				}

				?>
				<tr>
					<td><?=$Title[$p];?></td>
					<td align="center"><?=$Width[$p];?>x<?=$Height[$p];?></td>
					<td align="center"><a href="javascript:void(0);" onclick="cropImage.init(this, '<?=WebURL;?>', '<?=$Image;?>', '<?=$ImageURL;?>', '<?=$ImageSource;?>', <?=$ImageWidth;?>, <?=$ImageHeight;?>, <?=intval($Width[$p]);?>, <?=intval($Height[$p]);?>, <?=intval($x1);?>, <?=intval($y1);?>, <?=intval($x2);?>, <?=intval($y2);?>, '<?=$AspectRatio[$p];?>', <?=intval($MinWidth[$p]);?>, <?=intval($MinHeight[$p]);?>, <?=intval($MaxWidth[$p]);?>, <?=intval($MaxHeight[$p]);?>);"><img title="Recortar" alt="Recortar" src="<?=WebURL;?>imgs/botoes/recortar.png" /></a></td>
				</tr>
			<?php
			}
			?>
		</table>
	<?php
	}

	/**
	 * Download URL
	 *
	 * @access public
	 * @param string $Arquivo
	 * @param string $Path (Default: "..")
	 * @return string
	 */
	public static function DownloadURL($Arquivo, $Path = "..")
	{
		return WebURL . "biblioteca/download.php?path=" . $Path . $Arquivo;
	}

	/**
	 * Verifica se conteudo está em branco
	 *
	 * @access public
	 * @param string $Text
	 * @return bool
	 */
	public static function IsClear($Text)
	{
		$Text = trim(strip_tags(self::HTMLDecode($Text)));
		return (strlen($Text) <= 1);
	}

	/**
	 * Cria itens do select por array
	 *
	 * @access public
	 * @param array $Array
	 * @param string $Value (Default: null)
	 * @param bool $UseKey (Default: true)
	 * @return void
	 */
	public static function ddlByArray($Array, $Value = null, $UseKey = true)
	{
		$Array = ((is_array($Array)) ? $Array : array());
		foreach($Array as $k => $v)
		{
			?>
			<option value="<?=(($UseKey) ? $k : $v);?>" <?php if((($UseKey) ? $k : $v) == $Value) { ?> selected="selected" <?php } ?> ><?=$v;?></option>
		<?php
		}
	}

	/**
	 * Cria itens do select por objeto
	 *
	 * @access public
	 * @param string $Value (Default: null)
	 * @param string $FieldShow (Default: "Titulo")
	 * @param string $FieldValue (Default: "ID")
	 * @return void
	 */
	public function ddlByObject($Value = null, $FieldShow = "Titulo", $FieldValue = "ID")
	{
		for($c = 0; $c < $this->NumRows; $c++)
		{
			?>
			<option value="<?=$this->{$FieldValue};?>" <?php if($this->{$FieldValue} == $Value) { ?> selected="selected" <?php } ?> ><?=$this->{$FieldShow};?></option>
			<?php
			$this->MoveNext();
		}
	}

	/**
	 * Cria json por objeto
	 *
	 * @access public
	 * @param string $FieldShow (Default: "Titulo")
	 * @param string $FieldValue (Default: "ID")
	 * @return string
	 */
	public function jsonByObject($FieldShow = "Titulo", $FieldValue = "ID")
	{
		$ar = array();
		for($c = 0; $c < $this->NumRows; $c++)
		{
			$ar[$this->{$FieldValue}] = $this->{$FieldShow};
			$this->MoveNext();
		}
		return json_encode($ar);
	}

	/**
	 * StringUpper
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function StringUpper($Text)
	{
		return strtr(strtoupper($Text), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
	}

	/**
	 * StringLower
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function StringLower($Text)
	{
		return strtr(strtolower($Text), "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß", "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
	}

	/**
	 * Cria navegação estruturada
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function breadcrumb($url_pieces = array(), $divisor = ">")
	{
		$href = "";
		//verifica se foram passados parametros
		if ($url_pieces)
		{
			$url_crumb = $url_pieces;
			$http = null;
		}
		else
		{
			//senão não houver parametro
			//então criar a url automaticamente
			$http = 'http://';
			$request = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$explode = explode('/', $request);
			foreach($explode as $explode)
			{
				$url_crumb[str_replace('.php', '', $explode)] = str_replace('.php', '', $explode);
			}
		}
		//quantidade de fragmentos da url
		$count = sizeof($url_crumb);
		//inicia contador
		$i = 1;
		foreach($url_crumb as $link=>$inner)
		{
			//verifica se é o primeiro fragmento da url
			if($i == 1)
			{
				$href .= $http.$link;
			}
			else
			{
				$href .= $link;
			}
			//verifica se é o ultimo fragmento da url
			if($i == $count)
			{
				//mostrar fragmento sem link
				$crumb[] = '<span>'.($inner).'</span>';
			}
			else
			{
				//mostrar fragmento com link para a pagina
				$crumb[] = '<a href="'.$href.'" title="'.$inner.'">'.$inner.'</a> '.$divisor.' ';
			}
			$i++;
		}
		//mostrar breadcrumb na tela
		echo "<div class='breadcrumb'>";
		foreach($crumb as $crumb)
		{
			echo $crumb;
		}
		echo "</div>";
	}


	/**
	 * Busca endereço pelo CEP
	 *
	 * @access public
	 * @param string $Text
	 * @return array
	 */
	public static function buscaCep($cep)
	{
	$resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');
	if(!$resultado){
		$resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";
	}
	parse_str($resultado, $retorno);

	return $retorno;

	/* CAMPOS RETORNADOS

	$retorno['resultado'] - 2:(cidade e estado) 1:(endereço completo)
	$retorno['tipo_logradouro']
	$retorno['logradouro']
	$retorno['bairro']
	$retorno['cidade']
	$retorno['uf']

	*/
	}

	/**
	 * Limpa os espaços em branco
	 *
	 * @access public
	 * @param string $Text
	 * @return string
	 */
	public static function Clear($Text)
	{
		return trim($Text);
	}

	/**
	 * Aplicar tratamentos nos valores do array
	 *
	 * @access public
	 * @param string $Name
	 * @return array
	 */
	public static function Array2Post($Name)
	{
		if (!isset($_POST[$Name])) return array();
		return (array) array_unique(array_map("Util::Clear", $_POST[$Name]));
	}

	/**
	 * Obter valor da sessão
	 *
	 * @access public
	 * @param string $Chave
	 * @return string
	 */
	public static function GetSession($Chave)
	{
		return isset($_SESSION[SessionName][$Chave]) ? $_SESSION[SessionName][$Chave] : null;
	}

	/**
	 * Retornar JSON
	 *
	 * @access public
	 * @param array $Array
	 * @return void
	 */
	public static function ReturnJSON($Array)
	{
		header("Content-Type: application/json");
		echo json_encode($Array);
		exit();
	}

	/**
	 * Verifica requisição ajax
	 *
	 * @access public
	 * @return boolean
	 */
	public static function IsAjax()
	{
		return $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest";
	}
}

Util::InitSet();
Util::CheckVariables();

?>
