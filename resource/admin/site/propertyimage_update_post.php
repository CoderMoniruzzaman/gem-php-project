<?php
require '../../../session.php';
require '../../db.php';

// validation
$proimg_h_err='';
$proimg_des_err='';
$proimg_img_err='';
$proimg_succ = '';
$user_id = $_POST['id'];
$pro_heading = $_POST['photo_heading'];
$pro_des = $_POST['photo_slog'];
$status = $_POST['status'];
$filename = $_FILES['photo_image']['name'];
$filesize = $_FILES['photo_image']['size'];
$filetemp = $_FILES['photo_image']['tmp_name'];

if($_FILES['photo_image']['name'] !=''){
    $select_photo = "SELECT photo_image FROM photo WHERE id=$user_id";
    $del_photo_query = mysqli_query($db_conection, $select_photo);
    $after_assoc = mysqli_fetch_assoc($del_photo_query);
    $delete_from_location ="../../../public/upload/property_image/".$after_assoc['photo_image'];
    unlink($delete_from_location);
    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    $allowed_extention = array('jpg','jpeg','png','gif');
    if(in_array($extention, $allowed_extention)){
        if($uploaded_file['size'] <= 10000000){
            $new_file_name = $user_id.'.'.$extention;
            $new_location = '../../../public/upload/property_image/'.$new_file_name;
            move_uploaded_file($filetemp, $new_location);
            $name_to_save_db = $new_file_name;
            $update = "UPDATE photo SET photo_image='$new_file_name' WHERE id =$user_id";
            $photo_uploaded = mysqli_query($db_conection, $update);
            $update_query = "UPDATE photo SET photo_heading='$pro_heading',photo_slog='$pro_des',status='$status' WHERE id=$user_id" ;
            $result = mysqli_query($db_conection, $update_query);
            $proimg_succ = "property image update successfully";
            header('location:../../../propertyimage_update.php?id='.$user_id.'& proimgsucc='.$proimg_succ);
        }
        else{
            echo "File too large";
        }
  }
  else{
  	    echo "Invalid File Format";
  }  
}

else{
    $update_query = "UPDATE photo SET photo_heading='$pro_heading',photo_slog='$pro_des',status='$status' WHERE id=$user_id" ;
    $result = mysqli_query($db_conection, $update_query);
    $proimg_succ = "property image update successfully";
    header('location:../../../propertyimage_update.php?id='.$user_id.'& proimgsucc='.$proimg_succ);
}

?>