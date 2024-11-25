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
		$questionid = $row['id'];
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
		$option_image = $row['question_image'];
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
  <form class="form-group" action="classes/edit-question-code.php" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="questionid" value="<?php echo $questionid;?>">
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
												<label class="control-label">Subject Name</label>
												 <select name="subject_id" id="subject_id" class="mdb-select md-form form-control" searchable="Search here..">
                                        <?php  foreach ($results as $key =>
                                        $row) { ?>
                                        <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
                                        <?php } ?>
                                    </select>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Question</label>
												
												<textarea name="question_text" id="question_text"   placeholder="Enter Question" class="form-control"  required=""><?php echo $question_text;?></textarea>
                                                 <div>OR</div>
                                                <div><input type="hidden" name="question_image" value="<?php echo $option_image; ?>" />

                                                	<input type="file" name="fileoption" />
                                                	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option_image; ?>"></div>
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
<td  width="80%">Option 1<textarea name="option1" id="option1"   placeholder="Enter Option 1"class="form-control"  required=""><?php echo $option1;?></textarea>
<div>OR</div>
 <div><input type="file" name="fileoption1" />
 	<input type="hidden" name="question1_image" value="<?php echo $option1_image; ?>" />
 	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option1_image; ?>"></div>
</td>
<td width="10%" align="center"><?php if($answer1==1){ ?>
	<input type="checkbox"  name="answer1" id="answer1" checked="checked"  value="1">
<?Php }else {?> <input type="checkbox"  name="answer1" id="answe1"  value="1"> <?php } ?></td>
</tr>
<tr role="row">
<td >2</td>
<td width="80%">Option 2<textarea name="option2" id="option2"   placeholder="Enter Option 2"class="form-control"  required=""><?php echo $option2;?></textarea>
<div>OR</div>
<div><input type="file" name="fileoption2" />
	<input type="hidden" name="question2_image" value="<?php echo $option2_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option2_image; ?>"></div>
</td>
<td width="10%"  align="center"><?php if($answer2==2){ ?>
	<input type="checkbox"  name="answer2" id="answer2" checked="checked"  value="2">
<?Php } else {?> <input type="checkbox"  name="answer2" id="answer2"  value="2"> <?php } ?></td>
</tr>
<tr class="gradeA odd" role="row">
<td width="10%">3</td>
<td width="80%">Option 3<textarea name="option3" id="option3"   placeholder="Enter Option 3"class="form-control"  required=""><?php echo $option3;?></textarea>
<div>OR</div>
<div><input type="file" name="fileoption3" />
	<input type="hidden" name="question3_image" value="<?php echo $option3_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option3_image; ?>"></div>
</td>
<td width="10%"  align="center"><?php if($answer3==3){ ?>
	<input type="checkbox"  name="answer3" id="answer3" checked="checked"  value="3"></td>
<?Php } else {?> <input type="checkbox"  name="answer3" id="answer3"  value="3"> <?php } ?></td>
</tr>
<tr class="gradeA even" role="row">
<td width="10%">4</td>
<td width="80%">Option 4<textarea name="option4" id="option4"   placeholder="Enter Option 4"class="form-control"  required=""><?php echo $option4;?></textarea>
<div>OR</div>
<div><input type="file" name="fileoption4" />
	<input type="hidden" name="question4_image" value="<?php echo $option4_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option4_image; ?>"></div>
</td>	
<td width="10%" align="center"><?php if($answer4==4){ ?>
	<input type="checkbox"  name="answer4" id="answer4" checked="checked"  value="4"></td>
<?Php } else {?> <input type="checkbox"  name="answer4" id="answer4"  value="4"> <?php } ?></td>
</tr>
<tr class="gradeA odd" role="row">
<td width="10%">5</td>
<td width="80%">Option 5<textarea  name="option5" id="option5" placeholder="Enter Option 5" class="form-control"><?php echo $option5;?></textarea><div>OR</div>
<div><input type="file" name="fileoption5" />
	<input type="hidden" name="question5_image" value="<?php echo $option5_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option5_image; ?>"> </div></td>
<td width="10%"  align="center"><?php if($answer5==5){ ?>
	<input type="checkbox"  name="answer5" id="answer5" checked="checked"  value="5">
<?Php } else {?> <input type="checkbox"  name="answer5" id="answer5"  value="5"> <?php } ?></td>
</tr>
<tr class="gradeA even" role="row">
<td width="10%">6</td>
<td width="80%">Option 6<textarea  name="option6" id="option6" placeholder="Enter Option 6" class="form-control"><?php echo $option6;?></textarea><div>OR</div>
<div><input type="file" name="fileoption6" />
	<input type="hidden" name="question6_image" value="<?php echo $option6_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option6_image; ?>"></div></td>
<td width="10%" align="center"><?php if($answer6==6){ ?>
	<input type="checkbox"  name="answer6" id="answer6" checked="checked"  value="6"></td>
<?Php } else {?> <input type="checkbox"  name="answer6" id="answer6"  value="6"> <?php } ?></td>

</tr>
<tr class="gradeA odd" role="row">
<td width="10%">7</td>
<td width="80%">Option 7 <textarea  name="option7" id="option7" placeholder="Enter Option 7" class="form-control"><?php echo $option7;?></textarea> <div>OR</div>
<div><input type="file" name="fileoption7" />
	<input type="hidden" name="question7_image" value="<?php echo $option7_image; ?>" />
	<img src="questimages/<?php echo $folder_name; ?>/<?php echo $option7_image; ?>"></div></td>	
<td width="10%"  align="center"><?php if($answer7==7){ ?>
	<input type="checkbox"  name="answer7" id="answer7" checked="checked"  value="7"></td>
<?Php } else {?> <input type="checkbox"  name="answer7" id="answer7"  value="7"> <?php } ?></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
														
												</table>
											</div>
										</div>
									</div>
									<footer  style="padding-top: 30px;">
										<button class="btn btn-primary" style="float: right;" name="Submit">Update</button>
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
									</footer>
								</div>
							<
								<!--<footer class="panel-footer">
										<button class="btn btn-primary" style="float: right;">Submit</button>
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
								</footer>-->
								
							</section>
						</div>
					</div>
				</form>
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