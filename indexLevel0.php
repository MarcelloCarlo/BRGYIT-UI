<?php 
session_start();
$title = 'Welcome | BarangayIT MK.II';
$currentPage = 'indexLevel0';
$user = 0;
include_once('LoginCheck.php');
include_once('Level0_Config.php');
include('head.php');
include('Level0_Navbar.php');

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <!--CUSTOM BLOCK INSERT HERE-->

        <!-- Contextual Classes With Linked Items -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                                <h4 class="list-group-item-heading">Barangay Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $BarangayName;?>
                                </p>
                            </a>    
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipality Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $Municipality;?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Province Name</h4>
                                <p class="list-group-item-text">
                                    <?php echo $ProvinceName;?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">City/Municipality</h4>
                                <p class="list-group-item-text">
                                    <?php echo $CityType;?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Independent/Component</h4>
                                <p class="list-group-item-text">
                                    <?php echo $BarangayType;?>
                                </p>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item">
                                <h4 class="list-group-item-heading">Signatory (Barangay Chairman)</h4>
                                <p class="list-group-item-text">
                                    <?php echo $FullName;?>
                                </p>
                            </a>
                            <?php 
                                echo '
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">City/Municipal Seal</h4>
                                    <img src="images/'.$MunicipalSeal.'" alt="" class="circle z-depth-2 responsive-img activator" style="width:100px; height:auto;">
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">Barangay Seal</h4>
                                    <img src="images/'.$BarangaySeal.'" alt="" class="circle z-depth-2 responsive-img activator" style="width:100px; height:auto;">
                                    
                                </a>';
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Colorful Panel Items With Icon -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">


                        <div class="panel btn-success">
                            <div class="panel-heading" role="tab" id="headingThree_17">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="true" aria-controls="collapseThree_17">
                                                        <i class="material-icons">mode_edit</i>Update
                                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree_17">

                                <!-- Basic Validation -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>Update Barangay Information<small>Fill out required fields and click "UPDATE" button to update the Barangay Information.</small></h2>
                                            </div>
                                            <div class="body js-sweetalert">
                                                <form id="form_validation" action="Level0_UpdateConfig.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="BarangayName" required>
                                                            <label class="form-label">Barangay Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="MunicipalName" required>
                                                            <label class="form-label">City/Municipal Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="ProvinceName" required>
                                                            <label class="form-label">Province Name</label>
                                                        </div>
                                                    </div>
                                                    <label class="form-label">City or Municipality?</label>
                                                    <div class="form-group">
                                                        <input type="radio" name="morcRadio" id="optCity" value="City" class="with-gap">
                                                        <label for="optCity">City</label>

                                                        <input type="radio" name="morcRadio" id="optMunicipal" value="Municipality" class="with-gap">
                                                        <label for="optMunicipal" class="m-l-20">Municipality</label>
                                                    </div>
                                                    <label class="form-label">Independent or Component?</label>
                                                    <div class="form-group">
                                                        <input type="radio" name="iorcRadio" id="optIndependent" value="Independent" class="with-gap">
                                                        <label for="optIndependent">Independent</label>

                                                        <input type="radio" name="iorcRadio" id="optComponent" value="Component" class="with-gap">
                                                        <label for="optComponent" class="m-l-20">Component</label>
                                                    </div>
                                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                                    <label class="form-label">
                                                        Barangay Seal
                                                    </label>
                                                    <div class="dz-message form-group form-float">

                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <em>Barangay Seal Image File</em>
                                                        <div class="fallback">
                                                            <input name="BarangaySeal" type="file" multiple required />
                                                        </div>
                                                    </div>


                                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

                                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                                    <label class="form-label">
                                                        Municipal Seal
                                                    </label>
                                                    <div class="dz-message form-group form-float">

                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <em>Municipal Seal Image File</em>
                                                        <div class="fallback">
                                                            <input name="MunicipalSeal" type="file" multiple required />
                                                        </div>
                                                    </div>

                                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

                                                    <button class="btn btn-success waves-effect" data-type="confirm" type="submit">UPDATE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Basic Validation -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <!-- #END# Colorful Panel Items With Icon -->
        </div>
        <!-- #END# Contextual Classes With Linked Items -->

<?php include('footer.php'); ?>
