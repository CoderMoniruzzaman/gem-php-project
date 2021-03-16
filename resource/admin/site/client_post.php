<?php
require '../../../session.php';
require '../../db.php';

// validation
$name_err='';
$re_err='';
$img_err='';
$succ = '';

$name = $_POST['name'];
$review = $_POST['description'];
$filename = $_FILES['image']['name'];
$filesize = $_FILES['image']['size'];
$filetemp = $_FILES['image']['tmp_name'];
$status = $_POST['status'];

if(empty($_POST['name'])){
	$name_err = "Please enter client name";
	header('location:../../../client.php?namrr='.$name_err);
    exit();
}
else if(empty($_POST['description'])){
	$re_err = "Please enter client review";
	header('location:../../../client.php?reviewerr='.$re_err);
    exit();
}

else if(empty($filename)){
    $img_err = "Please choose image file to upload";
	header('location:../../../client.php?imageerr='.$img_err);
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
                $insert = "INSERT INTO client (name, description, status) VALUES ('$name','$review','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/client/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE client SET image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $succ = "client added successfully";
                header('location:../../../client.php?succ='.$succ);
            }
            else{
                $insert = "INSERT INTO client (name, description, status) VALUES ('$name','$review','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/client/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE client SET image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $succ = "client added successfully";
                header('location:../../../client.php?succ='.$succ);
            }
        }
        else{
            $img_err = "File too large";
	        header('location:../../../client.php?imageerr='.$img_err);
        }
    }
    else{
        $img_err = "Invalid File Format";
	    header('location:../../../client.php?imageerr='.$img_err);
    }
}

?>