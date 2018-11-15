<?php
error_reporting (E_ALL ^ E_NOTICE);

#################################################################################################
#	IMAGE FUNCTIONS FILE  - Adjust directory as required									   	#
#	Please also adjust the directory to this file in the "index.php" page						#
	include("image_functions.php"); 									#
#################################################################################################

########################################################
#	UPLOAD THE IMAGE								   #
if ($_POST["upload"]=="Upload") { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = " شما فقط مجاز به انتخاب فایلهایی با فرمت های <strong>".$image_ext."</strong> می باشید <br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1090048576)) {
			$error.= "hjme file shoma bayad kamtar az ".$max_file."MB  bashad";
		}
		
	}else{
		$error= "Please select an image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
			$large_image_location = $large_image_location.".".$file_ext;
			$thumb_image_location = $thumb_image_location.".".$file_ext;
			
			//put the file ext in the session so we know what file to look for once its uploaded
			if($_SESSION['user_file_ext']!=$file_ext){
				$_SESSION['user_file_ext']="";
				$_SESSION['user_file_ext']=".".$file_ext;
			}
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}                       
			echo "success|".$large_image_location."|".getWidth($large_image_location)."|".getHeight($large_image_location);
		}
	}else{
		echo "error|".$error;
	}
}

########################################################
#	CREATE THE THUMBNAIL							   #
if ($_POST["save_thumb"]=="Save Thumbnail") { 
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$large_image_location = $large_image_location.$_SESSION['user_file_ext'];
	$thumb_image_location = $thumb_image_location.$_SESSION['user_file_ext'];
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	echo "success|".$large_image_location."|".$thumb_image_location ;
	$_SESSION['random_key']= "";
	$_SESSION['user_file_ext']= "";
}

#####################################################
#	DELETE BOTH IMAGES								#
if ($_POST['a']=="delete" && strlen($_POST['large_image'])>0  ){
//get the file locations 
	$large_image_location = $_POST['large_image'];
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	echo "success|Files have been deleted";
}
?>