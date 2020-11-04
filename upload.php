<?php
	ini_set('upload_max_filesize', '10M');
	
	function insertFile($picture){
		include("conn/conn.php");
		$sql = $mysqli->query("INSERT INTO `picture` (picture_id, picture) VALUES (NULL, '$picture')");
		if($sql){
			return true;
		}else{
			return false;
		}
	}
	
    if(!isset($_FILES['picture'])){
		echo "No file selected";
	}
	else{
		
		$error=array();
		$extension=array("jpeg","jpg","png","gif", "docx", "pdf", "xlsx");
		foreach($_FILES["picture"]["tmp_name"] as $key=>$tmp_name)
		{
			echo "<br/>picture: ".$file_name=$_FILES["picture"]["name"][$key];
			echo "<br/>Temporary: ".$file_tmp=$_FILES["picture"]["tmp_name"][$key];
			echo "<br/>Size: ".$size=$_FILES["picture"]["size"][$key];
			echo "<br/>Extension: ".$ext=pathinfo($file_name, PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
                
					if(!file_exists("img/".$file_name)){
						if(move_uploaded_file($file_tmp=$_FILES["picture"]["tmp_name"][$key], "img/".$file_name)){
							 $insert = insertFile($file_name);
							   if($insert){
									header("location: admin_picture.php?success=true");
							   }
								else{
									echo mysql_error();
								}
						}
					
					}
					else
						{
							$picture=basename($file_name,$ext);
							$newpicture=$picture.time().".".$ext;
							if(move_uploaded_file($file_tmp=$_FILES["picture"]["tmp_name"][$key], "img/".$newpicture)){
								$insert = insertFile($newpicture);
								if($insert){
									header("location: admin_picture.php?success=true");
								}
                            }
						}
			}
			else{
				echo "The file you upload is not included in allowed file extension list.";
			}
			
		}	
	}
?>