<?php
error_reporting(0);
include_once '../includes/DbConfig.php';
include("etsystem.php");

$crud = new Etstysem();

if(isset($_POST['Submit'])) 
{ 
    
    $Package_id = rand(10,999999);
    $Package_name = $crud->escape_string($_POST['package_name']);
    $package_duration = $crud->escape_string($_POST['package_duration']);
    $package_price = $crud->escape_string($_POST['package_price']);
    $package_description = $crud->escape_string($_POST['package_description']);
    $total_exam = $crud->escape_string($_POST['total_exam']);
  
    $result = $crud->execute("INSERT INTO `tbl_package`(`package_id`, `package_name`, `package_duration`, `package_price`, `package_description`,`total_exam`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES('$Package_id','$Package_name','$package_duration','$package_price', '$package_description','$total_exam','created_by','modified_by',now(),now(),'y')");

    echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';


}
if(isset($_POST['Update'])) 
{    
    
    $Package_name = $crud->escape_string($_POST['package_name']);
    $package_duration = $crud->escape_string($_POST['package_duration']);
    $package_price = $crud->escape_string($_POST['package_price']);
    $package_description = $crud->escape_string($_POST['package_description']);
    $total_exam = $crud->escape_string($_POST['total_exam']);
  
    $result = $crud->execute("UPDATE `tbl_package` SET `package_name`='$Package_name',`package_duration`='$package_duration',`package_price`='$package_price',`package_description`='$package_description',`total_exam`='$total_exam' WHERE id=$packageId");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';


}

if(isset($_POST['active'])) 
{  
  $packageId = $_POST['hiddenValue'];
  
  $result = $crud->execute("UPDATE `tbl_package` SET `currentStatus`='y'  WHERE id = '$packageId'");
  echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';
}
if(isset($_POST['inactive'])) 
{  
  $packageId = $_POST['hiddenValue'];
 
  $result = $crud->execute("UPDATE `tbl_package` SET `currentStatus`='n'  WHERE id = '$packageId'");
  echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';
}

?>
