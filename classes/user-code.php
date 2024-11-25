<?php
//  error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $firstname = $crud->escape_string($_POST['firstname']);  
    $lastname = $crud->escape_string($_POST['lastname']); 
    $user_id = US.'-'.rand(10,999999);
    $gender = $crud->escape_string($_POST['gender']);
    $address = $crud->escape_string($_POST['address']);
    $mobile = $crud->escape_string($_POST['mobile']);
    $email = $crud->escape_string($_POST['email']);
    $password = md5($crud->escape_string($_POST['password']));
    $position = $crud->escape_string($_POST['position']);
    $city = $crud->escape_string($_POST['city']);
    $designation = $crud->escape_string($_POST['designation']);
    $role = $crud->escape_string($_POST['role']);
    $director = $crud->escape_string($_POST['director']);
    // echo $logo = $crud->escape_string($_POST['image']);
    // die();
    $targetdir = '../photo/';  
    // echo $_FILES['image']['name'];
    // die;
    if(!empty( $_FILES['image']['name'])) {
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
    }
    else{
      $logo = null;
    }   
           
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_user_registration`(`user_id`, `first_name`, `last_name`, `gender`, `address`, `mobile`, `email`,`password`, `image`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$user_id','$firstname','$lastname','$gender','$address','$mobile','$email','$password','$logo','abcd','$email',now(),now(),'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';
}

if(isset($_POST['Update']))
{
    $firstname = $crud->escape_string($_POST['firstname']); 
    $lastname = $crud->escape_string($_POST['lastname']); 
    $email = $crud->escape_string($_POST['email']);
    $gender = $crud->escape_string($_POST['gender']);
    $mobile = $crud->escape_string($_POST['mobile']);
    $password = md5($crud->escape_string($_POST['password']));
    $userId = $crud->escape_string($_POST['userId']);
    $logop = $crud->escape_string($_POST['previmage']);
    $targetdir = '../photo/';  
    if(!empty( $_FILES['image']['name'])) {
      $targetfile = $targetdir.$userId.'_'.basename($_FILES['image']['name']);
      //die();
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
    }
    else{
      $logo = $logop;
    }   
    $result = $crud->execute("UPDATE tbl_user_registration SET first_name = '$firstname', image ='$logo', last_name='$lastname', email ='$email',gender = '$gender',`password`='$password', mobile='$mobile' WHERE id = '$userId'");

    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';

}

if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_user_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_user_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  // echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-user.php");</script>';
}


?>