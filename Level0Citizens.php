<?php
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $currentPage = 'Level0Citizens';
    $user = 0;
    include_once('LoginCheck.php');
    include('head.php');
    include('Level0_Navbar.php');
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Officials
                            <small>Click "Add New" to add an official or "Edit" to modify on the existing official </small>
                        </h2>
                        <br/>
                        <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#addCitizModal">
                            <i class="material-icons">add_circle_outline</i>
                            <span>ADD NEW</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th class="hide">P.O.B</th>
                                        <th class="hide">Birthdate</th>
                                        <th>Nationality</th>
                                        <th>Residence Status</th>
                                        <th class="hide">Civil Status</th>
                                        <th>Gender</th>
                                        <th class="hide">Zone(Sitio)</th>
                                        <th class="hide">House No.</th>
                                        <th class="hide">Street/Block</th>
                                        <th>Recorded</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                $AddOffCitizenSQL = "SELECT
                                                        bitdb_r_citizen.Salutation,
                                                        bitdb_r_citizen.First_Name,
                                                        IFNULL(bitdb_r_citizen.Middle_Name,'') AS Middle_Name,
                                                        bitdb_r_citizen.Last_Name,
                                                        IFNULL(bitdb_r_citizen.Name_Ext,'') AS Name_Ext,
                                                        bitdb_r_barangayposition.PosName,
                                                        IFNULL(bitdb_r_citizen.Birth_Place,'N/A') AS Birth_Place,
                                                        bitdb_r_citizen.Birthdate,
                                                        bitdb_r_citizen.Nationality,
                                                        bitdb_r_citizen.Res_Status,
                                                        bitdb_r_citizen.Civil_Status,
                                                        bitdb_r_citizen.Gender,
                                                        bitdb_r_barangayzone.Zone,
                                                        bitdb_r_citizen.Street,
                                                        bitdb_r_citizen.House_No,
                                                        bitdb_r_citizen.Date_Rec
                                                    FROM
                                                        bitdb_r_barangayofficial
                                                    INNER JOIN
                                                        bitdb_r_citizen
                                                        ON
                                                            bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                                                    LEFT JOIN
                                                        bitdb_r_barangayposition
                                                        ON
                                                            bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                                                    INNER JOIN bitdb_r_barangayzone
                                                    ON bitdb_r_citizen.Zone = bitdb_r_barangayzone.ZoneID
                                                    ";
                                $AddOffCitizenQuery = mysqli_query($bitMysqli,$AddOffCitizenSQL) or die(mysqli_error($bitMysqli));
                                    if (mysqli_num_rows($AddOffCitizenQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($AddOffCitizenQuery))
                                        {
                                            $Name = "".$row['Salutation']." ".$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']." ".$row['Name_Ext']."";
                                            $PosName = $row['PosName'];
                                            $Birth_Place = $row['Birth_Place'];
                                            $Birthdate = $row['Birthdate'];
                                            $Nationality = $row['Nationality'];
                                            $Civil_Status = $row['Civil_Status'];
                                            $Gender = $row['Gender'];
                                            $Zone = $row['Zone'];
                                            $Street = $row['Street'];
                                            $House_No = $row['House_No'];
                                            $Date_Rec = $row['Date_Rec'];

                                            if($row['Res_Status']==1)
                                            {
                                                $Res_Status = "Active";
                                            }
                                            else
                                            {
                                                $Res_Status = "Inactive";
                                            }

                                            echo
                                            '<tr>
                                                <td>'.$Name.'</td>
                                                <td>'.$PosName.'</td>
                                                <td class="hide">'.$Birth_Place.'</td>
                                                <td class="hide">'.$Birthdate.'</td>
                                                <td>'.$Nationality.'</td>
                                                <td>'.$Res_Status.'</td>
                                                <td class="hide">'.$Civil_Status.'</td>
                                                <td>'.$Gender.'</td>
                                                <td class="hide">'.$Zone.'</td>
                                                <td class="hide">'.$House_No.'</td>
                                                <td class="hide">'.$Street.'</td>
                                                <td>'.$Date_Rec.'</td>

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
        <form id="AdminAddOffCitizen" action="Level0_AddCitizenOfficial.php" method="POST">
            <div class="modal fade" id="addCitizModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" style="width: 85 % !important" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Add Citizens
                            <br/>
                            <div style="height: 0px; overflow: hidden;">
                                <input type="file" accept=".xls, .xlsx" name="fileInput" id="fileInput"/>
                            </div>
                            <script>
                                function chooseFile(){
                                    document.getElementById("fileInput").click();
                                }
                            </script>
                            <button type="button" class="btn btn-success waves-effect" onclick="chooseFile()"> Migrate from Excel</button>
                            <h6 class="pull-right">* = Optional Fields</h6>
                        </h2>
                    </div>
                    <div class="modal-body">
                           <div class="modal-body">
                            <div class="row clearfix margin-0">
                            <div class="panel col-lg-12">
                                <div class="col-md-2">
                                    <h5 class="card-inside-title">Salutation</h5>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Salutation" class="form-control" />
                                            <label class="form-label">Mr./Ms.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="card-inside-title">First Name</h5>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="First_Name" class="form-control" />
                                            <label class="form-label">First Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                <h5 class="card-inside-title">Middle Name*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Middle_Name" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h5 class="card-inside-title">Last Name</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Last_Name" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-2">
                                <h5 class="card-inside-title">Name Suffix*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Name_Ext" class="form-control" />
                                        <label class="form-label">Jr./Sr./III</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Email Address*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Email" class="form-control" />
                                        <label class="form-label">example@example.com</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h5 class="card-inside-title">Height (ft)</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Height" class="form-control" />
                                        <label class="form-label">ft</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <h5 class="card-inside-title">Weight (kg)</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Weight" class="form-control" />
                                        <label class="form-label">kg</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Place of Birth</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birth_Place" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Birthdate</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" name="Birthdate" class="form-control date" />
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">Nationality</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Nationality" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">Occupation*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Occupation" class="form-control" />
                                        <label class="form-label">Occupation</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">Gender</h5>
                                <div class="form-group">
                                    <input type="radio" name="Gender" id="optGendM" value="M" class="with-gap">
                                    <label for="optGendM">Male</label>

                                    <input type="radio" name="Gender" id="optGendF" value="F" class="with-gap">
                                    <label for="optGendF" class="m-l-20">Female</label>       
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Civil Status</h5>
                                <select class="form-control show-tick" name="Civil_Status" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                                </div>
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Blood Type</h5>
                                <select class="form-control show-tick" name="Blood_Type" required>
                                    <option value="">Select Blood Type</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O-">O-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">House Number</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="House_No" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">Street/Block</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Street" class="form-control" />
                                        <label class="form-label">Street/Block</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <h5 class="card-inside-title">Zone(Block)</h5>
                                <select class="form-control show-tick" name="Zone">
                                    <?php
                                    include_once('dbconn.php');
                                    $ZoneSQL = "SELECT * FROM bitdb_r_barangayzone";
                                    $ZoneQuery = mysqli_query($bitMysqli,$ZoneSQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($ZoneQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($ZoneQuery))
                                        {
                                            echo '<option value="'.$row['ZoneID'].'">'.$row['Zone'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Person to contact in case of emergencies*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Person_Con" class="form-control" />
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h5 class="card-inside-title">Contact*</h5>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Contact" class="form-control" />
                                        <label class="form-label">Contact</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="col-sm-3">
                                    <h4 class="form-label">Official Details</h4>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label">Barangay Position</label>
                                    <select class="form-control show-tick" name="Position">
                                        <?php
                                        include_once('dbconn.php');
                                        $PostionSQL = "SELECT * FROM bitdb_r_barangayposition";
                                        $PositionQuery = mysqli_query($bitMysqli,$PostionSQL) or die(mysqli_error($bitMysqli));
                                        if(mysqli_num_rows($PositionQuery) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($PositionQuery))
                                            {
                                                echo '<option value="'.$row['PosID'].'">'.$row['PosName'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label">Start Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control date" name="Start_Term">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label">End Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control date" name="End_Term">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- <h5 class="card-inside-title">Status</h5>
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>Inactive
                                            <input id="CitiResStat" type="checkbox" checked>
                                            <span class="lever switch-col-orange"></span>Active
                                        </label>
                                    </div>
                                </div> -->
                        </div>
                        <br/>
                    </div> <br/>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </form>
        <!-- <form id="AdminAddOffCitizen" action="Level0_AddCitizenOfficial.php" method="POST">
            <div class="modal fade" id="addCitizModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>
                                Add
                                <br/>
                                <small>Add Citizen Fields</small>
                            </h2>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix margin-0">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Salutation" class="form-control" />
                                        <label class="form-label">Salutation (Mr./Ms./Mrs.)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="First_Name" class="form-control" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Middle_Name" class="form-control" />
                                        <label class="form-label">Middle Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Last_Name" class="form-control" />
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Name_Ext" class="form-control" />
                                        <label class="form-label">Extension Name (Optional) Jr./Sr./III</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Email" class="form-control" />
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Height" class="form-control" />
                                        <label class="form-label">Height (ft)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Weight" class="form-control" />
                                        <label class="form-label">Weight (kg)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Birth_Place" class="form-control" />
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                <label class="form-label">Birthdate</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" class="form-control date" name="Birthdate" placeholder="Ex: 30/07/2016"/>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Nationality" class="form-control" />
                                        <label class="form-label">Nationality</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Occupation" class="form-control" />
                                        <label class="form-label">Occupation (Optional)</label>
                                    </div>
                                </div>
                                <label class="form-label">Gender</label>
                                <div class="form-group">
                                    <input type="radio" name="Gender" id="optMale" value="Male" class="with-gap">
                                    <label for="optMale">Male</label>
                                    <input type="radio" name="Gender" id="optFemale" value="Female" class="with-gap">
                                    <label for="optFemale" class="m-l-20">Female</label>
                                </div>
                                <label class="form-label">Civil Status</label>
                                <select class="form-control show-tick" name="Civil_Status" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                                <br/>
                                <br/>
                                <label class="form-label">Blood Type</label>
                                <select class="form-control show-tick" name="Blood_Type" required>
                                    <option value="">Select Blood Type</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O-">O-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <br/>
                                <br/><br/>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="House_No" class="form-control" />
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="Street" class="form-control" />
                                        <label class="form-label">Street/Block</label>
                                    </div>
                                </div>
                                <label class="form-label">Zone(Block)</label>
                                <select class="form-control show-tick" name="Zone">
                                    <?php
                                    include_once('dbconn.php');
                                    $ZoneSQL = "SELECT * FROM bitdb_r_barangayzone";
                                    $ZoneQuery = mysqli_query($bitMysqli,$ZoneSQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($ZoneQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($ZoneQuery))
                                        {
                                            echo '<option value="'.$row['ZoneID'].'">'.$row['Zone'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <br/><br/>
                                <label class="form-label">Barangay Position</label>
                                <select class="form-control show-tick" name="Position">
                                    <?php
                                    include_once('dbconn.php');
                                    $PostionSQL = "SELECT * FROM bitdb_r_barangayposition";
                                    $PositionQuery = mysqli_query($bitMysqli,$PostionSQL) or die(mysqli_error($bitMysqli));
                                    if(mysqli_num_rows($PositionQuery) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($PositionQuery))
                                        {
                                            echo '<option value="'.$row['PosID'].'">'.$row['PosName'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <br/><br/>
                                <div class="col-sm-4">
                                    <label class="form-label">Start Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control date" name="Start_Term" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">End Term</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control date" name="End_Term" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br/>
                        </div> <br/>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">ADD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> -->
        <!--ModalEdit-->
        <div class="modal fade" id="editCitizModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>
                            Edit
                            <br/>
                            <small>Modify Position Fields</small>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix margin-0">
                            <h5 class="card-inside-title">Salutation</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Mr./Ms./Mrs.</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">First Name</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">First Name</label>
                                </div>
                            </div>

                            <h5 class="card-inside-title">Middle Name</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Middle Name</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Last Name</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Extension Name (Optional)</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Jr./Sr./III</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Height (ft)</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">ft</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Weight (kg)</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">kg</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Place of Birth</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Place of Birth</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Birthdate</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control date" />
                                    <label class="form-label">mm/dd/yyyy</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Gender</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Gender</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Blood Type</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">O/A/B</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">House Number</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">House Number</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Street/Block</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Street/Block</label>
                                </div>
                            </div>
                            <h5 class="card-inside-title">Zone(Block)</h5>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" />
                                    <label class="form-label">Zone(Block)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 class="card-inside-title">Barangay Position</h5>
                                <select class="form-control show-tick">
                                            <option>None</option>
                                            <option>Captain</option>
                                            <option>Treasurer</option>
                                            <option>Secretary</option>
                                        </select>
                            </div>
                            <h5 class="card-inside-title">Residence Status</h5>
                            <div class="form-group">
                                <input type="radio" name="recStatRadio" id="optCitActive" value="Active" class="with-gap">
                                <label for="optCitActive">Active</label>

                                <input type="radio" name="recStatRadio" id="optCitInactive" value="Inactive" class="with-gap">
                                <label for="optCitInactive" class="m-l-20">Inactive</label>
                            </div>
                        </div>
                        <br/>
                    </div> <br/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect">EDIT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        <!--EndModal-->
    </div>
    <?php include('footer.php'); ?>
