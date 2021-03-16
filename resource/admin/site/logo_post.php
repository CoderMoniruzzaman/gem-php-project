<?php
require '../../../session.php';
require '../../db.php';

// validation
$status = $_POST['status'];
$filename = $_FILES['logo']['name'];
$filesize = $_FILES['logo']['size'];
$filetemp = $_FILES['logo']['tmp_name'];
$logo_err='';
$logo_succ = '';
if(empty($filename)){
    $logo_err = "Please choose image file to upload";
	header('location:../../../logo.php?logoerr='.$logo_err);
    // echo "plase ulpoad file";
}
else{
    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    // echo $extention;
    $allowed_extention = array('jpg','jpeg','PNG','gif','png');
    if(in_array($extention, $allowed_extention)){
        if($filesize <= 10000000){
            // echo "ok";
             if($status==1){
                $update_status = "UPDATE logo SET status=0";
                $update_query = mysqli_query($db_conection,$update_status);
                
                $insert = "INSERT INTO logo (status) VALUES ('$status')";
	 		    $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
	 		    $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/logo/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE logo SET logo='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $logo_succ = "Logo uploaded successfully";
                header('location:../../../logo.php?logosucc='.$logo_succ);
             }
             else{
                $insert = "INSERT INTO logo (status) VALUES ('$status')";
	 		    $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
	 		    $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/logo/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE logo SET logo='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $logo_succ = "Logo uploaded successfully";
                header('location:../../../logo.php?logosucc='.$logo_succ);
             }
        }
        else{
            $logo_err = "File too large";
	        header('location:../../../logo.php?logoerr='.$logo_err);
        }
    }
    else{
        $logo_err = "Invalid File Format";
	    header('location:../../../logo.php?logoerr='.$logo_err);
    }
}

?>