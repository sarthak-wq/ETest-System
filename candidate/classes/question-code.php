<?php
//error_reporting(0);
//including the database connection file

include_once '../includes/DbConfig.php';
include("etsystem.php");

//include_once("classes/Validation.php");
 
$crud = new Etstysem();
//$validation = new Validation();
 


 //file upload
if(isset($_POST['Submit1']))
{
   

    $targetdir = '../signature/';    

    $targetfile = $targetdir.$client_id.'_'.basename($_FILES['sign']['name']);


    $imagefilesize = $_FILES['sign']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 
    
    if($imageFileType != 'xls')
    {

     echo '<script type="text/javascript">alert("Invalid file type!");</script>';
     echo '<script type="text/javascript">window.location.assign("../manage-question.php");</script>';      
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
        echo '<script type="text/javascript">window.location.assign("../manage-question.php");</script>'; 
        die();
      }
  
}





//question
if(isset($_POST['Submit'])) 
{    
   
    $question_id = rand(10,999999); 
    $question_text = $crud->escape_string($_POST['question_text']);  
    $answer = $crud->escape_string($_POST['answer']);  
    $option1 = $crud->escape_string($_POST['option1']);  
    $option2 = $crud->escape_string($_POST['option2']);
    $option3 = $crud->escape_string($_POST['option3']);
    $option4 = $crud->escape_string($_POST['option4']);
    $option5 = $crud->escape_string($_POST['option5']);
    $option6 = $crud->escape_string($_POST['option6']);
    $option7 = $crud->escape_string($_POST['option7']);

    // checking empty fields
    //if($department_name != null) {
           
        //link to the previous page
      // echo 'Please provide proper department name.';
   // }    
    //else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
      //echo "INSERT INTO `tbl_questions`(`id`, `question_id`, `question_text`, `answer`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$id','$question_id','$question_text','$answer','$option1','$option2','$option3','$option4','$option5','$option6','$option7','created_by','modified_by', now(), now(), 'y')";
//die();
        $result = $crud->execute("INSERT INTO `tbl_questions`(`id`, `question_id`, `question_text`, `answer1`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$id','$question_id','$question_text','$answer','$option1','$option2','$option3','$option4','$option5','$option6','$option7','created_by','modified_by', now(), now(), 'y')");

          echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
          echo '<script type="text/javascript">window.location.assign("../manage-question.php");</script>';
         
        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='manage-department.php'>View Result</a>";
    //}


}

?>