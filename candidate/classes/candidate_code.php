<?php
//error_reporting(0);
//including the database connection file
include_once '../includes/DbConfig.php';
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $fname = $crud->escape_string($_POST['fname']);  
    $lname = $crud->escape_string($_POST['lname']); 
    $candidate_id = $crud->escape_string($_POST['userid']); 
    $gender = $crud->escape_string($_POST['gender']);
    $dob = $crud->escape_string($_POST['d_o_b']);
    $address = $crud->escape_string($_POST['address']);
    $mobile = $crud->escape_string($_POST['mobile']);
    $email = $crud->escape_string($_POST['email']);
    $pass = $crud->escape_string($_POST['password']);
    $pass1 = $crud->escape_string($_POST['cnfpassword']);
    $country = $crud->escape_string($_POST['country']);
    $state = $crud->escape_string($_POST['state']);
    $city = $crud->escape_string($_POST['city']);
    //$avatar = $crud->escape_string($_POST['img']);
    $targetdir = '../avatar/';   
     //echo "INSERT INTO `tbl_candidate_registration`( `candidate_id`, `first_name`, `last_name`, `gender`, `d_o_b`, `address`, `mobile`, `email`,`password`, `dept_id`, `category_id`, `avatar`, `country`, `state`, `city`, `package_type`, `package_expiry`, `last_login_date`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES( '$candidate_id', '$fname', '$lname', '$gender', '$dob', '$address', '$mobile', '$email','$pass', `dept_id`, `category_id`, '$img', '$country', '$state', '$city', `package_type`, `package_expiry`, now(), '$email', '$email', now(), now(), 'y')";
     //die();
    if(!empty( $_FILES['img']['name'])) 
    {
      $targetfile = $targetdir.$candidate_id.'_'.basename($_FILES['img']['name']);
      //die();
      $imagefilesize = $_FILES['img']['size'];
      $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
  
      if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
      {
  
       echo '<script type="text/javascript">alert("Invalid file type!");</script>';
       echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';      
       die();   
        
      }
      elseif($imagefilesize<=256000)
        {
          if(move_uploaded_file($_FILES['img']['tmp_name'], $targetfile))
          {
            $img =  $candidate_id.'_'.$_FILES['img']['name'];
          }
        }
        else
        {
          echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>'; 
          die();
        }  
    }
    else
    {
      $img = null;
    }   
    if($pass != $pass1){
      echo '<script type="text/javascript">alert("Passwords are not matching. Enter correct password.");</script>';
        echo '<script type="text/javascript">window.location.assign("../add-candidate.php");</script>'; 
    }
    else
    {
      $pass = md5($pass);
    }
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_candidate_registration`( `candidate_id`, `first_name`, `last_name`, `gender`, `d_o_b`, `address`, `mobile`, `email`,`password`, `dept_id`, `category_id`, `avatar, `country`, `state`, `city`, `package_type`, `package_expiry`, `last_login_date`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES( '$candidate_id', '$fname', '$lname', '$gender', '$dob', '$address', '$mobile', '$email','$pass', `dept_id`, `category_id`, 'img', '$country', '$state', '$city', `package_type`, `package_expiry`, now(), '$email', '$email', now(), now(), 'y')");
        //die;
          echo '<script type="text/javascript">alert("Table  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';
         
        
}

if(isset($_POST['Update'])) {    
  $fname = $crud->escape_string($_POST['fname']);  
  $lname = $crud->escape_string($_POST['lname']); 
  $candidate_id = $crud->escape_string($_POST['candidate_id']);
  $usrid = $crud->escape_string($_POST['userid']); 
  $gender = $crud->escape_string($_POST['gender']);
  $dob = $crud->escape_string($_POST['d_o_b']);
  $address = $crud->escape_string($_POST['address']);
  $mobile = $crud->escape_string($_POST['mobile']);
  $email = $crud->escape_string($_POST['email']);
  $country = $crud->escape_string($_POST['country']);
  $state = $crud->escape_string($_POST['state']);
  $city = $crud->escape_string($_POST['city']);
  $pass = md5($crud->escape_string($_POST['password']));
  $targetdir = '../avatar/';    
  
  if(!empty( $_FILES['img']['name'])) {
    $targetfile = $targetdir.$candidate_id.'_'.basename($_FILES['img']['name']);
    //die();
    $imagefilesize = $_FILES['img']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 

    if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';      
     die();   
      
    }
    elseif($imagefilesize<=256000)
      {
        if(move_uploaded_file($_FILES['img']['tmp_name'], $targetfile))
        {
          $img =  $candidate_id.'_'.$_FILES['img']['name'];
        }
      }
      else
      {
        echo '<script type="text/javascript">alert("File size should be between 10kb to 256kb");</script>';
        echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>'; 
        die();
      }  
  }
  else{
    $img = $crud->escape_string($_POST['previmg']);
  }
  
      //insert data to database    
      $result = $crud->execute("UPDATE `tbl_candidate_registration` SET `candidate_id`='$usrid', `first_name`='$fname',`last_name`='$lname',`gender`='$gender',`d_o_b`='$dob',`address`='$address',`mobile`='$mobile',`email`='$email',`password`='$pass',`avatar`='$img',`country`='$country',`state`='$state',`city`='$city',`package_type`='$fname',`package_expiry`=now(),`last_login_date`=now(),`modified_by`='$fname',`modified_date`=now()  WHERE id = '$candidate_id'");

        echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
        echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';
       
      
}
if(isset($_POST['active'])) {  
  $candidate_id = $_POST['hiddenValue'];
  $status = $_POST['status']; 
  if( $status == "active"){
    $result = $crud->execute("UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'");
  }
  if($status == "inactive"){
    $result = $crud->execute("UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'");
  }
  echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-candidate.php");</script>';
}


?>