<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors', 'On');
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.http_input', 'auto');
ini_set('mbstring.http_output', 'UTF-8');
ini_set('mbstring.internal_encoding', 'UTF-8');

$agent = $_SERVER['HTTP_USER_AGENT'];

if($_GET['f']){
	$fileName = "./".$_GET['f'];
	if(file_exists($fileName)){
		include_once($fileName);
	}elseif(file_exists($fileName."index.php")){
		include_once($fileName."index.php");
	}else{
		$fileName = "../".$_GET['f'];
		if(file_exists($fileName)){
			include_once($fileName);
		}elseif(file_exists($fileName."index.php")){
			include_once($fileName."index.php");
		}else{
			header("HTTP/1.0 404 Not Found");
		}
	}
}elseif($_GET['nf']){
	$fileName = "../".$_GET['nf'];
	if(file_exists($fileName)){
		$ext = mb_strtolower(substr($fileName, strrpos($fileName, '.') + 1));
		if($ext === "php"){
			include_once($fileName);
		}else{
			$mimeType = getMimeType($ext);
			if($mimeType){header('Content-Type: '.$mimeType);}
			readfile($fileName);
		}
	}else{
		//print $fileName;
		header("HTTP/1.0 404 Not Found");
	}
}else{
	include('./index.php');
}

function getMimeType($ext){
	if(!$ext){return "";}
	
	$mimeTypeList = array(
		'pdf'	 => 'application/pdf',
		'xml'	 => 'application/xml',
		'xhtml'	 => 'application/xhtml+xml',
		'zip'	 => 'application/zip',
		'lzh'	 => 'application/x-lzh',
		'rar'	 => 'application/x-rar-compressed',
		'tar'	 => 'application/x-tar',
		'mp3'	 => 'audio/mpeg',
		'm4a'	 => 'audio/aac',
		'ogg'	 => 'audio/ogg',
		'wav'	 => 'audio/wav',
		'gif'	 => 'image/gif',
		'jpg'	 => 'image/jpeg',
		'jpeg'	 => 'image/jpeg',
		'png'	 => 'image/png',
		'ico'	 => 'image/x-icon',
		'svg'	 => 'image/svg+xml',
		'svgz'	 => 'image/svg+xml',
		'css'	 => 'text/css',
		'html'	 => 'text/html',
		'htm'	 => 'text/html',
		'js'	 => 'text/javascript',
		'txt'	 => 'text/plain',
		'mpeg'	 => 'ideo/mpeg',
		'mpg'	 => 'video/mpeg',
		'mp4'	 => 'video/mp4',
		'webm'	 => 'video/webm',
		'ogv'	 => 'video/ogg',
		'qt'	 => 'video/quicktime',
		'mov'	 => 'video/quicktime',
		'doc'	 => 'application/msword',
		'xls'	 => 'application/vnd.ms-excel ',
		'ppt'	 => 'application/vnd.ms-powerpoint',
		'docx'	 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'xlsx'	 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'pptx'	 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
	);
	$mimeType  = $mimeTypeList[$ext];
	if(!$mimeType){
		return "";
	}else{
		return ($mimeType);
	}
}
?>