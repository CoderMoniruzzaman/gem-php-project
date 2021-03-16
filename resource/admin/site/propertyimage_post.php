<?php
require '../../../session.php';
require '../../db.php';

// validation
$proimg_h_err='';
$proimg_des_err='';
$proimg_img_err='';
$proimg_succ = '';

$pro_heading = $_POST['photo_heading'];
$pro_des = $_POST['photo_slog'];
$filename = $_FILES['photo_image']['name'];
$filesize = $_FILES['photo_image']['size'];
$filetemp = $_FILES['photo_image']['tmp_name'];
$status = $_POST['status'];

if(empty($_POST['photo_heading'])){
	$proimg_h_err = "Please enter property image heading";
	header('location:../../../property_image.php?proimghdrr='.$proimg_h_err);
    exit();
}
else if(empty($_POST['photo_slog'])){
	$proimg_des_err = "Please enter property image description";
	header('location:../../../property_image.php?proimgddrr='.$proimg_des_err);
    exit();
}

else if(empty($filename)){
    $proimg_img_err = "Please choose image file to upload";
	header('location:../../../property_image.php?proimgimerr='.$proimg_img_err);
    exit();
}
else{
    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    $allowed_extention = array('jpg','jpeg','PNG','gif','png');
    if(in_array($extention, $allowed_extention)){
        if($filesize <= 10000000){
            if($status==1){
                // $update_status = "UPDATE photo SET status=0";
                // $update_query = mysqli_query($db_conection,$update_status);
                
                $insert = "INSERT INTO photo (photo_heading, photo_slog, status) VALUES ('$pro_heading','$pro_des','$status')";
		        $result= mysqli_query($db_conection, $insert);
                
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/property_image/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE photo SET photo_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $proimg_succ = "property image Added successfully";
                header('location:../../../property_image.php?proimgsucc='.$proimg_succ);
            }
            else{
                $insert = "INSERT INTO photo (photo_heading, photo_slog, status) VALUES ('$pro_heading','$pro_des','$status')";
		        $result= mysqli_query($db_conection, $insert);
                
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/property_image/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE photo SET photo_image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $proimg_succ = "property image Added successfully";
                header('location:../../../property_image.php?proimgsucc='.$proimg_succ);
            }

            
        }
        else{
            $proimg_img_err = "File too large";
            header('location:../../../property_image.php?proimgimerr='.$proimg_img_err);
        }
    }
    else{
        $proimg_img_err = "Invalid File Format";
	    header('location:../../../property_image.php?proimgimerr='.$proimg_img_err);
    }

}

?>