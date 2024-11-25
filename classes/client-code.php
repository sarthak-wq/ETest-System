<?php
 error_reporting(0);
include("etsystem.php");
 
$crud = new Etstysem();
 
if(isset($_POST['Submit'])) {    
    echo $firstname = $crud->escape_string($_POST['firstname']);  
    $lastname = $crud->escape_string($_POST['lastname']); 
    $client_id = AD.'-'.rand(10,999999);
    $gender = $crud->escape_string($_POST['gender']);
    $dob = $crud->escape_string($_POST['d_o_b']);
    $address = $crud->escape_string($_POST['address']);
    $mobile = $crud->escape_string($_POST['mobile']);
    $email = $crud->escape_string($_POST['email']);    
    $position = $crud->escape_string($_POST['position']);
    $country = $crud->escape_string($_POST['country']);
    $state = $crud->escape_string($_POST['state']);
    $city = $crud->escape_string($_POST['city']);
    $designation = $crud->escape_string($_POST['designation']);
    $role = $crud->escape_string($_POST['role']);
    $director = $crud->escape_string($_POST['director']);
    $password = $crud->escape_string($_POST['password']);
    $passwordconfirm = $crud->escape_string($_POST['confirm_password']);

    if($password!=$passwordconfirm)
    {
     echo '<script type="text/javascript">alert("Password and Confirm Password do not match");</script>';
     echo '<script type="text/javascript">window.location.assign("../add-client.php");</script>';      
    
    }

    $targetdir = '../photo/';    

    $targetfile = $targetdir.$client_id.'_'.basename($_FILES['sign']['name']);
    //die();
    $imagefilesize = $_FILES['sign']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
    
    if($imageFileType != 'jpg' &&  $imageFileType != 'png' && $imageFileType != 'jpeg')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../add-client.php");</script>';      
      
      
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
           
        //insert data to database    
        $result = $crud->execute("INSERT INTO `tbl_client_registration`(`client_id`, `first_name`, `last_name`, `gender`, `d_o_b`, `address`, `mobile`, `email`, `dept_id`, `category_id`, `logo`, `country`, `state`, `city`, `package_type`, `package_expiry_date`, `role`, `position`, `director_name`, `last_login_date`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`,`password`) VALUES ('$client_id', '$firstname', '$lastname', '$gender','$dob','$address','$mobile','$mail','dept_id','category_id','$logo','country','state','$city','package_type','package_expiry_date','$role','$position','$director_name',now(),'created_by','modified_by',now(),now(),'y',MD5('$password'))");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';

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
    $dob = $crud->escape_string($_POST['dob']);
    $logo = $crud->escape_string($_POST['sign']);
    $gender = $crud->escape_string($_POST['gender']);
    $address = $crud->escape_string($_POST['address']);
    $role = $crud->escape_string($_POST['role']);
    $position = $crud->escape_string($_POST['position']);
    $director = $crud->escape_string($_POST['director']);
    $country = $crud->escape_string($_POST['country']);
    $state = $crud->escape_string($_POST['state']);
    $city = $crud->escape_string($_POST['city']);
    //$dob = $crud->escape_string($_POST['dob']);
    $clientId = $crud->escape_string($_POST['clientId']);
    $result = $crud->execute("UPDATE tbl_client_registration SET first_name = '$firstname', last_name='$lastname', email ='$email', mobile='$mobile', logo='$logo', d_o_b='$dob', gender='$gender', address='$address', role='$role',position='$position', director_name='$director',country='$country', state='$state', city='$city' WHERE id =  $clientId ");

    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';

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
  $client_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_client_registration` SET `currentStatus`='y'  WHERE id = '$client_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';
}
if(isset($_POST['inactive'])) {  
  $client_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_client_registration` SET `currentStatus`='n'  WHERE id = '$client_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-client.php");</script>';
}

?>
?>
