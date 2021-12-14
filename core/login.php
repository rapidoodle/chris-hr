<?php

//this page is never seen by user. Will process info from the index page and redirect to either 
// page 1
// page 2
// or back to the index page (with a flag so that index can issue warning about password being wrong)

session_start();

//connect to db
require_once 'database.php';
//check if form was sent 
if(!(isset($_POST['submit']) && $_POST['submit']==1) ) die('Please use <a href = "index.php">login page</a>');

$Email  = isset($_POST['email'])    ? $_POST['email'] : die("No email");
$pwd 	= isset($_POST['password']) ? $_POST['password'] : die("No password");


//check password. If match, log in (create session variables) else set session variables to false. 
$sqlPass = "SELECT Employees.Password, Employees.EmployeeID, Employees.Email, Employees.FirstName, Employees.LastName, Employees.UserTypeID FROM Employees WHERE Employees.Email='$Email' AND Employees.Password='".md5($pwd)."';";

$PassResult = sqlsrv_query($conn, $sqlPass);

if(!$PassResult) die('Problem with query: ' . $sqlPass);

$PassRow = sqlsrv_fetch_array($PassResult, SQLSRV_FETCH_NUMERIC);

if($PassRow != NULL){
	$_SESSION['EmployeeID'] = $PassRow[1];
	$_SESSION['Email'] 		= $Email;
	$_SESSION['UserType'] 	= $PassRow[5];
	$_SESSION['FirstName'] 	= $PassRow[3];
	$_SESSION['LastName'] 	= $PassRow[4];
	$_SESSION['Login'] 		= date("Y-m-d h:i:s a");


	// Redirect 
	header("Location: ../index.php"); 
	exit();
}else{

	// Redirect 
	header("Location: ../login.php?failed=1"); 
	exit();

}


?>