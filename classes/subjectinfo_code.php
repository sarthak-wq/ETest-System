<?php
error_reporting(0);
//including the database connection file
include("./etsystem.php");
//include_once("classes/Validation.php");

$crud = new Etstysem();
//$validation = new Validation();

if(isset($_POST['submit'])) {    
    // $id = $crud->escape_string($_POST['id']);  
    $subject_id = $crud->escape_string($_POST['subject_id']);
    $subject_info_id = rand(10,999999);
    $subject_name = $crud->escape_string($_POST['subject_name']);
    $subject_info = $crud->escape_string($_POST['subject_info']);
   
    //  $subject_image = $crud->escape_string($_POST['upload']);
    $targetdir = '../photo/';

    if(!empty( $_FILES['upload']['name'])) {
      $targetfile = $targetdir.$candidate_id.'_'.basename($_FILES['upload']['name']);
      //die();
      $imagefilesize = $_FILES['upload']['size'];
      $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
  
      if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
      {
  
       echo '<script type="text/javascript">alert("Invalid file type!");</script>';
       echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>';      
       die();   
        
      }
      elseif($imagefilesize<=256000)
        {
          if(move_uploaded_file($_FILES['upload']['tmp_name'], $targetfile))
          {
            $img =  $subject_id.'_'.$_FILES['upload']['name'];
          }
        }
        else
        {
          echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>'; 
          die();
        }  
    }
    else{
      $img = null;
    }   
  
  

        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_subject_info`(`subject_info_id`,`subject_id`,`subject_info`,`subject_image`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$subject_info_id','$subject_id','$subject_info','$img','admin','admin',now(),now(), 'y')");
        
          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>';

        
}


if(isset($_POST['update'])) {    
    $id = $crud->escape_string($_POST['id']);  
    $subject_id = $crud->escape_string($_POST['subject_id']);
    $subject_name = $crud->escape_string($_POST['subject_name']);
    $subject_info = $crud->escape_string($_POST['subject_info']);

    $targetdir = '../photo/';
   if(!empty( $_FILES['upload']['name'])) {
      $targetfile = $targetdir.$candidate_id.'_'.basename($_FILES['upload']['name']);
      //die();
      $imagefilesize = $_FILES['upload']['size'];
      $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
  
      if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
      {
  
       echo '<script type="text/javascript">alert("Invalid file type!");</script>';
       echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>';      
       die();   
        
      }
      elseif($imagefilesize<=256000)
        {
          if(move_uploaded_file($_FILES['upload']['tmp_name'], $targetfile))
          {
            $img =  $id.'_'.$_FILES['upload']['name'];
          }
        }
        else
        {
          echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>'; 
          die();
        }  
    }
    else{
      $img = $crud->escape_string($_POST['preimg']);
    }   

        //insert data to database    
        $result = $crud->execute("UPDATE `tbl_subject_info` SET `subject_id`='$subject_id',`subject_info`='$subject_info',`subject_image`='$img' WHERE id = '$id'");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>';

}


if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_subject_info` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_subject_info` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-subject-info.php");</script>';
}
?> 