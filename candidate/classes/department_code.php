<?php
// error_reporting(0);
//including the database connection file
include_once("C:/xampp/htdocs/ashu/classes/etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $department_name = $crud->escape_string($_POST['department_name']);  
    $department_id = rand(10,999999);
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = $crud->execute("INSERT INTO tbl_department(department_id,department_name,created_by,modified_by,created_date,modified_date,currentStatus) VALUES('$department_id','$department_name','created_by','modified_by',now(),now(),'y')");
        
          echo '<script type="text/javascript">alert("Data added successfully...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
    //}
}

if(isset($_POST['update'])) {    
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
  $department_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_department` SET `currentStatus`='n'  WHERE id = '$department_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_department` SET `currentStatus`='y'  WHERE id = '$department_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
}
if(isset($_POST['inactive'])) {  
  $department_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_department` SET `currentStatus`='n'  WHERE id = '$department_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-department.php");</script>';
}

?>