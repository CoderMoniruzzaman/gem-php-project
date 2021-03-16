<?php
require '../../../session.php';
require '../../db.php';

// validation
$about_d_err='';
$about_img_err='';
$about_succ = '';

$about_des = $_POST['about_description'];
$filename = $_FILES['about_image']['name'];
$filesize = $_FILES['about_image']['size'];
$filetemp = $_FILES['about_image']['tmp_name'];
$status = $_POST['status'];

if(empty($_POST['about_description'])){
	$about_d_err = "Please type about description";
	header('location:../../../about.php?aboutddrr='.$about_d_err);
    exit();
}

else if(empty($filename)){
    $about_img_err = "Please choose image file to upload";
	header('location:../../../about.php?aboutimerr='.$about_img_err);
    exit();
}
else{
    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    $allowed_extention = array('jpg','jpeg','PNG','gif','png');
    if(in_array($extention, $allowed_extention)){
        if($filesize <= 10000000){
            // echo "ok";
            if($status==1){
                $update_status = "UPDATE about SET status=0";
                $update_query = mysqli_query($db_conection,$update_status);

                $insert = "INSERT INTO about (about_description, status) VALUES ('$about_des','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/about/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE about SET about_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $about_succ = "About Added successfully";
                header('location:../../../about.php?aboutsucc='.$about_succ);
            }
            else{
                $insert = "INSERT INTO about (about_description, status) VALUES ('$about_des','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/about/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE about SET about_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $about_succ = "About Added successfully";
                header('location:../../../about.php?aboutsucc='.$about_succ);
            }
        }
        else{
            $about_img_err = "File too large";
	        header('location:../../../about.php?aboutimerr='.$about_img_err);
        }
    }
    else{
        $about_img_err = "Invalid File Format";
	    header('location:../../../about.php?aboutimerr='.$about_img_err);
    }
}




?>