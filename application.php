<?php
session_start();

include("core/database.php");
include("core/functions.php");
include("core/helpers.php");

$el   = getEducationalDetailsLevel($conn);

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
					<div class="header">
						<!-- hidden employee id -->
						<input type="hidden" value="<?=$_GET['id']?>" id="EmployeeID">

						<div class="row">
							<div class="col-4">
								<h2>Application Form</h2>
							</div>
						</div>
						<div class="bg-white p-3 my-4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#forms-controller" type="button" role="tab" aria-controls="home" aria-selected="true">General Info</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Documents</button>
							</li>
						</ul>
							<div class="tab-content mt-4">
								<div class="tab-pane active" id="forms-controller" role="tabpanel" aria-labelledby="home-tab">
										<!--personal details section-->
					<!--  					<section id="form-section-1" class="p-4 bg-light" data-position="1" data-table="Employees">
											<form id="form-employee-1">
												<div class="form-group row mb-2">
													<label for="PositionApplied" class="col-sm-2 col-form-label">Position applied:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="PositionApplied" name="PositionApplied" required>
														<sub>(Please fill up this form correctly and accurately.  All information will be kept in confidence)</sub>
													</div>
												</div>
												<h5 class="my-4">
													<center>Personal Particulars</center>
												</h5>
												<div class="form-group row mb-2">
													<label for="FirstName" class="col-sm-2 col-form-label">First Name:</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="FirstName" name="FirstName">
													</div>
													<label for="LastName" class="col-sm-2 col-form-label">Last Name:</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="LastName" name="LastName">
													</div>
												</div>
												<div class="form-group row mb-2">
													<label for="Address" class="col-sm-2 col-form-label">Address:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="address" name="Address">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="TelephoneNumber" class="col-sm-2 col-form-label">Tel:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="TelephoneNumber" name="TelephoneNumber">
													</div>
													<label for="PagerNumber" class="col-sm-2 col-form-label">H/p No/Pager:</label>
													<div class="col-sm-6">
														<input type="text" class="form-control" id="PagerNumber" name="PagerNumber">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="PassportNumber" class="col-sm-2 col-form-label">NRIC No (Colour)/Passport No:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="PassportNumber" name="PassportNumber">
													</div>
													<label for="Citizenship" class="col-sm-2 col-form-label">Citizenship:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="Citizenship" name="Citizenship">
													</div>
													<label for="Gender" class="col-sm-1 col-form-label">Sex:</label>
													<div class="col-sm-2">
														<select class="form-control" id="Gender" name="Gender">
															<option>Male</option>
															<option>Female</option>
														</select>
													</div>
												</div>

												<hr>

												<div class="form-group row mb-2">
													<label for="SpouseName" class="col-sm-2 col-form-label">If marries, State spouse's Name:</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="SpouseName" name="SpouseName">
													</div>
													<label for="Occupation" class="col-sm-2 col-form-label">Occupation:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="Occupation" name="Occupation">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="NumberofChildren" class="col-sm-2 col-form-label">No. of Children:</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="NumberofChildren" name="NumberofChildren">
													</div>
													<label for="AgeRange" class="col-sm-2 col-form-label">Age Range:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="AgeRange" name="AgeRange">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="NextOfKinName" class="col-sm-2 col-form-label">Who would you describe as your next-of-kin: Name:</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="NextOfKinName" name="NextOfKinName">
													</div>
													<label for="Relationship" class="col-sm-2 col-form-label">Relationship:</label>
													<div class="col-sm-3"><input type="text" class="form-control" id="Relationship" name="Relationship">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="SpouseNAddress" class="col-sm-2 col-form-label">Address:</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="SpouseAddress" name="SpouseAddress">
													</div>
													<label for="SpouseTelephoneNumber" class="col-sm-2 col-form-label">Tel No:</label>
													<div class="col-sm-3"><input type="text" class="form-control" id="SpouseTelephoneNumber" name="SpouseTelephoneNumber">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="SpouseNAddress" class="col-sm-5 col-form-label">Are You Serving Bond With Your Present Employer?</label>
													<div class="col-sm-5">
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="PresentEmployerBond" id="PresentEmployerBondYes" value="yes">
															<label class="form-check-label" for="PresentEmployerBondYes">Yes</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="PresentEmployerBond" id="PresentEmployerBondNo" value="no">
															<label class="form-check-label" for="PresentEmployerBondNo">No</label>
														</div>
													</div>
												</div>

												<hr>

												<h6 class="mb-4">The Asian Banker is an equal opportunity employer for people of all background. The following social information is intended only to give us a sense of your origins and general background. </h6>

												<div class="form-group row mb-2">
													<label for="Birthday" class="col-sm-2 col-form-label">Date of Birth:</label>
													<div class="col-sm-2">
														<input type="date" class="form-control" id="Birthday" name="Birthday">
													</div>
													<label for="BirthPlace" class="col-sm-2 col-form-label">Birth Place:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="BirthPlace" name="BirthPlace">
													</div>
													<label for="Dialect" class="col-sm-2 col-form-label">Ethnicity/Dialect:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="Dialect" name="Dialect">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="Religion" class="col-sm-2 col-form-label">Religion:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="Religion" name="Religion">
													</div>
													<label for="MaritalStatus" class="col-sm-2 col-form-label">Marital Status:</label>
													<div class="col-sm-5">
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="MaritalStatus" id="MaritalStatusSingle" value="Single">
															<label class="form-check-label" for="MaritalStatusSingle">Single</label>
														</div>
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="MaritalStatus" id="MaritalStatusMarried" value="Married">
															<label class="form-check-label" for="MaritalStatusMarried">Married</label>
														</div>
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="MaritalStatus" id="MaritalStatusSeparated" value="Separated">
															<label class="form-check-label" for="MaritalStatusSeparated">Separated</label>
														</div>
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="MaritalStatus" id="MaritalStatusDivorced" value="Divorced">
															<label class="form-check-label" for="MaritalStatusDivorced">Divorced</label>
														</div>
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="MaritalStatus" id="MaritalStatusWidowed" value="Widowed">
															<label class="form-check-label" for="MaritalStatusWidowed">Widowed</label>
														</div>
													</div>
												</div>

												<hr>

												<div class="form-group row mb-2">
													<label for="PositionDesired" class="col-sm-2 col-form-label">Position Desired:</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="PositionDesired" name="PositionDesired">
													</div>
													<label for="DateAvailable" class="col-sm-2 col-form-label">Date Available:</label>
													<div class="col-sm-3">
														<input type="date" class="form-control" id="DateAvailable" name="DateAvailable">
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="PositionQualified" class="col-sm-2 col-form-label">Other Positions Which Your Are Qualified:</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="PositionQualified" name="PositionQualified">
													</div>
													<label for="PreviouslyEmployedToCompany" class="col-sm-4 col-form-label">Previously employed by/applied to join Company:</label>
													<div class="col-sm-2">
														<div class="form-check form-check-inline mt-2">
															<input class="form-check-input" type="radio" name="PreviouslyEmployedToCompany" id="PreviouslyEmployedToCompanyYes" value="yes">
															<label class="form-check-label" for="PreviouslyEmployedToCompanyYes">Yes</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="PreviouslyEmployedToCompany" id="PreviouslyEmployedToCompanyNo" value="no">
															<label class="form-check-label" for="PreviouslyEmployedToCompanyNo">No</label>
														</div>
													</div>
												</div>

												<div class="form-group row mb-2">
													<label for="RelativesInCompany" class="col-sm-2 col-form-label">Relatives/Friends in Company:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="RelativesInCompany" name="RelativesInCompany">
													</div>
													<label for="DateAvailable" class="col-sm-1 col-form-label">Date:</label>
													<div class="col-sm-2">
														<input type="date" class="form-control" id="RelativesInCompanyDate" name="RelativesInCompanyDate">
													</div>
													<label for="Position" class="col-sm-1 col-form-label">Position:</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="RelativesInCompanyPosition" name="RelativesInCompanyPosition">
													</div>
												</div>
											</form>
										</section>   -->

										<!--educational details section-->

					<!-- 					 <section id="form-section-2" class="p-4 bg-light" data-position="2" data-table="EmployeeEducationalDetails">
											<h5 class="my-4">
												<center>Educational Details</center>
											</h5>
											<form id="form-employee-2">
												<table width="100%" class="table table-bordered">
													<tr>
														<td align="center">Name of School</td>
														<td align="center">Address</td>
														<td align="center">Level</td>
														<td align="center">From</td>
														<td align="center">To</td>
														<td align="center">Did You Graduate</td>
														<td align="center">Details</td>
													</tr>
													<?php $ctr=0; while($row = sqlsrv_fetch_array($el, SQLSRV_FETCH_ASSOC) ){ ?>
													<tr>
														<td>
															<input type="text" name="SchoolName[]" class="form-control">
															<input type="hidden" name="EmployeeID[]" class="form-control">
															<input type="hidden" name="EmployeeEducationalDetailsID[]" class="form-control">
														</td>
														<td>
															<input type="text" name="SchoolAddress[]" class="form-control">
														</td>
														<td><?=$row['LevelName']?></td>
														<td><input type="date" name="AttendedFrom[]" class="form-control"></td>
														<td><input type="date" name="AttendedTo[]" class="form-control"></td>
														<td>
															<div class="form-check form-check-inline mt-2">
																<input class="form-check-input" type="radio" name="IsGraduated_<?=$ctr?>" id="IsGraduatedYes_<?=$ctr?>" value="yes">
																<label class="form-check-label" for="IsGraduatedYes_<?=$ctr?>" selected>Yes</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="IsGraduated_<?=$ctr?>" id="IsGraduatedNo_<?=$ctr?>" value="no">
																<label class="form-check-label" for="IsGraduatedNo_<?=$ctr?>">No</label>
															</div>
														</td>
														<td>
															<input type="text" name="SchoolDetails[]" class="form-control">
														</td>
													</tr>
													<?php $ctr++; } ?>
												</table>
											</form>
											<form id="form-employee-2half">
												<input type="hidden" name="eID" class="form-control" value="<?=$e['EmployeeID']?>">
												<div class="form-group my-2">
													<label for="FurtherEducation" class="col-form-label">If you Plan Further Education, Please Explain:</label>
													<textarea type="text" class="form-control" id="FurtherEducation" name="FurtherEducation"></textarea>
												</div>

												<div class="form-group mb-2">
													<label for="TrainingSkills" class="col-form-label">Other Training Or Skills (Factory Or Office Machines Operated, Special Courses etc):</label>
													<textarea type="text" class="form-control" id="TrainingSkills" name="TrainingSkills"></textarea>
												</div>

												<div class="form-group mb-2">
													<label for="FullName" class="col-form-label">Hobbies:</label>
													<textarea type="text" class="form-control" id="Hobbies" name="Hobbies"></textarea>
												</div>
											</form>
										</section>   -->

										<!--national services section-->
					<!-- 					<section id="form-section-3" class="p-4 bg-light" data-position="3" data-table="EmployeeNationalServices">
											<form id="form-employee-3">
												<h5 class="my-4">
													<center>National Services</center>
												</h5>
												<table width="100%" class="table table-bordered">
													<tr>
														<td align="center">FULL TIME</td>
														<td align="center">From</td>
														<td align="center">To</td>
														<td align="center">Type of Discharge</td>
														<td align="center">Vocation</td>
														<td align="center">Next In-Camp Training</td>
														<td align="center">Last Rank</td>
													</tr>
													<tr>
														<td>
															<input type="text" id="FullTime" name="FullTime" class="form-control">
														</td>
														<td>
															<input type="date" id="ServedFrom" name="ServedFrom" class="form-control">
														</td>
														<td><input type="date" id="ServedTo" name="ServedTo" class="form-control">
														</td>
														<td>
															<input type="text" id="DischargeType" name="DischargeType" class="form-control">
														</td>
														<td>
															<input type="text" id="Vocation" name="Vocation" class="form-control">
														</td>
														<td>
															<input type="text" id="NextInCampTraining" name="NextInCampTraining" class="form-control">
														</td>
														<td>
															<input type="text" id="LastRank" name="LastRank" class="form-control">
														</td>
													</tr>
												</table>
												<div class="form-group row my-2">
													<label for="FullName" class="col-sm-2 col-form-label">Service Schools Or Special Experience:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="SpecialExperiencePartTime" name="SpecialExperiencePartTime">
													</div>
												</div>
												<div class="form-group row mb-2">
													<label for="PartTime" class="col-sm-2 col-form-label">PART TIME:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="PartTime" name="PartTime">
													</div>
													<label for="SpecialExperienceUnit" class="col-sm-2 col-form-label">Unit Attached to:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="SpecialExperienceUnit" name="SpecialExperienceUnit">
													</div>
													<label for="SpecialExperienceDuration" class="col-sm-2 col-form-label">Duration of Liability:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="SpecialExperienceDuration" name="SpecialExperienceDuration">
													</div>
												</div>
												<div class="form-group row mb-2">
													<label for="SpecialExperienceFrequency" class="col-sm-2 col-form-label">Frequency of Duties:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="SpecialExperienceFrequency" name="SpecialExperienceFrequency">
													</div>
													<label for="SpecialExperienceLastRank" class="col-sm-2 col-form-label">Last Rank:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="SpecialExperienceLastRank" name="SpecialExperienceLastRank">
													</div>
													<label for="SpecialExperienceStatus" class="col-sm-2 col-form-label">Exempted/Defered/Awaiting:</label>
													<div class="col-sm-2">
														<input type="text" class="form-control" id="SpecialExperienceStatus" name="SpecialExperienceStatus">
													</div>
												</div>
												<div class="form-group row mb-2">
													<label for="SpecialExperiencePeriod" class="col-sm-2 col-form-label">Period/Date of Registration:</label>
													<div class="col-sm-2">
														<input type="date" class="form-control" id="SpecialExperiencePeriod" name="SpecialExperiencePeriod">
													</div>
													<label for="SpecialExperienceStatusReason" class="col-sm-2 col-form-label">Reason(s):</label>
													<div class="col-sm-6">
														<input type="text" class="form-control" id="SpecialExperienceStatusReason" name="SpecialExperienceStatusReason">
													</div>
												</div>
											</form>
										</section>  -->

										<!--employment history section-->
					<!--  					<section id="form-section-4" class="p-4 bg-light" data-position="4" data-table="EmployeeEmploymentHistory">
											<form id="form-employee-4">
												<h5 class="my-4">
													<center>Employment History</center>
												</h5>
												<table width="100%" class="table table-bordered" id="tbl-emphistory">
													<tr>
														<td align="center">Name of Employer</td>
														<td align="center">Address of Employer</td>
														<td align="center">Position</td>
														<td align="center">From</td>
														<td align="center">To</td>
														<td align="center">Salary</td>
														<td align="center">Reason for Leaving</td>
													</tr>
													<tr>
														<td>
															<input type="text" name="EmployerName[]" class="form-control">
															<input type="hidden" name="EmployeeEmploymentHistoryID[]" class="form-control">
														</td>
														<td>
															<input type="text" name="EmployerAddress[]" class="form-control">
														</td>
														<td><input type="text" name="Position[]" class="form-control"></td>
														<td><input type="date" name="EmploymentFrom[]" class="form-control"></td>
														<td><input type="date" name="EmploymentTo[]" class="form-control"></td>
														<td>
															<input type="text" name="Salary[]" class="form-control">
														</td>
														<td>
															<input type="text" name="ReasonForLeaving[]" class="form-control">
														</td>
													</tr>
												</table>
												<a id="add-emphistory" class="btn btn-primary float-end">Add Employment History</a>
											</form>
										</section>  -->

										<!--languages section-->
					<!--  					<section id="form-section-5" class="p-4 bg-light" data-position="5" data-table="Employees">
											<form id="form-employee-5">
												<h5 class="my-4">
													<center>Languages</center>
												</h5>
												<div class="form-group my-2">
													<label for="LanguageSpoken">Language Spoken:</label>
													<input type="text" class="form-control" id="LanguageSpoken" name="LanguageSpoken">
												</div>
												<div class="form-group my-2">
													<label for="LanguageWritten">Language Written:</label>
													<input type="text" class="form-control" id="LanguageWritten" name="LanguageWritten">
												</div>
											</form>
										</section>  -->

										<!--medical history section-->
					<!--  					<section id="form-section-6" class="p-4 bg-light" data-position="6" data-table="Employees">
											<form id="form-employee-6">
												<h5 class="my-4">
													<center>Medical History</center>
												</h5>
												<div class="form-group my-2">
													<label for="PhysicalDisabledDetails">Any Physical Disability:   No / Yes, Please Specify:</label>
													<input type="text" class="form-control" id="PhysicalDisabledDetails" name="PhysicalDisabledDetails">
												</div>
												<div class="form-group my-2">
													<label for="MajorIllnessDetails">Any Major Illiness / Accident in Last Six Months?   No / Yes, Please Specify:</label>
													<input type="text" class="form-control" id="MajorIllnessDetails" name="MajorIllnessDetails">
												</div>
											</form>
										</section>  -->

										<!--references section-->
										<section id="form-section-7" class="p-4 bg-light" data-position="7" data-table="EmployeeReferences">
											<form id="form-employee-7">
												<h5 class="my-4">
													<center>References</center>
												</h5>
												<table width="100%" class="table table-bordered" id="tbl-reference">
													<tr>
														<td align="center">Name</td>
														<td align="center">Address</td>
														<td align="center">Occupation</td>
														<td align="center">Years Known</td>
													</tr>
													<tr>
														<td>
															<input type="text" name="ReferenceName[]" class="form-control">
															<input type="hidden" name="EmployeeReferencesID[]" class="form-control">
														</td>
														<td>
															<input type="text" name="ReferenceAddress[]" class="form-control">
														</td>
														<td><input type="text" name="Occupation[]" class="form-control"></td>
														<td><input type="number" name="YearsKnown[]" class="form-control"></td>
													</tr>
												</table>
												<a class="btn btn-primary float-end" id="add-reference">Add New Reference</a>
											</form>
										</section>

										<!--declaration section-->
										<section id="form-section-8" class="p-4 bg-light" data-position="8">
											<h5 class="my-4">
												<center>Declaration</center>
											</h5>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="yes" id="Declaration1" required="true">
												<label class="form-check-label" for="Declaration1" name="Declaration1">I have / have never been convicted on a criminal charge</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="yes" id="Declaration2" required="true">
												<label class="form-check-label" for="Declaration2">I have / have never been taken and am presently not taking drugs</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="yes" id="Declaration3" required="true">
												<label class="form-check-label" for="Declaration3">I hereby certify that the above information as provided by me is true, complete and accurate to the best of my knowledge.</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="yes" id="Declaration4" required="true">
												<label class="form-check-label" for="Declaration4">I further understand that any wilful act on my part withholding information or making any false statement in this Employment Application is in itself sufficient ground for dismissal from the Company.</label>
											</div>
										</section>

										<div class="row">
											<div class="col-6 float-end">
												<button class="btn btn-rounded-sm btn-warning me-2" id="previous-step" disabled="true">Previous</button> 
												<button class="btn btn-rounded-sm btn-primary" id="next-step">Next</button>
											</div>
										</div>
								</div>
								<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">Documents content</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!-- Core theme JS-->
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/datatables.js"></script>
        <script type="text/javascript" src="js/incipit/incipit.js"></script>
    </body>

</html>
