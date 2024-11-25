<?php
include("etsystem.php");
include("check_session.php");
//error_reporting(0);
 $crud = new Etstysem();
if(isset($_POST['addCsv'])=='submit'){
	
	@extract($_POST);

$output = "";
$table = "tbl_questions_csv"; // Enter Your Table Name 
$query = "SELECT * FROM $table ORDER BY id DESC  limit 1";
$resultClients = $crud->getData($query); 

$columns_total = mysqli_fetch_field($resultClients);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysqli_field_name($resultClients, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

foreach ($resultClients as $key => $row) { 
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}



$filename = "test";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename.'.'.csv);

echo $output;
exit;

header("Location:manage_csv.php");
}

?>