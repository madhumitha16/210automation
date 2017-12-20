<?php

include('../header.php');

    // insert chicken
    if(isset($_FILES["prodimg"]) && $_FILES["prodimg"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["prodimg"]["name"];
        $filetype = $_FILES["prodimg"]["type"];
        $filesize = $_FILES["prodimg"]["size"];
		
		$prodid = $_POST["prodid"];
		$prodname = $_POST["prodname"];
		$prodprice = $_POST["prodprice"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/chicken/" . $_FILES["prodimg"]["name"])){
                $_SESSION['nresponse'] = $_FILES["prodimg"]["name"] . " is already exists.";
                header('location: ../chicken.php');
            } else{
                move_uploaded_file($_FILES["prodimg"]["tmp_name"], "../products/chicken/" . $_FILES["prodimg"]["name"]);
				$sql = mysqli_query($conn, "insert into chicken (product_name, product_price, image, product_id) values ('".$prodname."', '".$prodprice."', '".$filename."', '".$prodid."')");
                $_SESSION['presponse'] = "Your Product was uploaded successfully.";
				header('location: ../chicken.php');
            } 
        } else{
            $_SESSION['nresponse'] = "Error: There was a problem uploading your file. Please try again."; 
			header('location: ../chicken.php');
        }
    } else if($_FILES["prodimg"]["error"] > 0){
        $_SESSION['nresponse'] = "Error: " . $_FILES["prodimg"]["error"];
		header('location: ../chicken.php');
    }
    
    // insert coat
    if(isset($_FILES["prodcoat"]) && $_FILES["prodcoat"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["prodcoat"]["name"];
        $filetype = $_FILES["prodcoat"]["type"];
        $filesize = $_FILES["prodcoat"]["size"];
		
		$prodid = $_POST["prodid"];
		$prodname = $_POST["prodname"];
		$prodprice = $_POST["prodprice"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/coat/" . $_FILES["prodcoat"]["name"])){
                $_SESSION['nresponse'] = $_FILES["prodcoat"]["name"] . " is already exists.";
                header('location: ../coat.php');
            } else{
                move_uploaded_file($_FILES["prodcoat"]["tmp_name"], "../products/coat/" . $_FILES["prodcoat"]["name"]);
				$sql = mysqli_query($conn, "insert into coat (product_name, product_price, image, product_id) values ('".$prodname."', '".$prodprice."', '".$filename."', '".$prodid."')");
                $_SESSION['presponse'] = "Your Product was uploaded successfully.";
				header('location: ../coat.php');
            } 
        } else{
            $_SESSION['nresponse'] = "Error: There was a problem uploading your file. Please try again."; 
			header('location: ../coat.php');
        }
    } else if ($_FILES["prodcoat"]["error"] > 0){
        $_SESSION['nresponse'] = "Error: " . $_FILES["prodimg"]["error"];
		header('location: ../coat.php');
    }
    
    
        // insert Fish
    if(isset($_FILES["prodfish"]) && $_FILES["prodfish"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["prodfish"]["name"];
        $filetype = $_FILES["prodfish"]["type"];
        $filesize = $_FILES["prodfish"]["size"];
		
		$prodid = $_POST["prodid"];
		$prodname = $_POST["prodname"];
		$prodprice = $_POST["prodprice"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/fish/" . $_FILES["prodfish"]["name"])){
                $_SESSION['nresponse'] = $_FILES["prodfish"]["name"] . " is already exists.";
                header('location: ../fish.php');
            } else{
                move_uploaded_file($_FILES["prodfish"]["tmp_name"], "../products/fish/" . $_FILES["prodfish"]["name"]);
				$sql = mysqli_query($conn, "insert into fish (product_name, product_price, image, product_id) values ('".$prodname."', '".$prodprice."', '".$filename."', '".$prodid."')");
                $_SESSION['presponse'] = "Your Product was uploaded successfully.";
				header('location: ../fish.php');
            } 
        } else {
            $_SESSION['nresponse'] = "Error: There was a problem uploading your file. Please try again."; 
			header('location: ../fish.php');
        }
    } else if ($_FILES["prodfish"]["error"] > 0){
        $_SESSION['nresponse'] = "Error: " . $_FILES["prodimg"]["error"];
		header('location: ../fish.php');
    }
    
include('../footer.php');
?>