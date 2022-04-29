<?php 
session_start();
include('../connect.php');
$b = $_POST['workorder_number'];
$images = array();
   foreach($_FILES['images']['name'] as $key=>$val){        
        $upload_dir = "uploads/";
        $upload_image = $upload_dir.$_FILES['images']['name'][$key];
		$filename = $_FILES['images']['name'][$key];		
        if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)){
            $images[] = $upload_image;
			$insert_sql = "INSERT INTO images(image_workorder, image_name) VALUES('$b', '".$filename."')";
			mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
        }
    }
?>
<?php
//redirect to entries page
header("location: entries.php");
?>