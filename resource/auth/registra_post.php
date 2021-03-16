<?php
require '../db.php';

//validation
//varaibale declare
$nam_err = '';
$email_err = '';
$pas_err = '';
$repas_err = '';
$msg ='';
if(empty($_POST['name'])){
	$nam_err = 'Please enter your name';
	header('location:../../registration.php?namerr='.$nam_err);
    exit();
}

else if(empty($_POST['email'])){
	$email_err = "Please enter your email";
	header('location:../../registration.php?emailerr='.$email_err);
    exit();
}
else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email'])) {
  $email_err = "Please enter a valid email.Example:xyz0-10@example.abc";
  header('location:../../registration.php?emailerr='.$email_err);
}

else if(empty($_POST['pass'])){
	$pas_err = "Please enter password";
	header('location:../../registration.php?paserr='.$pas_err);
    exit();
}

else if(!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $_POST['pass'])){
  $pas_err = "please enter a password at lest contain 8 letters including capital letters, numbers and small letters.";
  header('location:../../registration.php?paserr='.$pas_err);
}

else if(empty($_POST['re_password'])){
	$repas_err = "Please enter confirm password";
	header('location:../../registration.php?repaserr='.$repas_err);
    exit();
}
else if($_POST['pass'] !== $_POST['re_password']){
    $repas_err="Confirm password didn't match. Please try again.";
    header('location:../../registration.php?repaserr='.$repas_err);
    exit();
}

else {
    //varaibale declare
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //exit email validatuion
    $select_query = "SELECT * FROM `users` WHERE email='$email' ";
    $result1 = mysqli_query($db_conection, $select_query);
    $after_num_rows = mysqli_num_rows($result1);
    if($after_num_rows >0 ){
        $msg= "Email already exist";
        header('location:../../registration.php?extmess='.$msg);
    }
    else{
        //insert to database
        $new_pass = password_hash($pass, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$new_pass')";
        $result= mysqli_query($db_conection, $insert_query);
        $msg= "Sign Up successfully";
        header('location:../../registration.php?mess='.$msg);

    }
}
?>