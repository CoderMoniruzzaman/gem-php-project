<?php
session_start();

require '../db.php';
// validation
$email_err = '';
$pas_err = '';
$msg = '';
if(empty($_POST['email'])){
	$email_err = "Please enter your email";
	header('location:../../login.php?emailerr='.$email_err);
    exit();
}
else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email'])) {
  $email_err = "Please enter a valid email.Example:xyz0-10@example.abc";
  header('location:../../login.php?emailerr='.$email_err);
}

else if(empty($_POST['pass'])){
	$pas_err = "Please enter password";
	header('location:../../login.php?paserr='.$pas_err);
    exit();
}

else if(!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $_POST['pass'])){
  $pas_err = "please enter a password at lest contain 8 letters including capital letters, numbers and small letters.";
  header('location:../../login.php?paserr='.$pas_err);
}

else{
    //varaibale declare
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $select_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db_conection, $select_query);
    $after_assoc = mysqli_fetch_assoc($result);
    $current_password = $after_assoc['password'];
    if (password_verify($pass, $current_password)) {
        $_SESSION['chk'] = 'check'; 
        $_SESSION['name'] = $after_assoc['name'];
        header('location:../../dashboard.php');
    }
    else{
        $msg= "Invalid email or password";
        header('location:../../login.php?ermess='.$msg);
    }  
   
}












?>