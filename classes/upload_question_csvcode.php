<?php 
$connect = mysqli_connect("localhost","root","", "etest");

$filepath = "importdata\sample.csv"; 

if (($getdata = fopen($filepath, "r")) !== FALSE) {
               fgetcsv($getdata);   
               while (($data = fgetcsv($getdata)) !== FALSE) {
                    $fieldCount = count($data);
                    for ($c=0; $c < $fieldCount; $c++) {
                      $columnData[$c] = $data[$c];
                    }

             $client_id = mysqli_real_escape_string($connect ,$columnData[0]);
             $subject_id = mysqli_real_escape_string($connect ,$columnData[1]);
             $question_id = mysqli_real_escape_string($connect ,$columnData[2]);
             $question_text = mysqli_real_escape_string($connect ,$columnData[3]);
             $answer1 = mysqli_real_escape_string($connect ,$columnData[4]);
             $answer2 = mysqli_real_escape_string($connect ,$columnData[5]);
             $answer3 = mysqli_real_escape_string($connect ,$columnData[6]);
             $answer4 = mysqli_real_escape_string($connect ,$columnData[7]);
             $answer5 = mysqli_real_escape_string($connect ,$columnData[8]);
             $answer6 = mysqli_real_escape_string($connect ,$columnData[9]);
             $answer7 = mysqli_real_escape_string($connect ,$columnData[10]);
             $option1 = mysqli_real_escape_string($connect ,$columnData[11]);
             $option2 = mysqli_real_escape_string($connect ,$columnData[12]);
             $option3 = mysqli_real_escape_string($connect ,$columnData[13]);
             $option4 = mysqli_real_escape_string($connect ,$columnData[14]);
             $option5 = mysqli_real_escape_string($connect ,$columnData[15]);
             $option6 = mysqli_real_escape_string($connect ,$columnData[16]);
             $option7 = mysqli_real_escape_string($connect ,$columnData[17]);
             $created_by = mysqli_real_escape_string($connect ,$columnData[18]);
             $modified_by = mysqli_real_escape_string($connect ,$columnData[19]);
             $created_date = date('Y/m/d');
             $modified_date = date('Y/m/d');
             $currentStatus = 'Y';
            
             $import_data[]="('".$client_id."','".$subject_id."','".$question_id."','".$question_text."','".$answer1."','".$answer2."','".$answer3."','".$answer4."','".$answer5."','".$answer6."','".$answer7."','".$option1."','".$option2."','".$option3."','".$option4."','".$option5."','".$option6."','".$option7."','".$created_by."','".$modified_by."','".$created_date."','".$modified_date."','".$currentStatus."')";
            // SQL Query to insert data into DataBase

             }
             $import_data = implode(",", $import_data);
             $query = "INSERT INTO tbl_questions(client_id, subject_id, question_id, question_text, answer1, answer2, answer3, answer4, answer5, answer6, answer7, option1, option2, option3, option4, option5, option6, option7, created_by, modified_by, created_date, modified_date, currentStatus) VALUES  $import_data ;";
             $result = mysqli_query($connect ,$query);
?>