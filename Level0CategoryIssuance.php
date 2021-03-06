<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level0CategoryIssuance';
    $user = 0;
    include_once('LoginCheck.php');
    include('head.php');
    include('Level0_Navbar.php');
?>
<section class="content">
    <div class="container-fluid">

        <!--CUSTOM BLOCK INSERT HERE-->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LIST OF ISSUANCE CATEGORIES
                            <small>The following are the current issuance categories available for the barangay. Click 'Add New' to add.</small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#AddCatModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">IssuanceTypeID</th>
                                        <th>Title</th>
                                        <th>Issuance Type</th>
                                        <th style="width: 15px; ">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('dbconn.php');

                                    $IssuanceCatSQL = "SELECT * FROM bitdb_r_issuancetype";
                                    $IssuanceCatQuery = mysqli_query($bitMysqli,$IssuanceCatSQL) or die(mysqli_error($bitMysqli));
                                    if (mysqli_num_rows($IssuanceCatQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($IssuanceCatQuery))
                                                {
                                                    $TypeID = $row['IssuanceID'];
                                                    $Title = $row['IssuanceType'];
                                                    $Option = $row['IssuanceOption'];

                                                    echo
                                                    '<tr>
                                                        <td class="hide">'.$TypeID.'</td>
                                                        <td>'.$Title.'</td>
                                                        <td>'.$Option.'</td>
                                                        <td>
                                                            <button type="button" class="btn btn-success waves-effect editCat" data-toggle="modal" data-target="#editCatModal">
                                                                <i class="material-icons">mode_edit</i>
                                                                <span>EDIT</span>
                                                            </button>
                                                        </td>

                                                    </tr>';

                                                }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <form id="addCategoryIssue" action="Level0_AddIssuanceCategory.php" method="POST">
        <div class="modal fade" id="AddCatModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add
                            <br/>
                            <small>Add Issuance</small>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="IssuanceTitle" class="form-control" />
                                    <label class="form-label">Issuance Name</label>
                                </div>
                            </div>
                            <label class="form-label">Issuance Type</label>
                                <div class="form-group">
                                    <input type="radio" name="IssuanceOption" id="CheckA" value="Personal" class="with-gap">
                                    <label for="CheckA">Personal</label>

                                    <input type="radio" name="IssuanceOption" id="CheckI" value="Business" class="with-gap">
                                    <label for="CheckI" class="m-l-20">Business</label>
                                </div>

                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">ADD</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form id="editCategoryOrd" action="Level0_EditIssuanceCategory.php" method="POST">
        <div class="modal fade" id="editCatModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit
                            <br/>
                            <small>Edit Issuance</small>
                        </h2>
                    </div>
                    <div class="modal-body hide">
                        <div class="row clearfix margin-0 hide">
                            <label class="form-label">Issuance ID</label>
                            <div class="form-group form-float hide">
                                <div class="form-line hide">
                                    <input id="editIssueID" type="text" name="IssuanceID" class="form-control hide" />
                                   <!--  <label class="form-label hide">Ordinance ID</label> -->
                                </div>
                            </div>

                        </div>
                        <br/>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <label class="card-inside-title">Issuance Name</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="editIssueTitle" type="text" name="IssuanceTitle" class="form-control" />
                                    <!-- <label class="form-label">Ordinance Title</label> -->
                                </div>
                            </div>
                            <label class="form-label">Issuance Type</label>
                                <div class="form-group">
                                    <input type="radio" name="IssuanceOption" id="editCheckA" value="Personal" class="with-gap">
                                    <label for="editCheckA">Personal</label>

                                    <input type="radio" name="IssuanceOption" id="editCheckI" value="Business" class="with-gap">
                                    <label for="editCheckI" class="m-l-20">Business</label>
                                </div>
                        </div>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php include('footer.php'); ?>

        <script type="text/javascript">
    $(document).ready(function()
    {
        $(".editCat").click(function()
        {
            $("#editIssueID").val($(this).closest("tbody tr").find("td:eq(0)").html());
            $("#editIssueTitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
            if ($(this).closest("tbody tr").find("td:eq(2)").text() === "Personal")
            {
                $("#editCheckA").prop("checked", true).trigger('click');
            }
            else
            {
                $("#editCheckI").prop("checked", true).trigger('click');
            }
        });
    });

</script>
