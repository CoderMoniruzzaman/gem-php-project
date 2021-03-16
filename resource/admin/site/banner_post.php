<?php
require '../../../session.php';
require '../../db.php';

// validation
$ban_h_err='';
$ban_slg_err='';
$ban_img_err='';
$ban_succ = '';

$ban_heading = $_POST['banner_heading'];
$ban_slg = $_POST['banner_slog'];
$filename = $_FILES['banner_image']['name'];
$filesize = $_FILES['banner_image']['size'];
$filetemp = $_FILES['banner_image']['tmp_name'];
$status = $_POST['status'];

if(empty($_POST['banner_heading'])){
	$ban_h_err = "Please enter banner heading";
	header('location:../../../banner.php?banhdrr='.$ban_h_err);
    exit();
}
else if(empty($_POST['banner_slog'])){
	$ban_slg_err = "Please enter banner slogan";
	header('location:../../../banner.php?banslgdrr='.$ban_slg_err);
    exit();
}

else if(empty($filename)){
    $ban_img_err = "Please choose image file to upload";
	header('location:../../../banner.php?banimerr='.$ban_img_err);
    exit();
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
                $update_status = "UPDATE banner SET status=0";
                $update_query = mysqli_query($db_conection,$update_status);
                
                $insert = "INSERT INTO banner (banner_heading, banner_slog, status) VALUES ('$ban_heading','$ban_slg','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/banner/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE banner SET banner_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $ban_succ = "banner Added successfully";
                header('location:../../../banner.php?bansucc='.$ban_succ);
            }
            else{
                $insert = "INSERT INTO banner (banner_heading, banner_slog, status) VALUES ('$ban_heading','$ban_slg','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/banner/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE banner SET banner_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $ban_succ = "banner Added successfully";
                header('location:../../../banner.php?bansucc='.$ban_succ);
            }
        }
        else{
            $ban_img_err = "File too large";
	        header('location:../../../banner.php?banimerr='.$ban_img_err);
        }
    }
    else{
        $ban_img_err = "Invalid File Format";
	    header('location:../../../banner.php?banimerr='.$ban_img_err);
    }
}

?>