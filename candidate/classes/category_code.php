<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $categoryname = $crud->escape_string($_POST['categoryname']); 
    $departmentname = $crud->escape_string($_POST['departmentname']); 
    $category_id = rand(10,999999);
    
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_category`( `category_id`, `category_name`, `department_name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$category_id','$categoryname','$departmentname','kjsyfs','yusjv', now(), now(), 'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';
         
        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}
}

if(isset($_POST['Update']))
{
    $categoryname = $crud->escape_string($_POST['categoryname']); 
    $departmentname = $crud->escape_string($_POST['departmentname']);
    $category_id = $crud->escape_string($_POST['category_id']); 
    $result = $crud->execute("UPDATE tbl_category SET category_name = '$categoryname' WHERE id = $category_id");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';

}


if(isset($_POST['active'])) {  
  $category_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_category` SET `currentStatus`='y'  WHERE id = '$category_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
 echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';
}
if(isset($_POST['inactive'])) {  
  $category_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_category` SET `currentStatus`='n'  WHERE id = '$category_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-category.php");</script>';
}

?>