<?php
    require '../../../session.php';
    require '../../db.php';

    $user_id = $_GET['id'];

    $select_photo = "SELECT banner_image FROM banner WHERE id=$user_id";
    $del_photo_query= mysqli_query($db_conection,$select_photo);
    $after_assoc= mysqli_fetch_assoc($del_photo_query);
    $delete_from_location= "../../../public/upload/banner/".$after_assoc['banner_image'];
    unlink($delete_from_location);
    $del_query = "DELETE FROM banner WHERE id=$user_id";
    $result= mysqli_query($db_conection,$del_query);
    header('location:../../../banner.php');

?>