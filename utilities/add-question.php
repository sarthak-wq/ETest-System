<?php
error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_subjects ORDER BY id DESC";
	$results = $crud->getData($query); ?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

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

                    <h2 class="panel-title">Add Question</h2>
                </header>
                <form class="form-group" action="classes/question-code.php" method="post" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row" style="line-height: 35px;">
                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Images Folder Name</label>
                                    <select name="folder_name" id="folder_name" class="mdb-select md-form form-control">
                                        <?php
                                                            $queryimag = "SELECT * FROM tbl_subimages_folder ORDER BY id DESC";
                                                          $resultimg = $crud->getData($queryimag ); foreach ($resultimg as $key => $rows) { ?>
                                        <option value="<?php echo $rows['folder_name']; ?>"><?php echo $rows['folder_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Question</label>

                                    <textarea name="question_text" id="question_text" placeholder="Enter Question" class="form-control" required=""></textarea>
                                    <div>OR</div>
                                    <div><input type="file" name="fileoption" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="line-height: 35px;">
                                        <tr role="row">
                                            <th width="10%">Option No.</th>
                                            <th width="80%">Option</th>
                                            <th width="10%" align="center">Answer</th>
                                        </tr>
                                        <tr role="row">
                                            <td width="10%">1</td>
                                            <td width="80%">
                                                Option 1<textarea name="option1" id="option1" placeholder="Enter Option 1" class="form-control" required=""></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption1" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer1" id="answer1" value="1" /></td>
                                        </tr>
                                        <tr role="row">
                                            <td>2</td>
                                            <td width="80%">
                                                Option 2<textarea name="option2" id="option2" placeholder="Enter Option 2" class="form-control" required=""></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption2" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer2" id="answer2"  value="2" /></td>
                                        </tr>
                                        <tr class="gradeA odd" role="row">
                                            <td width="10%">3</td>
                                            <td width="80%">
                                                Option 3<textarea name="option3" id="option3" placeholder="Enter Option 3" class="form-control" required=""></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption3" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer3" id="answer3"  value="3" /></td>
                                        </tr>
                                        <tr class="gradeA even" role="row">
                                            <td width="10%">4</td>
                                            <td width="80%">
                                                Option 4<textarea name="option4" id="option4" placeholder="Enter Option 4" class="form-control" required=""></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption4" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer4" id="answer4"  value="4"/></td>
                                        </tr>
                                        <tr class="gradeA odd" role="row">
                                            <td width="10%">5</td>
                                            <td width="80%">
                                                Option 5<textarea name="option5" id="option5" placeholder="Enter Option 5" class="form-control"></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption5" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer5" id="answer5"  value="5"/></td>
                                        </tr>
                                        <tr class="gradeA even" role="row">
                                            <td width="10%">6</td>
                                            <td width="80%">
                                                Option 6<textarea name="option6" id="option6" placeholder="Enter Option 6" class="form-control"></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption6" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer6" id="answer6"  value="6" /></td>
                                        </tr>
                                        <tr class="gradeA odd" role="row">
                                            <td width="10%">7</td>
                                            <td width="80%">
                                                Option 7 <textarea name="option7" id="option7" placeholder="Enter Option 7" class="form-control"></textarea>
                                                <div>OR</div>
                                                <div><input type="file" name="fileoption7" /></div>
                                            </td>
                                            <td width="10%" align="center"><input type="checkbox" name="answer7" id="answer7"  value="7" /></td>
                                        </tr>
                                           <tr class="gradeA odd" role="row">
                                            <td width="10%"></td>
                                            <td width="80%" colspan="2">
                                               Description <textarea name="description" id="description" placeholder="Enter description" class="form-control"></textarea>
                                           
                                            
                                            </td>
                                         
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <footer style="padding-top: 30px;">
                            <button class="btn btn-primary" name="Submit" style="float: right;">Submit</button>
                            <div style="padding-right: 80px;">
                                <button type="reset" class="btn btn-default" style="float: right;">Reset</button>
                            </div>
                        </footer>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->

	</body>
</html>