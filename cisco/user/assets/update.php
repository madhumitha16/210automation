    <?php
    include('../config.php');
    
        // Update Fish Image
if(isset($_FILES["updatefish"]) && $_FILES["updatefish"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["updatefish"]["name"];
        $filetype = $_FILES["updatefish"]["type"];
        $filesize = $_FILES["updatefish"]["size"];
		
		$id = $_POST["id"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit. Please Upload less then 5MB");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/fish/" . $_FILES["updatefish"]["name"])){
                echo "<script>alert('".$_FILES['updatefish']['name']." is already exists.');
                window.location.href = 'http://batechnology.in/wdpapp/fish.php';
                </script>";
            } else {
                move_uploaded_file($_FILES["updatefish"]["tmp_name"], "../products/fish/" . $_FILES["updatefish"]["name"]);
				$sql = mysqli_query($conn, "update fish set image = '".$filename."' where id = '".$id."'");
                echo "<script>alert('Your image has been changed successfully.');
                window.location.href = 'http://batechnology.in/wdpapp/fish.php';
                </script>";
            } 
        } else {
            echo "<script>alert('Error: There was a problem uploading your file. Please try again.');
                window.location.href = 'http://batechnology.in/wdpapp/fish.php';
                </script>";
        }
    } else if ($_FILES["updatefish"]["error"] > 0){
        echo "<script>alert('Error:". $_FILES['updatefish']['error'] .");
                window.location.href = 'http://batechnology.in/wdpapp/fish.php';
                </script>";
    }
    
     // Update Chicken Image
if(isset($_FILES["updatechicken"]) && $_FILES["updatechicken"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["updatechicken"]["name"];
        $filetype = $_FILES["updatechicken"]["type"];
        $filesize = $_FILES["updatechicken"]["size"];
		
		$id = $_POST["id"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit. Please Upload less then 5MB");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/chicken/" . $_FILES["updatechicken"]["name"])){
                echo "<script>alert('".$_FILES['updatechicken']['name']." is already exists.');
                window.location.href = 'http://batechnology.in/wdpapp/chicken.php';
                </script>";
            } else {
                move_uploaded_file($_FILES["updatechicken"]["tmp_name"], "../products/chicken/" . $_FILES["updatechicken"]["name"]);
				$sql = mysqli_query($conn, "update chicken set image = '".$filename."' where id = '".$id."'");
                echo "<script>alert('Your image has been changed successfully.');
                window.location.href = 'http://batechnology.in/wdpapp/chicken.php';
                </script>";
            } 
        } else {
            echo "<script>alert('Error: There was a problem uploading your file. Please try again.');
                window.location.href = 'http://batechnology.in/wdpapp/chicken.php';
                </script>";
        }
    } else if ($_FILES["updatechicken"]["error"] > 0){
        echo "<script>alert('Error:". $_FILES['updatechicken']['error'] .");
                window.location.href = 'http://batechnology.in/wdpapp/chicken.php';
                </script>";
    }
    
         // Update Coat Image
if(isset($_FILES["updatecoat"]) && $_FILES["updatecoat"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["updatecoat"]["name"];
        $filetype = $_FILES["updatecoat"]["type"];
        $filesize = $_FILES["updatecoat"]["size"];
		
		$id = $_POST["id"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit. Please Upload less then 5MB");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../products/coat/" . $_FILES["updatecoat"]["name"])){
                echo "<script>alert('".$_FILES['updatecoat']['name']." is already exists.');
                window.location.href = 'http://batechnology.in/wdpapp/coat.php';
                </script>";
            } else {
                move_uploaded_file($_FILES["updatecoat"]["tmp_name"], "../products/coat/" . $_FILES["updatecoat"]["name"]);
				$sql = mysqli_query($conn, "update coat set image = '".$filename."' where id = '".$id."'");
                echo "<script>alert('Your image has been changed successfully.');
                window.location.href = 'http://batechnology.in/wdpapp/coat.php';
                </script>";
            } 
        } else {
            echo "<script>alert('Error: There was a problem uploading your file. Please try again.');
                window.location.href = 'http://batechnology.in/wdpapp/coat.php';
                </script>";
        }
    } else if ($_FILES["updatecoat"]["error"] > 0){
        echo "<script>alert('Error:". $_FILES['updatecoat']['error'] .");
                window.location.href = 'http://batechnology.in/wdpapp/coat.php';
                </script>";
    }
    
include('../footer.php');
?>