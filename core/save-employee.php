<?php
include("database.php");
include("functions.php");

//saving new or update employee records

if(isset($_POST['submit'])){
	$response = [];
	//insert new employee if new, else update employee record
	if($_POST['submit'] == 'new'){
		$fields = [];
		$values = [];
		foreach ($_POST as $key => $value) {
			if($key != "submit"){
				$fields[] = $key;
				$values[] = is_numeric($value) ? $value : "'".$value."'";
			}
		}

		//insert new employee
		$sql = "INSERT INTO dbo.Employees (".implode(",", $fields).") VALUES(".implode(",", $values)."); SELECT SCOPE_IDENTITY() AS ID";
		$res = sqlsrv_query($conn, $sql);

		if(!$res) die('Problem with query: ' . $sql);

		$lastID = getLastID($res);

		//create records for other employee details 
		//educational details
		$levels = getEducationalDetailsLevel($conn);
		while($row = sqlsrv_fetch_array($levels, SQLSRV_FETCH_ASSOC) ){

			$sql2 = "INSERT INTO EmployeeEducationalDetails (EducationalDetailsLevelID, EmployeeID) VALUES(".$row['EducationalDetailsLevelID'].", ".$lastID.")";
			$res2  = sqlsrv_query($conn, $sql2);

			if(!$res2) die('Problem with query: ' . $sql2);

		}

		//employment history
		$sql3 = "INSERT INTO EmployeeEmploymentHistory (EmployeeID) VALUES(".$lastID."), (".$lastID."), (".$lastID."), (".$lastID."), (".$lastID.")";
		$res3  = sqlsrv_query($conn, $sql3);

		if(!$res3) die('Problem with query: ' . $sql3);

		// national services
		$sql4 = "INSERT INTO EmployeeNationalServices (EmployeeID) VALUES(".$lastID.")";
		$res4  = sqlsrv_query($conn, $sql4);

		if(!$res4) die('Problem with query: ' . $sql4);

		// references
		$sql5 = "INSERT INTO EmployeeReferences (EmployeeID) VALUES(".$lastID."), (".$lastID."), (".$lastID.")";
		$res5  = sqlsrv_query($conn, $sql5);

		if(!$res5) die('Problem with query: ' . $sql5);


		//get the last inserted id and redirect to employee details page
		 header("location: ../employee-details.php?id=".$lastID);

	}else if($_POST['submit'] == 'update'){

		if($_POST['table'] == 'Employees' || $_POST['table'] == 'EmployeeNationalServices'){
			$eID    = isset($_POST['eID']) ? $_POST['eID'] : die('No employee id to update');
			$fields = "";

			//get all form object
			foreach($_POST as $key => $value){
				if($key != 'table' && $key != 'submit' && $key != 'eID'){
					$value = is_numeric($value) ? $value : "'".$value."'";
					$fields .= $key.'='.$value.', ';
				}
			}

			//update employees table
			$sql = "UPDATE ".$_POST['table']." SET ".rtrim($fields,', ')." WHERE EmployeeID = ".$eID;
			$res = sqlsrv_query($conn, $sql);

			if(!$res) die('Problem with query: ' . $sql);

		}else if($_POST['table'] == 'EmployeeEducationalDetails'){

			for($x = 0; $x < count($_POST['EmployeeEducationalDetailsID']); $x++){
				$name 	 = isset($_POST['SchoolName'][$x]) ? "SchoolName = '".$_POST['SchoolName'][$x]."', " : "";
				$address = isset($_POST['SchoolAddress'][$x]) ? "SchoolAddress = '".$_POST['SchoolAddress'][$x]."', " : "";
				$from 	 = isset($_POST['AttendedFrom'][$x]) ? "AttendedFrom = '".$_POST['AttendedFrom'][$x]."', " : "";
				$to 	 = isset($_POST['AttendedTo'][$x]) ? "AttendedTo = '".$_POST['AttendedTo'][$x]."', " : "";
				$to 	 = isset($_POST['IsGraduated_'.$x]) ? "IsGraduated = '".$_POST['IsGraduated_'.$x]."', " : "";
				$details = isset($_POST['SchoolDetails'][$x]) ? "SchoolDetails = '".$_POST['SchoolDetails'][$x]."', " : "";

				$fields = $name.$address.$from.$to.$details;


				//update educational details table;
				$sql = "UPDATE EmployeeEducationalDetails SET ".rtrim($fields, ', ')." WHERE EmployeeID = ".$_POST['EmployeeID'][$x]." AND EmployeeEducationalDetailsID = ".$_POST['EmployeeEducationalDetailsID'][$x];
				$res = sqlsrv_query($conn, $sql);

				if(!$res) die('Problem with query: ' . $sql);

			}
		}else if($_POST['table'] == 'EmployeeEmploymentHistory'){

			for($x = 0; $x < count($_POST['EmployeeEmploymentHistoryID']); $x++){
				$name 	  = isset($_POST['EmployerName'][$x]) ? "EmployerName = '".$_POST['EmployerName'][$x]."', " : "";
				$address  = isset($_POST['EmployerAddress'][$x]) ? "EmployerAddress = '".$_POST['EmployerAddress'][$x]."', " : "";
				$position = isset($_POST['Position'][$x]) ? "Position = '".$_POST['Position'][$x]."', " : "";
				$from 	  = isset($_POST['EmploymentFrom'][$x]) ? "EmploymentFrom = '".$_POST['EmploymentFrom'][$x]."', " : "";
				$to 	  = isset($_POST['EmploymentTo']) ? "EmploymentTo = '".$_POST['EmploymentTo'][$x]."', " : "";
				$salary   = isset($_POST['Salary'][$x]) ? "Salary = '".$_POST['Salary'][$x]."', " : "";
				$reason   = isset($_POST['ReasonForLeaving'][$x]) ? "ReasonForLeaving = '".$_POST['ReasonForLeaving'][$x]."', " : "";

				$fields = $name.$address.$position.$from.$to.$salary.$reason;


				//update educational details table;
				$sql = "UPDATE EmployeeEmploymentHistory SET ".rtrim($fields, ', ')." WHERE EmployeeID = ".$_POST['eID']." AND EmployeeEmploymentHistoryID = ".$_POST['EmployeeEmploymentHistoryID'][$x];
				$res = sqlsrv_query($conn, $sql);

				if(!$res) die('Problem with query: ' . $sql);

			}
		}else if($_POST['table'] == 'EmployeeReferences'){

			for($x = 0; $x < count($_POST['EmployeeReferencesID']); $x++){
				$name 	  = isset($_POST['ReferenceName'][$x]) ? "ReferenceName = '".$_POST['ReferenceName'][$x]."', " : "";
				$address  = isset($_POST['ReferenceAddress'][$x]) ? "ReferenceAddress = '".$_POST['ReferenceAddress'][$x]."', " : "";
				$occ = isset($_POST['Occupation'][$x]) ? "Occupation = '".$_POST['Occupation'][$x]."', " : "";
				$years 	  = isset($_POST['YearsKnown'][$x]) ? "YearsKnown = '".$_POST['YearsKnown'][$x]."', " : "";

				$fields = $name.$address.$occ.$years;

				//update educational details table;
				$sql = "UPDATE EmployeeReferences SET ".rtrim($fields, ', ')." WHERE EmployeeID = ".$_POST['eID']." AND EmployeeReferencesID = ".$_POST['EmployeeReferencesID'][$x];
				$res = sqlsrv_query($conn, $sql);

				if(!$res) die('Problem with query: ' . $sql);

			}
		}


		$response['status'] = 200; 
		echo json_encode($response);

	}else{
		die('Unknown request');
	}

}else{
	die('Invalid access');
}
?>