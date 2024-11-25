<?php 
session_start();
$connect = mysqli_connect("localhost","root","", "itnsystems_ets");
$etsoftId = $_SESSION['etsoftId'];

$subject_id = trim($_POST['subject_id']);
  $filename=$_FILES["fileupload"]["tmp_name"];    
     if($_FILES["fileupload"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            $question_id = QS.'-'.rand(10,999999); 
            echo  $sql = "INSERT into tbl_questions (`subject_id`, `question_id`, `question_text`, `question_image`, `answer1`,`answer2`,`answer3`,`answer4`,`answer5`,`answer6`,`answer7`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option1_image`,`option2_image`,`option3_image`,`option4_image`,`option5_image`,`option6_image`,`option7_image`,`created_by`, `modified_by`, `created_date`, `modified_date`, `currentStatus`) 
                   values ('".$subject_id."','".$question_id."', '".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."','admin','admin',now(),now(),'Y')";
                   $result = mysqli_query($connect, $sql);
       
           }
      
           fclose($file);  
     }
?>