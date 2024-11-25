<?php
// error_reporting(0);
session_start();
include("etsystem.php");
$crud = new Etstysem();
//$validation = new Validation();
$email = $crud->escape_string($_POST['username']);    
$password = md5($crud->escape_string($_POST['password']));

 $query = "SELECT * FROM  tbl_user_registration where email ='".$email."' and password ='".$password."'";
$results = $crud->getData($query);
foreach ($results as $key => $row){
    $emailid = $row['email'];
    $name = $row['first_name']." ".$row['last_name'];
    
}

if(!empty($emailid))
{
$_SESSION['etsoftId'] = $row['user_id'];
$_SESSION['role'] = $row['user_type'];
$_SESSION['logo'] = $row['image'];
$_SESSION['name'] = $name;

header("location:../dashboard.php?msg=success");
}
else
{
header("location:../index.php?msg=error");	
}
?>