<?php
session_start();
	include_once('dbconn.php');

	$CitizenID = $_POST['CitizenID'];
	$Position = $_POST['Position'];
	$StartTerm = $_POST['Start_Term'];
	$EndTerm = $_POST['End_Term'];

	if($Position == "Citizen")
	{
		$header = 'Location:Level0OfficialFromCitizens.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
		header($header);
	}
	else
	{
		$PositionSelectSQL = 'SELECT 
									bitdb_r_barangayposition.PosID,
									bitdb_r_barangayposition.PosName 
							FROM 	bitdb_r_barangayposition 
							WHERE 	bitdb_r_barangayposition.PosID = "'.$Position.'"';
		$PositionSelectQuery = mysqli_query($bitMysqli,$PositionSelectSQL) or die (mysqli_error($bitMysqli));
		
		if(mysqli_num_rows($PositionSelectQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($PositionSelectQuery))
			{
				$PosID = $row['PosID'];
				$PosName = $row['PosName'];

				if($_POST['OfficialID'] != "")
				{
					$OfficialID = $_POST['OfficialID'];
					
					$UpdateOfficialSQL = 'UPDATE bitdb_r_barangayofficial 
											SET 	PosID='.$PosID.',
													StartTerm="'.$StartTerm.'",
													EndTerm="'.$EndTerm.'",
													Official_Status = 1
											WHERE 	Brgy_Official_ID='.$OfficialID.'';
					$UpdateOfficialQuery = mysqli_query($bitMysqli,$UpdateOfficialSQL) or die (mysqli_error($bitMysqli));
					$header = 'Location:Level0OfficialFromCitizens.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
					header($header);
				}
				else
				{
					$InsertOfficialSQL = 'INSERT INTO bitdb_r_barangayofficial
												(CitizenID,PosID,StartTerm,EndTerm,ActUser) 
										VALUES ('.$CitizenID.','.$PosID.',"'.$StartTerm.'","'.$EndTerm.'",0)';
					$InsertOfficialQuery = mysqli_query($bitMysqli,$InsertOfficialSQL) or die (mysqli_error($bitMysqli));
					$header = 'Location:Level0OfficialFromCitizens.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
					header($header);
				}
			}
		}
		else
		{
		if(isset($_POST['OfficialID']))
			{
				$OfficialID = $_POST['OfficialID'];

				$UpdateOfficialSQL = 'UPDATE bitdb_r_barangayofficial SET PosID='.$PosID.',StartTerm="'.$StartTerm.'",EndTerm="'.$EndTerm.'", ActUser=0, Official_Status = 1 WHERE Brgy_Official_ID='.$OfficialID.' ';
				$UpdateOfficialQuery = mysqli_query($bitMysqli,$UpdateOfficialSQL) or die (mysqli_error($bitMysqli));
				$header = 'Location:Level0OfficialFromCitizens.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
				header($header);
			}
			else
			{
				$InsertOfficialSQL = 'INSERT INTO bitdb_r_barangayofficial(CitizenID,PosID,StartTerm,EndTerm,ActUser) VALUES ('.$CitizenID.','.$PosID.',"'.$StartTerm.'","'.$EndTerm.'",0)';
				$InsertOfficialQuery = mysqli_query($bitMysqli,$InsertOfficialSQL) or die (mysqli_error($bitMysqli));
				$header = 'Location:Level0OfficialFromCitizens.php?id='.$_SESSION['Logged_In'].'&pos='.$_SESSION['AccountUserType'].'';
				header($header);
			}
		}
	}
	
	

	
?>