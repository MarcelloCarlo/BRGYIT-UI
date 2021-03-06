<?php 
    session_start();
    $title = 'Welcome | BarangayIT MK.II';
    $user = 2;
    include_once('LoginCheck.php');
    $currentPage = 'Level2Business';
    include('head.php');
    include('Level2_Navbar.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>BUSINESSES</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BUSINESSES LIST
                            <small>The list of all the businesses in the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                        </h2>
                        <br/>

                        <!--    <button type="button" class="btn bg-indigo waves-effect" href="Level1ViewEditBusinesses.php"> 
                            <a href="Level1ViewEditBusinesses.php" style= "text-decoration: none;"> 
                            <i class="material-icons">add_circle_outline</i>
                            <span>Add/Edit</span></a>
                        </button> -->
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                 <thead>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th class="hide">LocationID</th>
                                            <th>Location</th>
                                            <th>Owner</th>
                                            <th>Owner Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">BusinessID</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th class="hide">LocationID</th>
                                            <th>Location</th>
                                            <th>Owner</th>
                                            <th>Owner Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                             <tbody>
                              <?php
                                                include('dbconn.php');

                                                $Level1BusinessSQL = 'SELECT    bitdb_r_business.BusinessID,
                                                                                bitdb_r_business.Business_Name,
                                                                                bitdb_r_businesscategory.categoryName,
                                                                                bitdb_r_business.BusinessLoc,
                                                                                bitdb_r_barangayzone.Zone,
                                                                                bitdb_r_business.Manager,
                                                                                bitdb_r_business.Mgr_Address,
                                                                                bitdb_r_issuance.IssuanceID,
                                                                                DATE_ADD(bitdb_r_issuance.IssuanceDate, INTERVAL 1 HOUR) AS ExpireDate,
                                                                                (CURRENT_DATE) AS CurrentDate
                                                                        FROM    bitdb_r_issuance
                                                                        RIGHT JOIN bitdb_r_business
                                                                        ON bitdb_r_issuance.BusinessID = bitdb_r_business.BusinessID
                                                                        INNER JOIN bitdb_r_businesscategory
                                                                        ON bitdb_r_business.BusinessCategory = bitdb_r_businesscategory.categoryID
                                                                        INNER JOIN bitdb_r_barangayzone
                                                                        ON bitdb_r_business.BusinessLoc = bitdb_r_barangayzone.ZoneID';
                                                $Level1BusinessQuery = mysqli_query($bitMysqli,$Level1BusinessSQL) or die (mysqli_error($bitMysqli));
                                                if(mysqli_num_rows($Level1BusinessQuery) > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($Level1BusinessQuery))
                                                    {
                                                        $BusinessID = $row['BusinessID'];
                                                        $Business_Name = $row['Business_Name'];
                                                        $BusinessCat = $row['categoryName'];
                                                        $BusinessLoc = $row['BusinessLoc'];
                                                        $Zone = $row['Zone'];
                                                        $Manager = $row['Manager'];
                                                        $ManagerAdd = $row['Mgr_Address'];
                                                        $Date_Issued = $row['ExpireDate'];
                                                        $Date = $row['CurrentDate'];
                                                        
                                                        if(strtotime($Date_Issued) > strtotime($Date))
                                                        {
                                                            $BusinessStatus = "Active";
                                                        }
                                                        else
                                                        {
                                                            $BusinessStatus = "Inactive";
                                                        }

                                                        echo '  
                                                        <tr>    
                                                                <td class="hide">'.$BusinessID.'</td>
                                                                <td>'.$Business_Name.'</td>
                                                                <td>'.$BusinessCat.'</td>
                                                                <td class="hide">'.$BusinessLoc.'</td>
                                                                <td>'.$Zone.'</td>
                                                                <td>'.$Manager.'</td>
                                                                <td>'.$ManagerAdd.'</td>
                                                                <td>'.$BusinessStatus.'</td>
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
    <!-- Exportable Table -->
    <!-- <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EXPORT TABLE
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                           <thead>
                            <tr>
                                <th>Business Name</th>
                                <th>Location</th>
                                <th>Manager</th>
                                <th>Man. Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                             <th>Business Name</th>
                             <th>Location</th>
                             <th>Manager</th>
                             <th>Man. Address</th>
                             <th>Status</th>
                         </tr>
                     </tfoot>
                     <tbody>
                        <tr>
                            <td>Siomai Stall</td>
                            <td>Sitio Huhhu,  SJDC</td>
                            <td>Edinburgh</td>
                            <td>61St. asaehere</td>
                            <td>Active</td>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- #END# Exportable Table -->
</div>
</section>


<?php include('footer.php'); ?>