<?php 

    require '../../../session.php';
    require '../../db.php';

    $property_succ = '';
    
    $user_id = $_POST['id'];
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetemp = $_FILES['image']['tmp_name'];
    $property_price = $_POST['price'];
    $property_union = $_POST['union'];
    $property_address = $_POST['address'];
    $property_link = $_POST['link'];
    $status = $_POST['status'];
    if($_FILES['image']['name'] !=''){
        $select_photo = "SELECT image FROM viewproperty WHERE id=$user_id";
        $del_photo_query = mysqli_query($db_conection, $select_photo);
        $after_assoc = mysqli_fetch_assoc($del_photo_query);
        $delete_from_location ="../../../public/upload/property/".$after_assoc['image'];
        unlink($delete_from_location);
        $after_explode = explode('.',$filename);
        $extention = end($after_explode);
        $allowed_extention = array('jpg','jpeg','png','gif');
        if(in_array($extention, $allowed_extention)){
            if($uploaded_file['size'] <= 10000000){
                $new_file_name = $user_id.'.'.$extention;
                $new_location = '../../../public/upload/property/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE viewproperty SET image='$new_file_name' WHERE id =$user_id";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $update_query = "UPDATE `viewproperty` SET `price`='$property_price',`union`='$property_union',`address`='$property_address',`link`='$property_link',status='$status' WHERE id=$user_id" ;
                $result = mysqli_query($db_conection, $update_query);
                $property_succ = "property update successfully";
                header('location:../../../property_update.php?id='.$user_id.'& propertysucc='.$property_succ);
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
        $update_query = "UPDATE `viewproperty` SET `price`='$property_price',`union`='$property_union',`address`='$property_address',`link`='$property_link',status='$status' WHERE id=$user_id" ;
        $result = mysqli_query($db_conection, $update_query);
        if(!$result){
            die(mysqli_error($db_conection));
        }
        $property_succ = "property update successfully";
        header('location:../../../property_update.php?id='.$user_id.'& propertysucc='.$property_succ);
    }


    
?>