<?php
//  error_reporting(0);
//including the database connection file
include_once '../includes/DbConfig.php';
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $firstname = $crud->escape_string($_POST['firstname']);  
    $lastname = $crud->escape_string($_POST['lastname']); 
    $user_id = rand(10,999999);
    $gender = $crud->escape_string($_POST['gender']);
    // $dob = $crud->escape_string($_POST['d_o_b']);
    $address = $crud->escape_string($_POST['address']);
    $mobile = $crud->escape_string($_POST['mobile']);
    $email = $crud->escape_string($_POST['email']);
    
    $position = $crud->escape_string($_POST['position']);
    $city = $crud->escape_string($_POST['city']);
    $designation = $crud->escape_string($_POST['designation']);
    $role = $crud->escape_string($_POST['role']);
    $director = $crud->escape_string($_POST['director']);
    // $img = $crud->escape_string($_POST['image']);
    
    $targetdir = '../photo/';    

    $targetfile = $targetdir.$user_id.'_'.basename($_FILES['image']['name']);
  
    $imagefilesize = $_FILES['image']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
    
    if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';      
     die();   
      
    }
    elseif($imagefilesize<=256000)
      {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetfile))
        {
          $logo =  $user_id.'_'.$_FILES['image']['name'];
        }
      }
    else
      {
        echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
        echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>'; 
        die();
      }
  
    /*if($image>0)
    {
      if(move_uploaded_file($_FILES['sign']['tmp_name'], $targetfile))
      {
      $logo =  $client_id.'_'.$_FILES['sign']['name'];
      }
    }*/
    
    
   
   
   
    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
        //echo "INSERT INTO `tbl_user_registration`(`user_id`, `first_name`, `last_name`, `gender`, `address`, `mobile`, `email`, `image`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$user_id','$firstname','$lastname','$gender','$address','$mobile','$email','$logo','abcd','$email',now(),now(),'y')";
        //die();
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_user_registration`(`user_id`, `first_name`, `last_name`, `gender`, `address`, `mobile`, `email`, `image`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$user_id','$firstname','$lastname','$gender','$address','$mobile','$email','$logo','abcd','$email',now(),now(),'y')");


        // INSERT INTO `tbl_client_registration`(`client_id`, `first_name`, `last_name`, `gender`, `d_o_b`, `address`, `mobile`, `email`, `dept_id`, `category_id`, `logo`, `country`, `state`, `city`, `package_type`, `package_expiry_date`, `role`, `position`, `director_name`, `last_login_date`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$client_id', '$firstname', '$lastname', '$gender','$dob','$address','$mobile','$mail','dept_id','category_id','$logo','country','state','$city','package_type','package_expiry_date','$role','$position','$director_name',now(),'created_by','modified_by',now(),now(),'y')

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}
}
if(isset($_POST['Update']))
{
    $firstname = $crud->escape_string($_POST['firstname']); 
    $lastname = $crud->escape_string($_POST['lastname']); 
    $email = $crud->escape_string($_POST['email']);
    $mobile = $crud->escape_string($_POST['mobile']);
    //$dob = $crud->escape_string($_POST['dob']);
    $userId = $crud->escape_string($_POST['userId']);
    
    $targetdir = '../user/';    

    $targetfile = $targetdir.$userId.'_'.basename($_FILES['image']['name']);
    
    $imagefilesize = $_FILES['image']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
   
    if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';      
     die();   
      
    }
    elseif($imagefilesize<=256000)
      {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetfile))
        {
          $logo =  $userId.'_'.$_FILES['image']['name'];
        }
      }
      else
      {
        echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
        echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>'; 
        die();
      }
    $result = $crud->execute("UPDATE tbl_user_registration SET first_name = '$firstname', image ='$logo', last_name='$lastname', email ='$email', mobile='$mobile' WHERE id = '$userId'");

    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';

}

/*
$status = $_GET['status'];
$dpId = $_GET['id'];
if($status=='active')
{
    $result = $crud->execute("UPDATE tbl_client_registration SET currentStatus = 'n' WHERE id = $dpId");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';
}
if($status=='inactive')
{
    $result = $crud->execute("UPDATE tbl_client_registration SET currentStatus = 'y' WHERE id = $dpId");
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';
}
*/

if(isset($_POST['active'])) {  
  $user_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_user_registration` SET `currentStatus`='y'  WHERE id = '$user_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';
}
if(isset($_POST['inactive'])) {  
  $user_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_user_registration` SET `currentStatus`='n'  WHERE id = '$user_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';
}

?>
?>