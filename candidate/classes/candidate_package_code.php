<?php
//error_reporting(0);
//including the database connection file
include_once '../includes/DbConfig.php';
include("etsystem.php");
//include_once("classes/Validation.php");

$crud = new Etstysem();

if(isset($_POST['Submit'])) 
{ 
    
    $Package_id = rand(10,999999);
   // $candidate_name = $crud->escape_string($_POST['candidate_name']);
    $Package_name = $crud->escape_string($_POST['package_name']);
    $Package_from = $crud->escape_string($_POST['package_from']);
    $Package_to = $crud->escape_string($_POST['package_to']);
   //$Package_description = $crud->escape_string($_POST['Package_description']);
    
 //echo "INSERT INTO `tbl_candidate_package`(`package_id`, `package_name`, `package_from`,'package_to',`package_description`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES('$Package_id','$Package_name','$package_from','$package_to','$Package_price','$Package_description','created_by','modified_by',now(),now(),'y')";
 //die();
    $result = $crud->execute("INSERT INTO `tbl_candidate_package`(`package_id`, `package_name`, `package_duration`, `package_price`, `package_description`, `package_from`, `package_to`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES('$Package_id','$Package_name','package_duration','package_price', 'package_description','$Package_from','$Package_to','created_by','modified_by',now(),now(),'y')");
  //die();
    echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';


}
if(isset($_POST['Update'])) 
{    
    
   // $candidate_name = $crud->escape_string($_POST['candidate_name']);
    $Package_name = $crud->escape_string($_POST['package_name']);
    $Package_from = $crud->escape_string($_POST['package_from']);
    $Package_to = $crud->escape_string($_POST['package_to']);
    $packageId = $crud->escape_string($_POST['packageId']);
   //$Package_description = $crud->escape_string($_POST['Package_description']);
    
 //echo "INSERT INTO `tbl_candidate_package`(`package_id`, `package_name`, `package_from`,'package_to',`package_description`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES('$Package_id','$Package_name','$package_from','$package_to','$Package_price','$Package_description','created_by','modified_by',now(),now(),'y')";
 //die();
    $result = $crud->execute("UPDATE `tbl_candidate_package` SET `package_name`='$Package_name',`package_from`='$Package_from',`package_to`='$Package_to' WHERE id=$packageId ");
  //die();
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';


}

if(isset($_POST['active'])) 
{  
  $packageId = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_candidate_package` SET `currentStatus`='y'  WHERE id = '$packageId'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';
}
if(isset($_POST['inactive'])) 
{  
  $packageId = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_candidate_package` SET `currentStatus`='n'  WHERE id = '$packageId'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-packages.php");</script>';
}

?>
