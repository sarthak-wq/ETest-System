<?php
// error_reporting(0);

include_once("etsystem.php");
$crud = new Etstysem();
 
if(isset($_POST['Submit'])) {    
    $department_name = $crud->escape_string($_POST['department_name']);  
    $department_id = rand(10,999999);
   
   $result = $crud->execute("INSERT INTO tbl_department(department_id,department_name,created_by,modified_by,created_date,modified_date,currentStatus) VALUES('$department_id','$department_name','created_by','modified_by',now(),now(),'y')");
  
    echo '<script type="text/javascript">alert("Data added successfully...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
    
}

if(isset($_POST['Update'])) {    
  $department_name = $crud->escape_string($_POST['dept_name']);  
  $department_id = $crud->escape_string($_POST['id']);  
 
  // checking empty fields
  //if($department_name != null) {
         
      //link to the previous page
    // echo 'Please provide proper department name.';
 // }    
  //else { 
      // if all the fields are filled (not empty) 
          
      //insert data to database    
      $result = $crud->execute("UPDATE `tbl_department` SET `department_name`='$department_name'  WHERE id = '$department_id'");
      
        echo '<script type="text/javascript">alert("Data added successfully...!");</script>';
        echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
  //}
}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_department` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_department` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
}

?>