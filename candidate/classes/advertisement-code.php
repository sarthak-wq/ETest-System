<?php
 //error_reporting(0);
//including the database connection file
include_once '../includes/DbConfig.php';
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();

if(isset($_POST['Submit'])) { 
    
    $advertisement_id = rand(10,999999);
    $advertisement_name = $crud->escape_string($_POST['advertisement_name']);
    $advertisement_valid_from = $crud->escape_string($_POST['advertisement_valid_from']);
    $advertisement_valid_to = $crud->escape_string($_POST['advertisement_valid_to']);
    $advertisement_description = $crud->escape_string($_POST['advertisement_description']);
    
    $targetdir = '../photo/';    

    $targetfile = $targetdir.$advertisement_id.'_'.basename($_FILES['advertisement_image']['name']);
    //die();
    $imagefilesize = $_FILES['advertisement_image']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
              
    if(move_uploaded_file($_FILES['advertisement_image']['tmp_name'], $targetfile))
      {
          $logo =  $advertisement_id.'_'.$_FILES['advertisement_image']['name'];        
      }

 
    $result = $crud->execute("INSERT INTO tbl_advertisement(advertisement_id,advertisement_name,advertisement_image,	advertisement_valid_from,advertisement_valid_to,advertisement_description,created_by,modified_by,created_date,modified_date,currentStatus) VALUES('$advertisement_id','$advertisement_name','$logo','$advertisement_valid_from','$advertisement_valid_to','$advertisement_description','created_by','modified_by',now(),now(),'y')");
    
    echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-advertisement.php");</script>';


}
if(isset($_POST['Update'])) { 
    
    
    $advertisement_name = $crud->escape_string($_POST['advertisement_name']);
    $advertisement_valid_from = $crud->escape_string($_POST['advertisement_valid_from']);
    $advertisement_valid_to = $crud->escape_string($_POST['advertisement_valid_to']);
    $advertisement_description = $crud->escape_string($_POST['advertisement_description']);
    $advertisementId = $crud->escape_string($_POST['advertisementId']);
    //$advertisementimage = $crud->escape_string($_POST['advertisementimage']);
 
    $result = $crud->execute("UPDATE `tbl_advertisement` SET `advertisement_name`='$advertisement_name',`advertisement_valid_from`='$advertisement_valid_from',`advertisement_valid_to`='$advertisement_valid_to',`advertisement_description`='$advertisement_description',`modified_date`=now() WHERE id=$advertisementId ");
    
    echo '<script type="text/javascript">alert("You  have been sucessfully updated...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-advertisement.php");</script>';


}

if(isset($_POST['active'])) 
{  
  $advertisement_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='n'  WHERE id = '$candidate_id'";
  // die;
  $result = $crud->execute("UPDATE `tbl_advertisement` SET `currentStatus`='y'  WHERE id = '$advertisement_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-advertisement.php");</script>';
}
if(isset($_POST['inactive'])) 
{  
  $advertisement_id = $_POST['hiddenValue'];
  // echo "UPDATE `tbl_candidate_registration` SET `currentStatus`='y'  WHERE id = '$candidate_id'";
  // die; 
  $result = $crud->execute("UPDATE `tbl_advertisement` SET `currentStatus`='n'  WHERE id = '$advertisement_id'");
  //echo '<script type="text/javascript">alert("Table  have been sucessfully updated...!");</script>';
  echo '<script type="text/javascript">window.location.assign("../manage-advertisement.php");</script>';
}

?>