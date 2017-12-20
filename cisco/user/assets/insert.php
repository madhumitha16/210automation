<?php

include('../header.php');

    // insert file OVA
    if(isset($_FILES["fileova"]) && $_FILES["fileova"]["error"] == 0){
        //$allowed = array("ovf" => "text/ovf", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
		
		$allowed = array("ovf" => "text/ovf");
        $filename = $_FILES["fileova"]["name"];
        $filetype = $_FILES["fileova"]["type"];
        $filesize = $_FILES["fileova"]["size"];
		
		$userid = $_POST["id"];
		$file_name = $_POST["filename"];
		$desc = $_POST["desc"];
    
        // Verify file extension
        //$ext = pathinfo($filename, PATHINFO_EXTENSION);
        /*if(!array_key_exists($ext, $allowed)) {
			$_SESSION['nresponse'] = "Error: Please select a valid file format."; 
			header('location: ../fileupload.php');
		}*/
		
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) {
			$_SESSION['nresponse'] = "Error: File size is larger than the allowed limit."; 
			header('location: ../fileupload.php');
		}
    
        // Verify MYME type of the file
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
        if($ext=='.ovf'){
            // Check whether file exists before uploading it
            if(file_exists("../files/" . $_FILES["fileova"]["name"])){
                $_SESSION['nresponse'] = $_FILES["fileova"]["name"] . " is already exists.";
                header('location: ../fileupload.php');
            } else{
                move_uploaded_file($_FILES["fileova"]["tmp_name"], "../files/" . $_FILES["fileova"]["name"]);
				$sql = mysqli_query($conn, "insert into file (userid, filename, name, description) values ('".$userid."', '".$filename."', '".$file_name."', '".$desc."')");
                $_SESSION['presponse'] = "Your File was uploaded successfully.";
				header('location: ../fileupload.php');
            } 
        } else{
            $_SESSION['nresponse'] = "Error: File format is not allowed. " .$ext; 
			header('location: ../fileupload.php');
        }
    } else if($_FILES["fileova"]["error"] > 0){
        $_SESSION['nresponse'] = "Error: " . $_FILES["fileova"]["error"];
		header('location: ../fileupload.php');
    }
    
   
    
include('../footer.php');
?>