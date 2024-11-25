<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $categoryname = $crud->escape_string($_POST['category_name']); 
    // $departmentname = $crud->escape_string($_POST['departmentname']); 
    $category_id = rand(10,999999);
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_category`( `category_id`, `category_name`,  `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$category_id','$categoryname','kjsyfs','yusjv', now(), now(), 'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';
         
}

if(isset($_POST['Update']))
{
    $categoryname = $crud->escape_string($_POST['category_name']); 
    // $departmentname = $crud->escape_string($_POST['departmentname']);
    $category_id = $crud->escape_string($_POST['category_id']); 
    $result = $crud->execute("UPDATE tbl_category SET `category_name` = '$categoryname' WHERE id = $category_id");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';

}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_category` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_category` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';
}

?>