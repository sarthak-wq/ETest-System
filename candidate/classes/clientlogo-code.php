<?php
// error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    
  $client_name = $crud->escape_string($_POST['client_name']);  
    
  $client_id = rand(10,999999);

  $targetdir = './signature/';    

  echo $targetfile = $targetdir.$client_id.'_'.basename($_FILES['sign']['name']);
  
  $imagefilesize = $_FILES['sign']['size'];
  $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
    
  if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
  {

    echo '<script type="text/javascript">alert("Invalid file type!");</script>';
    echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>';      
     
      
  }
  elseif($imagefilesize<=256000)
    {
      if(move_uploaded_file($_FILES['sign']['tmp_name'], $targetfile))
        {
          $logo =  $client_id.'_'.$_FILES['sign']['name'];
         
        }
      }
      else
      {
        echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
        echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>'; 
        
      }
   $result = $crud->execute("INSERT INTO `tbl_client_logo`(`client_id`, `client_name`, `client_logo`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$client_id', '$client_name','$logo', '','',now(),now(),'y')");

    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>';

   
    
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
           
        //insert data to database    
        

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}
}
if(isset($_POST['update']))
{
   $client_id = $crud->escape_string($_POST['client_id']); 
    
    $client_name = $crud->escape_string($_POST['client_name']);
    $targetdir = './signature/';    

    $targetfile = $targetdir.$client_id.'_'.basename($_FILES['sign']['name']);
    //die();
    $imagefilesize = $_FILES['sign']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
    
    if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../add-client.php");</script>';      
     die();   
      
    }
    elseif($imagefilesize<=256000)
      {
        if(move_uploaded_file($_FILES['sign']['tmp_name'], $targetfile))
        {
          $logo =  $client_id.'_'.$_FILES['sign']['name'];
        }
      }
      else
      {
        echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
        echo '<script type="text/javascript">window.location.assign("../add-client.php");</script>'; 
        die();
      }
    $result = $crud->execute("UPDATE tbl_client_logo SET client_name = '$client_name',client_logo = '$logo' WHERE id = '$client_id'");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>';

}



if(isset($_POST['active'])) {  
  $client_id = $_POST['hiddenValue'];
  // echo "UPDATE tbl_client_logo` SET `currentStatus`='n'  WHERE id = '$client_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_client_logo` SET `currentStatus`='y'  WHERE id = '$client_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>';
}

if(isset($_POST['inactive'])) {  
  $client_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_client_logo` SET `currentStatus`='y'  WHERE id = '$client_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_client_logo` SET `currentStatus`='n'  WHERE id = '$client_id'");
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("manage-clientlogo.php");</script>';
}
?>