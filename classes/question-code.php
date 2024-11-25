<?php
error_reporting(0);

//include_once '../includes/DbConfig.php';
include("etsystem.php");

 
$crud = new Etstysem();

//question
if(isset($_POST['Submit'])) 
{    
   
 $folder_name = $crud->escape_string($_POST['folder_name']);
 $targetdir1 = '../questimages/'.$folder_name.'/';  
 $client_id = CL.rand(10,99999); 

    if(!is_dir($targetdir1))
    {
      mkdir($targetdir1, 0777);
    }
  $targetfile1 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption1']['name']);
  //echo $targetdir1 = '../questimages/'.$folder_name.'/'.$_FILES['fileoption1']['name']; 
  $imagefilesize1 = $_FILES['fileoption1']['size'];
  $imageFileType1 = strtolower(pathinfo($targetfile1,PATHINFO_EXTENSION)); 
    
    if(move_uploaded_file($_FILES['fileoption1']['tmp_name'], $targetfile1))
      {
    $fileoption1 = $client_id.'_'.$_FILES['fileoption1']['name'];
      }
   
    $targetfile2 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption2']['name']);

    $imagefilesize2 = $_FILES['fileoption2']['size'];
    $imageFileType2 = strtolower(pathinfo($targetfile2,PATHINFO_EXTENSION)); 
    
    if(move_uploaded_file($_FILES['fileoption2']['tmp_name'], $targetfile2))
    {
    $fileoption2 =  $client_id.'_'.$_FILES['fileoption2']['name'];
    }
 
    $targetfile3 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption3']['name']);
    $imagefilesize3 = $_FILES['fileoption3']['size'];
    $imageFileType3 = strtolower(pathinfo($targetfile3,PATHINFO_EXTENSION)); 
    
    if(move_uploaded_file($_FILES['fileoption3']['tmp_name'], $targetfile3))
    {
    $fileoption3 =  $client_id.'_'.$_FILES['fileoption3']['name'];
    }
    
    $targetfile4 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption4']['name']);
    $imagefilesize4 = $_FILES['fileoption4']['size'];
    $imageFileType4 = strtolower(pathinfo($targetfile4,PATHINFO_EXTENSION)); 
    
    if(move_uploaded_file($_FILES['fileoption4']['tmp_name'], $targetfile4))
    {
   $fileoption4 =  $client_id.'_'.$_FILES['fileoption4']['name'];
    }
     
    $targetfile5 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption5']['name']);
    $imagefilesize5 = $_FILES['fileoption5']['size'];
    $imageFileType5 = strtolower(pathinfo($targetfile5,PATHINFO_EXTENSION)); 
  
    if(move_uploaded_file($_FILES['fileoption5']['tmp_name'], $targetfile5))
    {
    $fileoption5 =  $client_id.'_'.$_FILES['fileoption5']['name'];
    }
     
    $targetfile6 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption6']['name']);
    $imagefilesize6 = $_FILES['fileoption6']['size'];
    $imageFileType6 = strtolower(pathinfo($targetfile6,PATHINFO_EXTENSION)); 

    if(move_uploaded_file($_FILES['fileoption6']['tmp_name'], $targetfile6))
    {
    $fileoption6 =  $client_id.'_'.$_FILES['fileoption6']['name'];
    }
     
    $targetfile7 = $targetdir1.$client_id.'_'.basename($_FILES['fileoption7']['name']);
    $imagefilesize7 = $_FILES['fileoption7']['size'];
    $imageFileType7 = strtolower(pathinfo($targetfile7,PATHINFO_EXTENSION)); 

    if(move_uploaded_file($_FILES['fileoption7']['tmp_name'], $targetfile7))
    {
    $fileoption7 =  $client_id.'_'.$_FILES['fileoption7']['name'];
    }

    $targetfile = $targetdir1.$client_id.'_'.basename($_FILES['fileoption']['name']);
    $imagefilesize = $_FILES['fileoption']['size'];
    $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION)); 

    if(move_uploaded_file($_FILES['fileoption']['tmp_name'], $targetfile))
    {
   $fileoption =  $client_id.'_'.$_FILES['fileoption']['name'];
    }

    $question_id = QS.'-'.rand(10,999999); 
    $question_text = trim($crud->escape_string($_POST['question_text']));  
    $subject_id = trim($crud->escape_string($_POST['subject_id'])); 
    $option1 = trim($crud->escape_string($_POST['option1']));  
    $option2 = trim($crud->escape_string($_POST['option2']));
    $option3 = trim($crud->escape_string($_POST['option3']));
    $option4 = trim($crud->escape_string($_POST['option4']));
    $option5 = trim($crud->escape_string($_POST['option5']));
    $option6 = trim($crud->escape_string($_POST['option6']));
    $option7 = trim($crud->escape_string($_POST['option7']));
    $answer1 = $crud->escape_string($_POST['answer1']); 
    $answer2 = $crud->escape_string($_POST['answer2']); 
    $answer3 = $crud->escape_string($_POST['answer3']); 
    $answer4 = $crud->escape_string($_POST['answer4']); 
    $answer5 = $crud->escape_string($_POST['answer5']); 
    $answer6 = $crud->escape_string($_POST['answer6']); 
    $answer7 = $crud->escape_string($_POST['answer7']);
   
echo "INSERT INTO `tbl_questions`(`id`, `client_id`,`subject_id`, `question_id`, `question_text`, `question_image`, `answer1`,`answer2`,`answer3`,`answer4`,`answer5`,`answer6`,`answer7`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option1_image`,`option2_image`,`option3_image`,`option4_image`,`option5_image`,`option6_image`,`option7_image`,`folder_name`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$id','$client_id','$subject_id','$question_id','$question_text','$question_image','$answer1','$answer2','$answer3','$answer4','$answer5','$answer6','$answer7','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$fileoption1','$fileoption2','$fileoption3','$fileoption4','$fileoption5','$fileoption6','$fileoption7','$folder_name', created_by','modified_by', now(), now(), 'y')";
die;

   $result = $crud->execute("INSERT INTO `tbl_questions`(`id`, `client_id`,`subject_id`, `question_id`, `question_text`, `question_image`, `answer1`,`answer2`,`answer3`,`answer4`,`answer5`,`answer6`,`answer7`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option1_image`,`option2_image`,`option3_image`,`option4_image`,`option5_image`,`option6_image`,`option7_image`,`folder_name`,`description`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) VALUES ('$id','$client_id','$subject_id','$question_id','$question_text','$fileoption','$answer1','$answer2','$answer3','$answer4','$answer5','$answer6','$answer7','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$fileoption1','$fileoption2','$fileoption3','$fileoption4','$fileoption5','$fileoption6','$fileoption7','$folder_name','$description', 'created_by','modified_by', now(), now(), 'y')");

      echo '<script type="text/javascript">alert("You  have been sucessfully submitted...!");</script>';
      echo '<script type="text/javascript">window.location.assign("../manage-question.php");</script>';
}

?>