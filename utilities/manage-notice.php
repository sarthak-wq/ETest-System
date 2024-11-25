<?php
  //error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
  $query = "SELECT * FROM  tbl_notice ORDER BY id DESC";
  $results = $crud->getData($query); if(!empty($_GET['id'])) { $noticeId = $crud->escape_string($_GET['id']); $result = $crud->delete($noticeId, 'tbl_notice'); header("location:manage-notice.php"); } ?>
<?php
  include "includes/head-logo.php";
  include "includes/header.php"; 
  include "includes/sidebar.php";  
?>
<section class="body">
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Manage Notice</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Dashboard</span></li>
                    <li><span>Notice</span></li>
                </ol>
                <span>&nbsp</span>
                <span>&nbsp</span>
            </div>
        </header>
        <!-- start: page -->
        <section class="panel">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10"><h2 class="panel-title my-4">Notice List</h2></div>
                    <div class="col-sm-4 col-md-2 float-right">
                        <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalLG">Add<i class="fa fa-plus"></i> </a>
                    </div>
                </div>
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-md-9 d-inline">
                        <div class="mb-md">
                            <!-- Modal -->
                            <div id="modalLG" class="modal-block modal-block-lg mfp-hide">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">
                                            Add Notice <button type="button" class="close modal-dismiss" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </h2>
                                    </header>
                                    <div class="panel-body">
                                        <form method="post" action="classes/notice_code.php">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>Notice Title</label>
                                                    <input type="text" class="form-control" name="notice_title" id="notice_title" required="required" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label class="col control-label">Notice Description</label>
                                                    <textarea name="notice_description" data-plugin-markdown-editor rows="10" required="required"></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="Submit" name="Submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
                                                    <a href="manage-notice.php" class="btn btn-default modal-dismiss">Close</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                            <!-- end modal -->
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                       
                            <th>Notice Title</th>
                            <th>Notice Description</th>
                            <th>Created Date</th>
                            <th>Current Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; foreach ($results as $key =>
                        $row) { ?>

                        <tr class="gradeX">
                            <td><?php echo $i++; ?></td>
                           
                            <td><?php echo $row['notice_title']; ?></td>
                            <td><?php echo $row['notice_description']; ?></td>
                            <td><?php echo date('d-m-Y',strtotime($row['created_date']));?></td>
                            <td>
                                <?php if($row['currentStatus']=='y'){ ?>
                                <form action="manage-notice.php" method="post">
                                    <button type="button" data-status="active" name="act" class="btn btn-success btn-sm rounded-0 btm-custom" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
                                </form>

                                <?php } ?>
                                <?php if($row['currentStatus']=='n'){ ?>
                                <form action="manage-notice.php" method="post">
                                    <button type="button" class="btn btn-danger btn-sm rounded-0 btm-custom" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
                                </form>

                                <?php } ?>
                            </td>
                            <td class="actions">
                                <a href="edit-notice.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0" title="Edit" alt="Edit" style="color: white"><i class="fa fa-pencil"></i></a>
                                <a href="manage-notice.php?id=<?php echo $row['id']; ?>" onclick="return confirm('do you want to delete this Record?');" class="btn btn-danger btn-sm rounded-0 btm-custom" title="View" alt="View" style="color: white"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto" id="exampleModalLongTitle"><b>Do you really want to change status</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="classes/notice_code.php" class="mx-auto" method="post">
                            <input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
                            <input type="hidden" name="status" id="status" value="" /><br />
                            <input type="submit" name="active" value="Yes" class="btn btn-success" />
                            <input type="submit" value="No" class="btn btn-default" data-dismiss="modal" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php"; ?>

        <script type="text/javascript">
            $(document).on("click", ".exampleModal", function () {
                var myBookId = $(this).data("id");
                var stat = $(this).data("status");
                $(".modal-body #hiddenValue").val(myBookId);
                $(".modal-body #status").val(stat);
            });
        </script>
    </section>
</section>
