<?php
  error_reporting(0);
//including the database connection file
include("etsystem.php");
//include_once("classes/Validation.php");
 
$crud = new Etstysem();

if(isset($_POST['Submit'])) { 
    
    $advertisement_id = rand(10,999999);
    $advertisement_type = $crud->escape_string($_POST['advertisement_type']);
    $advertisement_name = $crud->escape_string($_POST['advertisement_name']);
    $advertisement_url = $crud->escape_string($_POST['advertisement_url']);
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

    $result = $crud->execute("INSERT INTO  
    tbl_advertisement(advertisement_id,advertisement_type,advertisement_name,advertisement_image,	advertisement_valid_from,advertisement_valid_to,advertisement_description,created_by,modified_by,created_date,modified_date,currentStatus) VALUES('$advertisement_id','$advertisement_type','$advertisement_name','$logo','$advertisement_valid_from','$advertisement_valid_to','$advertisement_description','created_by','modified_by',now(),now(),'y')");
    
    echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
    echo '<script type="text/javascript">window.location.assign("../manage-advertisement.php");</script>';


}
?>