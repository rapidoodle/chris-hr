<?php 
include("_header.php"); 
$PassResult = getEmployees($conn);
$statuses   = getStatuses($conn);
?>

<div class="header">
	<div class="row">
		<div class="col-6">
			<h2>Employees</h2>
		</div>
		<div class="col-6">
			<a href="#" class="btn btn-md btn-primary btn-rounded float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
				<i class="fas fa-plus"></i> Add New Employee
			</a>
		</div>
	</div>
	<div class="bg-white p-3 my-4">
		<div class="input-group">
			<span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
			<input type="text" class="form-control" placeholder="Search for an employee" aria-label="Recipient's username with two button addons" aria-describedby="search-icon">

			<button class="btn btn-light txt-blue mx-2 f-14"><i class="fas fa-filter"></i> Filter</button>

			<button class="btn btn-light txt-blue btn-sm f-14"><i class="fas fa-download"></i> Export</button>
		</div>
	</div>
	<table class="table table-primary table-hover tr-link" id="table-employees">
		<thead>
			<tr>
				<th>Employee No.</th>
				<th>Full Name</th>
				<th>Current Position</th>
				<th>Hired Date</th>
				<th>Status</th>
				<th></th>
   		</thead>
		<tbody>
			<?php while($row = sqlsrv_fetch_array($PassResult, SQLSRV_FETCH_ASSOC) ){ ?>
			<tr data-link="employee-details.php?id=<?=$row['EmployeeID']?>">
			<td><?=$row['EmployeeID']?></td>
			<td><?=$row['FirstName'].' '.$row['LastName']?></td>
			<td><?=$row['Occupation']?></td>
			<td><?=$row['HiredDate']?></td>
			<td><button class='btn btn-<?=getStatusColor($row['Status'])?> btn-sm txt-white btn-sm-rounded'>
				<?=ucwords($row['Status'])?>
				</button>
			</td>
			<td><a href='employee-details.php?id=<?=$row[0]?>' class='btn btn-default'><i class='fas fa-angle-right'></i></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<!-- New employee modal -->
<div class="modal fade modal-md" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add new employee</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
			<form method="POST" action="core/save-employee.php">
				<div class="modal-body">
					<div class="form-group row mb-2">
						<label for="FirstName" class="col-sm-3 col-form-label">First Name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="FirstName" name="FirstName" required="true">
						</div>
					</div>
					
					<div class="form-group row mb-2">
						<label for="LastName" class="col-sm-3 col-form-label">Last Name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="LastName" name="LastName" required="true">
						</div>
					</div>
					
					<div class="form-group row mb-2">
						<label for="EmployeeStatusID" class="col-sm-3 col-form-label">Status:</label>
						<div class="col-sm-9">
							<select id="EmployeeStatusID" name="EmployeeStatusID" class="form-control" required="true">
							<?php while($row = sqlsrv_fetch_array($statuses, SQLSRV_FETCH_ASSOC) ){ ?>
								<option value="<?=$row['EmployeeStatusID']?>"><?=$row['EmployeeStatusName']?></option>
							<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" value="new" name="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

          
<?php include("_footer.php"); ?>



