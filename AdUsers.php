<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'AdUsers';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USERS</h2>
            <br/>

            <!--CUSTOM BLOCK INSERT HERE-->

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                OFFICIALS LIST
                                <small>The current list of officials of the Barangay. Click "Add New" to add an official or "Edit" to modify on the existing official </small>
                            </h2>
                            <br/>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Authority</th>
                                            <th>Status</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Barangay Captain</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Active</td>
                                            <td><button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateOfcModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button></td>
                                        </tr>
                                        <tr>
                                            <td>Abela Aballa</td>
                                            <td>Secretary</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Active</td>
                                            <td><button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#delegateOfcModal">
                                                            <i class="material-icons">mode_edit</i>
                                                            <span>EDIT</span>
                                                        </button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

            <div class="modal fade" id="delegateOfcModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Assign/Unassign
                                <br/>
                                <small>Select A User to Assign/Unassign Level of Authority</small>
                            </h2>
                        </div>


                        <div class="card">
                            <div class="body">
                                <form action="" id="sign_in" method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row clearfix margin-0">
                                            <h4 class="card-inside-title">Status</h4>
                                            <div class="demo-switch">
                                                <div class="switch">
                                                    <label>Inactive<input type="checkbox" checked><span class="lever switch-col-orange"></span>Active</label>
                                                </div>
                                            </div>
                                            <h4 class="card-inside-title">Position For: </h4>
                                            <br/>


                                            <h5>Authority Level</h5>
                                            <select class="form-control show-tick">
                                            <option>None</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>



                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect " type="submit">UPDATE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <?php include('footer.php'); ?>
