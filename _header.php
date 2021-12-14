<?php
session_start();

// make sure a user is logged in
if (!isset($_SESSION['EmployeeID'])){
	header("Location: login.php"); 
	exit();
}

include("core/database.php");
include("core/functions.php");
include("core/helpers.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>The Asian Banker</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/incipit.css" rel="stylesheet">
        <link href="css/fontawesome/css/all.css" rel="stylesheet"/>
        <link href="css/font.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/datatables.css">

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                	<a href="/"><img src="img/logo_sm.png" width="80"></a>
                </div>
                <div class="list-group list-group-flush" id="sidebar">
                    <a class="list-group-item list-group-item-action list-group-item-light p-4" href="index.php"><i class="fas fa-users"></i> Employees</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-4" href="jobs.php"><i class="fas fa-suitcase"></i> Jobs</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-4" href="reviews.php"><i class="fas fa-star"></i> Reviews</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-4" href="job-requirements.php"><i class="fas fa-book"></i> Job Requirements</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-4" href="admin-edit.php"><i class="fas fa-cogs"></i> Admin Edit</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                    <div class="container-fluid">
                        <!-- <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['FirstName']?> <?=$_SESSION['LastName']?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="core/logout.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid p-4">