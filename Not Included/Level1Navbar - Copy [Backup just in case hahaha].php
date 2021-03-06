<body class="theme-orange">
    <!-- Page Loader -->
    <div class="page-loader-wrapper"> 
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-orange">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay">
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
 <!--REMOVED Search    <div class="search-bar">
       <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Search...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>-->
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">BarangayIT v2</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true">  
                    <!--  <i class="material-icons">search</i> --> </a></li> 
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <!--<span class="label-count">7</span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>

                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>


    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/femaleuser.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <?php
                        include('dbconn.php');
                        $ID = $_SESSION['Logged_In'];


                        $UserInfoSQL = 'SELECT bitdb_r_citizen.Salutation,
                                                bitdb_r_citizen.First_Name,
                                                IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                                bitdb_r_citizen.Last_Name,
                                                IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                                bitdb_r_barangayposition.PosName
                                        FROM bitdb_r_barangayofficial
                                        INNER JOIN bitdb_r_citizen
                                        ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                                        INNER JOIN bitdb_r_barangayposition
                                        ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                                        WHERE bitdb_r_barangayofficial.Brgy_Official_ID = '.$ID.'';
                        $UserInfoSQLQuery = mysqli_query($bitMysqli,$UserInfoSQL) or die (mysqli_error($bitMysqli));
                        if(mysqli_num_rows($UserInfoSQLQuery) > 0)
                        {
                            while($row = mysqli_fetch_assoc($UserInfoSQLQuery))
                            {
                                $WName = ''.$row['Salutation'].' '.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].'';
                                $Pos = $row['PosName'];
                                echo '<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$WName.'</div>
                                        <div class="email">'.$Pos.'</div>';
                            }
                        }
                    ?>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="SignOutSession.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if ($currentPage==='indexLevel1' ) {echo 'class="active"';} ?>>
                            <a href="indexLevel1.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    <li <?php if ($currentPage==='Level1ViewExpCitizen' | $currentPage==='Level1AddEditCitizen') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Citizens</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php if ($currentPage==='Level1ViewExpCitizen') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpCitizen.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">View/Export</a>
                            </li>
                            <li  <?php if ($currentPage==='Level1AddEditCitizen') {echo 'class="active"';} ?>>
                                 <a href="Level1AddEditCitizen.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">Add/Edit</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($currentPage==='Level1ViewExpBusinesses' | $currentPage==='Level1AddEditBusinesses') {echo 'class="active"';} ?>>
                         <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">business</i>
                            <span>Businesses</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($currentPage==='Level1ViewExpBusinesses') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpBusinesses.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">View/Export</a>
                            </li>
                            <li <?php if ($currentPage==='Level1AddEditBusinesses') {echo 'class="active"';} ?>>
                                <a href="Level1AddEditBusinesses.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">Add/Edit</a>
                            </li>
                        </ul>
                       <!-- <a href="businesses.html">
                            <i class="material-icons">business</i>
                            <span>Businesses</span>
                        </a>-->

                    </li>

                    <li <?php if ($currentPage==='Level1Issuance') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">featured_play_list</i>
                            <span>Issuance</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($currentPage==='Level1Issuance') {echo 'class="active"';} ?>>
                                <a href="Level1Issuance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">Issuance</a>                          
                            </li>
                        </ul>
                    </li>

                    <li <?php if ($currentPage==='Level1ViewExpBlotter' | $currentPage==='Level1AddEditBlotter') {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">report_problem</i>
                            <span>Blotter</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($currentPage==='Level1ViewExpBlotter') {echo 'class="active"';}?>>
                                <a href="Level1ViewExpBlotter.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">View Blotter</a>
                            </li>
                            <li <?php if($currentPage==='Level1AddEditBlotter') {echo 'class="active"';}?>>
                                <a href="Level1AddEditBlotter.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">Add/Edit</a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if ($currentPage==='Level1AddEditPatawag'){echo 'class="active"';} ?>>
                       <a href="Level1AddEditPatawag.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">gavel</i>
                            <span>Patawag</span></a>
                    </li>
                       <!-- </a>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">gavel</i>
                            <span>Patawag</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/maps/google.html">Google Map</a>
                            </li>
                            <li>
                                <a href="pages/maps/yandex.html">YandexMap</a>
                            </li>
                            <li>
                                <a href="pages/maps/jvectormap.html">jVectorMap</a>
                            </li>
                        </ul> -->
                    

                    <li <?php if ($currentPage==='Level1ViewExpOrdinances' | $currentPage==='Level1AddEditOrdinance')
                    {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ordinances</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php if ($currentPage==='Level1ViewExpOrdinances') {echo 'class="active"';} ?>>
                                <a href="Level1ViewExpOrdinances.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">View/Export</a>
                            </li>
                            <li  <?php if ($currentPage==='Level1AddEditOrdinance') {echo 'class="active"';} ?>>
                                 <a href="Level1AddEditOrdinance.php?<?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">Add/Edit</a>
                            </li>
                        </ul>
                        <!--<a href="ordinances.html">
                            <i class="material-icons">assignment</i>
                            <span>Ordinances</span>
                        </a>-->
                    </li>

                    <li <?php if ($currentPage==='Level1ProjectMonitoring' | $currentPage==='Level1ViewExpProjects' ) {echo 'class="active"';}?>>
                            <a href="Level1ViewExpProjects.php? <?php echo "id=".$_SESSION['Logged_In']."&pos=".$_SESSION['AccountUserType']."";?>">
                            <i class="material-icons">assessment</i>
                            <span>Project Monitoring</span>
                        </a>
                    </li>
                                       
                                          
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>