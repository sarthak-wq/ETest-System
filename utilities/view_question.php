<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
    $quesid =$_GET['quesid'];
    $queryss = "SELECT * FROM  tbl_questions where id = '$quesid'";
	$resultss = $crud->getData($queryss);
    foreach( $resultss as $key => $row)
	{
		$question_text = $row['question_text'];
		$subject_id = $row['subject_id'];
		$option1 = $row['option1'];
		$option2 = $row['option2'];
		$option3 = $row['option3'];
		$option4 = $row['option4'];
		$option5 = $row['option5'];
		$option6 = $row['option6'];
		$option7 = $row['option7'];
		$answer1 = $row['answer1'];
		$answer2 = $row['answer2'];
		$answer3 = $row['answer3'];
		$answer4 = $row['answer4'];
		$answer5 = $row['answer5'];
		$answer6 = $row['answer6'];
		$answer7 = $row['answer7'];
		$question_image = $row['question_image'];
		$option1_image = $row['option1_image'];
		$option2_image = $row['option2_image'];
		$option3_image = $row['option3_image'];
		$option4_image = $row['option4_image'];
		$option5_image = $row['option5_image'];
		$option6_image = $row['option6_image'];
		$option7_image = $row['option7_image'];
		$folder_name = $row['folder_name'];
	}

	$query = "SELECT * FROM  tbl_subjects  where subject_id = '$subject_id'";
	$results = $crud->getData($query);
	foreach( $results as $key => $row)
	{
	$subject_name = $row['subject_name'];
	
	}
	
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>
				<folder_name!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Question</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php.">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Questions</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">

						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">View Question</h2>

						
								  </div>
								</header>
								<div class="panel-body">
									<div class="row" style="line-height: 35px;">
										<div class="col-sm-8">
											<div class="form-group">
												<label class="control-label">Subject Name : </label>
											<b><?php echo $subject_name; ?></b>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Question :</label>
												
												<?php echo $question_text;?>
                                                 <div>OR</div>
                                                <div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $question_image; ?>"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: 35px;">
<tr role="row">
<th  width="10%">Option No.</th>
<th  width="80%">Option</th>
<th  width="10%"  align="center">Answer</th>
</tr>
<tr role="row">
<td width="10%">1</td>
<td  width="80%">Option 1 : <?php echo $option1;?>
<div>OR</div>
 <div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option1_image; ?>"></div>
</td>
<td width="10%" align="center">
<?php if($answer1==1){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?>
</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr role="row">
<td >2</td>
<td width="80%">Option 2 : <?php echo $option2;?>
<div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option2_image; ?>"></div>
</td>
<td width="10%"  align="center"><?php if($answer2==2){ ?>
	<input type="checkbox"  name="answer2" id="answer2" checked="checked" disabled="disabled"></td>
<?Php } ?></td>
</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr class="gradeA odd" role="row">
<td width="10%">3</td>
<td width="80%">Option 3 : <?php echo $option3;?>
<div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option3_image; ?>"></div>
</td>
<td width="10%"  align="center">
<?php if($answer3==3){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?>
	</td>
</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr class="gradeA even" role="row">
<td width="10%">4</td>
<td width="80%">Option 4 : <?php echo $option4;?>
<div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option4_image; ?>"></div>
</td>	
<td width="10%" align="center"><?php if($answer4==4){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?></td>
</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr class="gradeA odd" role="row">
<td width="10%">5</td>
<td width="80%">Option 5 : <?php echo $option5;?> <div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option5_image; ?>"> </div></td>
<td width="10%"  align="center"><?php if($answer5==5){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?></td>
</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr class="gradeA even" role="row">
<td width="10%">6</td>
<td width="80%">Option 6 : <?php echo $option6;?> <div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option6_image; ?>"></div></td>
<td width="10%" align="center"><?php if($answer6==6){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?></td>

</tr>
<tr role="row"><td colspan="3"><hr></td></tr>
<tr class="gradeA odd" role="row">
<td width="10%">7</td>
<td width="80%">Option 7 :<?php echo $option7;?> <div>OR</div>
<div><img src="questimages/<?php echo $folder_name; ?>/<?php echo $option7_image; ?>"></div></td>	
<td width="10%"  align="center"><?php if($answer7==7){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked" disabled="disabled"></td>
<?Php } ?></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
														
												</table>
											</div>
										</div>
									</div>
									<footer  style="padding-top: 30px;">
									
										<div style="padding-right: 80px;" >
											<a href="manage-question.php"><button type="button" class="btn btn-default" style="float: right;">Back</button></a>
										</div>
									</footer>
								</div>
							
								<!--<footer class="panel-footer">
										<button class="btn btn-primary" style="float: right;">Submit</button>
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
								</footer>-->
								
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>

		
		</section>
<script type="text/javascript">
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
		<?php include "includes/footer.php"; ?>