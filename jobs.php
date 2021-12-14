<?php include("_header.php"); ?>
<div class="header">
	<div class="row">
		<div class="col-6">
			<h2>Jobs</h2>
		</div>
		<div class="col-6">
			<button class="btn btn-md btn-primary btn-rounded float-end">
				<i class="fas fa-plus"></i> Post a Job
			</button>
		</div>
	</div>
	<div class="bg-white p-3 my-4">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="int-tab" data-bs-toggle="tab" data-bs-target="#int-lists" type="button" role="tab" aria-controls="int-lists" aria-selected="true">Interviews List</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps-lists" type="button" role="tab" aria-controls="apps-lists" aria-selected="false">Applications Lists</button>
			</li>
		</ul>

		<div class="tab-content mt-4">
			<div class="tab-pane active" id="int-lists" role="tabpanel" aria-labelledby="int-tab">Interviews List</div>
			<div class="tab-pane" id="apps-lists" role="tabpanel" aria-labelledby="apps-tab">Applications Lists</div>
		</div>
	</div>
<?php include("_footer.php"); ?>
