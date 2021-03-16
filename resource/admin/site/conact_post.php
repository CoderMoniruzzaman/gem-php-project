<?php
require '../../../session.php';
require '../../db.php';

$address_err='';
$phone_err='';
$email_err='';
$web_err='';
$img_err='';
$succ = '';
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$web = $_POST['web'];
$filename = $_FILES['conact_image']['name'];
$filesize = $_FILES['conact_image']['size'];
$filetemp = $_FILES['conact_image']['tmp_name'];
$status = $_POST['status'];

// validation
if(empty($_POST['address'])){
	$address_err = "Please enter address";
	header('location:../../../contact.php?addressrr='.$address_err);
    exit();
}
else if(empty($_POST['phone'])){
	$phone_err = "Please enter phone";
	header('location:../../../contact.php?phoneerr='.$phone_err);
    exit();
}
else if(empty($_POST['email'])){
	$email_err = "Please enter email";
	header('location:../../../contact.php?emailerr='.$email_err);
    exit();
}
else if(empty($_POST['web'])){
	$web_err = "Please enter webiste";
	header('location:../../../contact.php?weberr='.$web_err);
    exit();
}

else if(empty($filename)){
    $img_err = "Please choose image file to upload";
	header('location:../../../contact.php?imageerr='.$img_err);
    exit();
}
else{
    
    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    $allowed_extention = array('jpg','jpeg','PNG','gif','png');
    if(in_array($extention, $allowed_extention)){
        if($filesize <= 10000000){
            if($status==1){
                $update_status = "UPDATE contact SET status=0";
                $update_query = mysqli_query($db_conection,$update_status);
                $insert = "INSERT INTO `contact`(`address`, `phone`, `email`, `web`, `status`) VALUES ('$address','$phone','$email','$web','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/contact/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE contact SET conact_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $succ = "contact added successfully";
                header('location:../../../contact.php?succ='.$succ);
            }
            else{
                $insert = "INSERT INTO `contact`(`address`, `phone`, `email`, `web`, `status`) VALUES ('$address','$phone','$email','$web','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/contact/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE contact SET conact_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $succ = "contact added successfully";
                header('location:../../../contact.php?succ='.$succ);
            }
        }
        else{
            $img_err = "File too large";
	        header('location:../../../contact.php?imageerr='.$img_err);
        }
    }
    else{
        $img_err = "Invalid File Format";
	    header('location:../../../contact.php?imageerr='.$img_err);
    }
    
}


?>