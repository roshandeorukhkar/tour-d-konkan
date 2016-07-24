<?php
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/

// Set the uplaod directory

$uploadDir = 'uploads/most_visted_place/';

//$uploadDir = _FILE_MOVE_TO.'video/thumbnail';

// Set the allowed file extensions   
$fileTypes = array('jpg', 'jpeg', 'gif', 'png','JPG','JPEG','tiff','TIFF','bmp','BMP'); // Allowed file extensions
$unique = md5(uniqid(rand(),true));
$verifyToken = md5('unique_salt' . @$_POST['timestamp']);

//Swapnil K: MIME check On:26-10-15
$array_mime= 'image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/x-windows-bmp,image/tiff,image/x-tiff';
$array_ext = 'jpg,jpeg,gif,png,JPG,JPEG,tiff,TIFF,bmp,BMP';
/* if(chk_file_ext(@$_FILES['Filedata']['tmp_name'],@$_FILES['Filedata']['name'],$array_mime,$array_ext)=='1') 
{ */
//Swapnil K: MIME check On:26-10-15

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$uploadDir  = $uploadDir;
			//$targetFile = $uploadDir . $unique.'_'.$_FILES['Filedata']['name'];
			
			$string = str_replace('', '_', $_FILES['Filedata']['name']);
			$varstoring=preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // form storing in db
			$targetFile = $uploadDir. '/' .$unique.'_'.preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
			
			//Validate the filetype
			//$fileParts = pathinfo($_FILES['Filedata']['name']);
			//if (in_array(strtolower($fileParts['extension']), $fileTypes)) 
			//{   
				move_uploaded_file(trim($tempFile), trim($targetFile));
				echo trim($unique.'_'.preg_replace('/[^A-Za-z0-9\-.]/', '', $varstoring));
			//} 
			//else 
			//{
			//	echo 'Error';
			//}
		}
		else	
			echo "Error";
/* }
else
{
	echo "Error";
}  */
?>