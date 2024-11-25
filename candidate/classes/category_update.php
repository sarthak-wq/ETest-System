<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 $id = $crud->escape_string($_GET['id']);
if(isset($_POST['Submit'])) {    
    $categoryname = $crud->escape_string($_POST['categoryname']);  
   // $category_id = rand(10,999999);
    $departmentname = $crud->escape_string($_POST['departmentname']); 
   
    
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
        
        //insert data to database    
        $result = $crud->execute("UPDATE `tbl_category` SET `category_name`=$categoryname,'department_name'=$departmentname,`created_by`=$email,`modified_by`=$email,`modified_date`=now() WHERE id = $category_id");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';
         
        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}
}
?>