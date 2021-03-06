<?php
    session_start(); 
    $title = 'Welcome | BarangayIT MK.II'; 
    $currentPage = 'Level1ViewExpOrdinances';
    include('head.php');
    include('Level1Navbar.php'); 
?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDINANCES</h2>
</div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>
                        ORDINANCE LIST
                        <small>The list of all the ordinances of the barangay. Click "VIEW" to view all  or "Edit" to modify on the existing record</small>
                    </h2>
                    <br/>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="hide">Ordinance ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Persons Involved</th>
                                            <th>Description</th>
                                            <th>Sanction</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="hide">Ordinance ID</th>
                                            <th>Titles</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Persons Involved</th>
                                            <th>Description</th>
                                            <th>Sanction</th>
                                            <th>Date of Implementation</th>                                            
                                            <th>Status</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include_once('dbconn.php');

                                            $Level1OrdinanceSQL = 'SELECT   bitdb_r_ordinance.OrdinanceID,
                                                                            bitdb_r_ordinance.OrdinanceTitle,
                                                                            bitdb_r_ordinancecategory.OrdinanceTitle AS Category,
                                                                            bitdb_r_ordinance.Author,
                                                                            bitdb_r_ordinance.Persons_Involved,
                                                                            bitdb_r_ordinance.OrdDesc,
                                                                            bitdb_r_ordinance.DateImplemented,
                                                                            bitdb_r_ordinance.OrdStatus,
                                                                            bitdb_r_ordinance.Sanction
                                                                    FROM bitdb_r_ordinance
                                                                    INNER JOIN bitdb_r_ordinancecategory
                                                                    ON bitdb_r_ordinance.CategoryID = bitdb_r_ordinancecategory.OrdCategoryID';
                                            $Level1OrdinanceQuery = mysqli_query($bitMysqli,$Level1OrdinanceSQL) or die (mysqli_error($bitMysqli));
                                            if(mysqli_num_rows($Level1OrdinanceQuery) > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($Level1OrdinanceQuery))
                                                {
                                                    $OrdID = $row['OrdinanceID'];
                                                    $OrdTitle = $row['OrdinanceTitle'];
                                                    $Category = $row['Category'];
                                                    $Author = $row['Author'];
                                                    $PerInv = $row['Persons_Involved'];
                                                    $OrdDesc = $row['OrdDesc'];
                                                    $Date = $row['DateImplemented'];
                                                    $Sanction = $row['Sanction'];

                                                    if($row['OrdStatus'] == 1)
                                                    {
                                                        $OrdStatus = "Active";
                                                    }
                                                    else
                                                    {
                                                        $OrdStatus = "Inactive";
                                                    }

                                                    echo '  <tr>
                                                                <td class="hide">'.$OrdID.'</td>
                                                                <td>'.$OrdTitle.'</td>
                                                                <td>'.$Category.'</td>
                                                                <td>'.$Author.'</td>
                                                                <td>'.$PerInv.'</td>
                                                                <td>'.$OrdDesc.'</td>
                                                                <td>'.$Sanction.'</td>
                                                                <td>'.$Date.'</td>
                                                                <td>'.$OrdStatus.'</td>
                                                                
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
            <!-- Exportable Table --
            <div class="row clearfix">
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
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Description</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Authors</th>
                                            <th>Description</th>
                                            <th>Date of Implementation</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>                                        
                                        <tr>
                                            <td>Insert Title Here</td>
                                            <td>Insert Category Here</td>
                                            <td>Insert Authors Here</td>
                                            <td>Insert Description Here</td>
                                            <td>Insert Date here</td>
                                            <td>Status Not Set</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>


<?php include('footer.php'); ?>