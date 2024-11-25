<?php
error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    
    $subject_name = $crud->escape_string($_POST['subject_name']); 
    $dept = $crud->escape_string($_POST['dept']);  
    $cat = $crud->escape_string($_POST['cat']);   
    $subject_id  = SB.'-'.rand(10,999999);
  
        //insert data to database    
    $result = $crud->execute("INSERT INTO `tbl_subjects`(`subject_id`,`department_id`,`category_id`, `subject_name`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$subject_id','$dept','$cat', '$subject_name', '$created_by','$modified_by',now(),now(),'y')");

      echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
      echo '<script type="text/javascript">window.location.assign("../manage-subjects.php");</script>';

}
if(isset($_POST['update']))
{
    $subject_id = $crud->escape_string($_POST['subject_id']); 
    $subject_name = $crud->escape_string($_POST['subject_name']); 
    $result = $crud->execute("UPDATE tbl_subjects SET subject_name = '$subject_name' WHERE id = '$subject_id'");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-subjects.php");</script>';

}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_subjects` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_subjects` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-subjects.php");</script>';
}
?>