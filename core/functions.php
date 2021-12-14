<?php

//this page is for all the db queries

//get all employees list
function getEmployees($conn){
	$sql 	= "SELECT * FROM dbo.[EmployeesList]";
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return $res;
}

function getStatuses($conn){
	$sql = "SELECT * FROM dbo.EmployeeStatuses";
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}

	return $res;
}

function getLastID($queryID) {
     sqlsrv_next_result($queryID);
     sqlsrv_fetch($queryID);

     return sqlsrv_get_field($queryID, 0);
}

function getEmployeeDetails($conn, $id){
	$sql = "SELECT *, EmployeeStatusName FROM Employees INNER JOIN EmployeeStatuses ON Employees.EmployeeStatusID = Employees.EmployeeStatusID WHERE EmployeeID = ".$id;
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return sqlsrv_fetch_array($res, 2);
}

function getEducationalDetailsLevel($conn){
	$sql = "SELECT * FROM EducationalDetailsLevel";
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return $res;

}

function getEmployeeEducationalDetails($conn, $id){
	$sql = "SELECT *, LevelName FROM EmployeeEducationalDetails INNER JOIN EducationalDetailsLevel ON EmployeeEducationalDetails.EducationalDetailsLevelID = EducationalDetailsLevel.EducationalDetailsLevelID WHERE EmployeeID = ".$id;
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return $res;

}

function getEmployeeNationalServices($conn, $id){
	$sql = "SELECT * FROM EmployeeNationalServices WHERE EmployeeID = ".$id;
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return sqlsrv_fetch_array($res, 2);

}

function getEmployeeEmploymentHistory($conn, $id){
	$sql = "SELECT * FROM EmployeeEmploymentHistory WHERE EmployeeID = ".$id;
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return $res;

}

function getEmployeeReferences($conn, $id){
	$sql = "SELECT * FROM EmployeeReferences WHERE EmployeeID = ".$id;
	$res = sqlsrv_query($conn, $sql);

	if( $res === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}
	
	return $res;

}
?>