<?php
require './resource/db.php';
//logo
$select_logo = " SELECT * FROM logo WHERE status=1";
$logo_result = mysqli_query($db_conection, $select_logo);
$logo_after_assoc = mysqli_fetch_assoc($logo_result);

//banner
$select_banner = " SELECT * FROM banner WHERE status=1";
$banner_result = mysqli_query($db_conection, $select_banner);
$banner_after_assoc = mysqli_fetch_assoc($banner_result);

//image-view
$select_property_image = " SELECT * FROM photo WHERE status=1";
$property_image_result = mysqli_query($db_conection, $select_property_image);

//about
$select_about = " SELECT * FROM about WHERE status=1";
$about_result = mysqli_query($db_conection, $select_about);
$about_after_assoc = mysqli_fetch_assoc($about_result);

//property
$select_property = " SELECT * FROM viewproperty WHERE status=1";
$property_result = mysqli_query($db_conection, $select_property);

//client
$select_client = " SELECT * FROM client WHERE status=1";
$client_result = mysqli_query($db_conection, $select_client);

//contact
$select_contact = " SELECT * FROM contact WHERE status=1";
$contact_result = mysqli_query($db_conection, $select_contact);
$contact_after_assoc = mysqli_fetch_assoc($contact_result);


?>