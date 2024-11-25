<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    
    $subject_name = $crud->escape_string($_POST['subject_name']);  
    $subject_id = rand(10,999999);
   
    
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
           
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_subjects`(`subject_id`, `subject_name`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$subject_id', '$subject_name', '','',now(),now(),'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("./manage-subjects.php");</script>';

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}
}
if(isset($_POST['update']))
{
    $subject_id = $crud->escape_string($_POST['subject_id']); 
    $subject_name = $crud->escape_string($_POST['subject_name']); 
    $result = $crud->execute("UPDATE tbl_subjects SET subject_name = '$subject_name' WHERE id = '$subject_id'");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("./manage-subjects.php");</script>';

}

// $status = $_GET['Status'];
// $dpId = $_GET['id'];

if(isset($_POST['active'])) {  
  $subject_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_subjects` SET `currentStatus`='n'  WHERE id = '$subject_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_subjects` SET `currentStatus`='y'  WHERE id = '$subject_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-subjects.php");</script>';
}

if(isset($_POST['inactive'])) {  
  $subject_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_subjects` SET `currentStatus`='y'  WHERE id = '$subject_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_subjects` SET `currentStatus`='n'  WHERE id = '$subject_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-subjects.php");</script>';
}
?>