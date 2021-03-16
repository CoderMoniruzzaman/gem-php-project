<?php 
    require '../../../session.php';
    require '../../db.php';
    
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $review = $_POST['description'];
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetemp = $_FILES['image']['tmp_name'];
    $status = $_POST['status'];
    $succ = '';
    
    if($_FILES['image']['name'] !=''){
        $select_photo = "SELECT image FROM client WHERE id=$user_id";
        $del_photo_query = mysqli_query($db_conection, $select_photo);
        $after_assoc = mysqli_fetch_assoc($del_photo_query);
        $delete_from_location ="../../../public/upload/client/".$after_assoc['image'];
        unlink($delete_from_location);
        $after_explode = explode('.',$filename);
        $extention = end($after_explode);
        $allowed_extention = array('jpg','jpeg','png','gif');
        if(in_array($extention, $allowed_extention)){
            if($uploaded_file['size'] <= 10000000){
                $new_file_name = $user_id.'.'.$extention;
                $new_location = '../../../public/upload/client/'.$new_file_name;
                move_uploaded_file($filetemp, $new_location);
                $name_to_save_db = $new_file_name;
                $update = "UPDATE client SET image='$new_file_name' WHERE id =$user_id";
                $photo_uploaded = mysqli_query($db_conection, $update);
                $update_query = "UPDATE client SET name='$name',description='$review',status='$status' WHERE id=$user_id" ;
                $result = mysqli_query($db_conection, $update_query);
                $succ = "client update successfully";
                header('location:../../../client_update.php?id='.$user_id.'& succ='.$succ);
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
        $update_query = "UPDATE client SET name='$name',description='$review',status='$status' WHERE id=$user_id" ;
        $result = mysqli_query($db_conection, $update_query);
        $succ = "client update successfully";
        header('location:../../../client_update.php?id='.$user_id.'& succ='.$succ);
    }







    
?>