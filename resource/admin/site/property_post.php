<?php
require '../../../session.php';
require '../../db.php';

$property_img_err='';
$property_pri = '';
$property_uni = '';
$property_ad_err='';
$property_lin_err = '';
$property_succ = '';


// validation
if(empty($_POST['price'])){
	$property_pri = "Enter property price ";
	header('location:../../../property.php?propertyprerr='.$property_pri);
}
else if(empty($_POST['union'])){
	$property_uni = "Enter property union";
	header('location:../../../property.php?propertyuerr='.$property_uni);
}
else if(empty($_POST['address'])){
	$property_ad_err = "Enter property address";
	header('location:../../../property.php?propertyaderr='.$property_ad_err);
}
else if(empty($_POST['link'])){
	$property_lin_err = "Enter property link";
	header('location:../../../property.php?propertylerr='.$property_lin_err);
}
else if(empty($_FILES['image']['name'])){
    $property_img_err = "Please choose image file to upload";
	header('location:../../../property.php?propertyimerr='.$property_img_err);
}
else{
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetemp = $_FILES['image']['tmp_name'];
    $property_price = $_POST['price'];
    $property_union = $_POST['union'];
    $property_address = $_POST['address'];
    $property_link = $_POST['link'];
    $status = $_POST['status'];

    $after_explode = explode('.',$filename);
    $extention = end($after_explode);
    $allowed_extention = array('jpg','jpeg','PNG','gif','png');
    if(in_array($extention, $allowed_extention)){
        if($filesize <= 10000000){
            if($status==1){
                $insert = "INSERT INTO `viewproperty`(`price`, `union`, `address`, `link`, `status`) VALUES ('$property_price','$property_union','$property_address','$property_link','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/property/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE viewproperty SET image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $property_succ = "Property Added successfully";
                header('location:../../../property.php?propertysucc='.$property_succ);
            }
            else{
                $insert = "INSERT INTO `viewproperty`(`price`, `union`, `address`, `link`, `status`) VALUES ('$property_price','$property_union','$property_address','$property_link','$status')";
                $photo_uploaded = mysqli_query($db_conection, $insert);
                $last_id = mysqli_insert_id($db_conection);
                $new_file_name = $last_id.'.'.$extention;
                $new_location = '../../../public/upload/property/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE viewproperty SET image='$name_to_save_db' WHERE id='$last_id'";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $property_succ = "Property Added successfully";
                header('location:../../../property.php?propertysucc='.$property_succ);
            }
        }
        else{
            $property_img_err = "File too large";
	        header('location:../../../property.php?propertyimerr='.$property_img_err);
        }
    }
    else{
        $property_img_err = "Invalid File Format";
	    header('location:../../../property.php?propertyimerr='.$property_img_err);
    }
}


?>