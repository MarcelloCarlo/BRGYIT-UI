<?php $title = 'Welcome | BarangayIT MK.II';?>
<?php $currentPage = 'indexAdmin';?>
<?php include('head.php'); ?>
<?php include('AdminNavbar.php'); ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
 <!--CUSTOM BLOCK INSERT HERE-->

 <!-- Contextual Classes With Linked Items -->
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BARANGAY SITE CONFIGURATION
                                <small>List of currently stored Barangay information. Click "Update" below the list to modify</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipality</h4>
                                    <p class="list-group-item-text">
                                        (None)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Independent/Component</h4>
                                    <p class="list-group-item-text">
                                       (None)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Province Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipality Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Barangay Name</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Signatory (Barangay Chairman)</h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipal Seal</h4></h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Barangay Seal</h4></h4>
                                    <p class="list-group-item-text">
                                       (Not Set)
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Contextual Classes With Linked Items -->

                        <!-- Colorful Panel Items With Icon -->


                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                                    
                                      
                                        <div class="panel btn-success">
                                            <div class="panel-heading" role="tab" id="headingThree_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false"
                                                       aria-controls="collapseThree_17">
                                                        <i class="material-icons">mode_edit</i>Update
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17">
                                                
            <!-- Input -->
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Barangay Information
                            <small>Barangay Information Fields</small>
                        </h2>
                    </div>
                    <div class="body">
                    <form id="form_validation" method="POST">
                        <div class="row clearfix margin-0">
                            <h3 class="card-inside-title">City or Municipality?</h3>
                            <div class="form-group">
                                <input name="group1" type="radio" id="radio_1" />
                                <label for="radio_1">City</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">Municipality</label>
                            </div>
                            <h3 class="card-inside-title">Independent or Component?</h3>
                            <div class="form-group">
                                <input name="group2" type="radio" id="radio_3" />
                                <label for="radio_3">Independent</label>
                                <input name="group2" type="radio" id="radio_4" />
                                <label for="radio_4">Component</label>
                            </div>

                            <h3 class="card-inside-title">Province Name</h3>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="province_name" required/>
                                    <label class="form-label">Province Name</label>
                                </div>
                            </div>
                            <h3 class="card-inside-title">City/Municipality Name</h3>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" required />
                                    <label class="form-label">City/Municipality Name</label>
                                </div>
                            </div>
                            <h3 class="card-inside-title">Barangay Name</h3>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" required/>
                                    <label class="form-label">Barangay Name</label>
                                </div>
                            </div>
                            <h3 class="card-inside-title">Signatory (Barangay Chairman)</h3>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" required/>
                                    <label class="form-label">Signatory (Barangay Chairman)</label>
                                </div>
                            </div>
                            <div class="col-sm-12 js-sweetalert" >
                                <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                <div class="header">
                                    <h3>
                                        City/Municipal Seal
                                    </h3>
                                </div>
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h4>Drop files here or click to upload.</h4>
                                            <em>City/Municipal Seal Image File</em>
                                        </div>
                                        <div class="fallback">
                                            <input name="file" type="file" multiple required/>
                                        </div>
                                    </form>
                                </div>
                                <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
                                <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                <div class="header">
                                    <h3>
                                        Barangay Seal
                                    </h3>
                                </div>
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h4>Drop files here or click to upload.</h4>
                                            <em>Barangay Seal Image File</em>
                                        </div>
                                        <div class="fallback">
                                            <input name="file" type="file" multiple required />
                                        </div>
                                    </form>
                                </div>
                                <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
                                <button type="button" class="btn btn-success waves-effect" data-type="confirm" type="submit">UPDATE</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- #END# Input -->

                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- #END# Colorful Panel Items With Icon -->
        
<?php include('footer.php'); ?>
           










        
