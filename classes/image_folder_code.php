<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $folder_name= $crud->escape_string($_POST['folder_name']); 
    $subject_id= $crud->escape_string($_POST['subject_id']); 
 
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_subimages_folder`( `subject_id`, `folder_name`,  `created_date`, `modified_date`, `currentStatus`) VALUES ('$subject_id','$folder_name', now(), now(), 'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage_image_folder.php");</script>';
         
}

if(isset($_POST['Update']))
{
    
    $folder_name= $crud->escape_string($_POST['folder_name']);
    $subject_id= $crud->escape_string($_POST['subject_id']); 
    $result = $crud->execute("UPDATE tbl_subimages_folder SET `folder_name` = '$folder_name' WHERE id = $id");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage_image_folder.php");</script>';

}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_subimages_folder` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_subimages_folder` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage_image_folder.php");</script>';
}

?>