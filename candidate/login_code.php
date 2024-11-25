<?php
error_reporting(0);
include("classes/etsystem.php");
$crud = new Etstysem();
//$validation = new Validation();
$email = $crud->escape_string($_POST['username']);    
$password = md5($crud->escape_string($_POST['password']));

$query = "SELECT * FROM  tbl_client_registration where email ='".$email."' and password  ='".$password."'";
$results = $crud->getData($query);
$nums  = $crud->mysqli_num_rows($results);
$row = $results->fetch_assoc());

if($nums>=0)
{
$_SESSION['etsoftId'] = $row['client_id'];
header("location:dashboard.php?msg=success");
}
else
{
header("location:dashboard.php?msg=error");	
}
?>