<?php
// error_reporting(0);
//including the database connection file
include_once("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $notice_title = $crud->escape_string($_POST['notice_title']);  
    $notice_description = $crud->escape_string($_POST['notice_description']); 
    $notice_id = rand(10,999999);
   
    //insert data to database    
    $result = $crud->execute("INSERT INTO `tbl_notice`( `notice_id`, `notice_title`, `notice_description`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$notice_id','$notice_title','$notice_description','created_by','modified_by',now(),now(),'y')");
    
      echo '<script type="text/javascript">alert("Data added successfully...!");</script>';
      echo '<script type="text/javascript">window.location.assign("../manage-notice.php");</script>';
}

if(isset($_POST['update'])) {    
  $notice_title = $crud->escape_string($_POST['notice_title']);  
  $notice_description = $crud->escape_string($_POST['notice_description']); 
  $notice_id = $crud->escape_string($_POST['id']);  
          
  //insert data to database    
  $result = $crud->execute("UPDATE `tbl_notice` SET `notice_title`='$notice_title',`notice_description`='$notice_description'   WHERE id = '$notice_id'");
  
    echo '<script type="text/javascript">alert("Data updated successfully...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-notice.php");</script>';
//}
}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_notice` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_notice` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-notice.php");</script>';
}


?>