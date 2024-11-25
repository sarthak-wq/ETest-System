<?php
error_reporting(0);
//including the database connection file
include("classes/etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $category_name = $crud->escape_string($_POST['category_name']);  
    $category_id  = rand(10,999999);
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = $crud->execute("INSERT INTO tbl_category(category_id ,category_name,created_by,modified_by,created_date,modified_date,currentStatus) VALUES('$category_id ','$category_name','$created_by','$modified_by',now(),now(),'y')");
        
          echo '<script type="text/javascript">alert("Data added successfully...!");</script>';
          echo '<script type="text/javascript">window.location.assign("manage-category.php");</script>';
        
    //}
}
?>