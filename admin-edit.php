<?php include("_header.php"); ?>
<div class="header">
	<div class="row">
		<div class="col-6">
			<h2>Admin Edit</h2>
		</div>
		<div class="col-6">
		</div>
	</div>
	<div class="bg-white p-3 my-4">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="titles-tab" data-bs-toggle="tab" data-bs-target="#job-panel" type="button" role="tab" aria-controls="job-panel" aria-selected="true">Job Titles</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="kpi-tab" data-bs-toggle="tab" data-bs-target="#kpi-panel" type="button" role="tab" aria-controls="kpi-panel" aria-selected="false">KPI Categories</button>
			</li>
		</ul>

		<div class="tab-content mt-4">
			<div class="tab-pane active" id="job-panel" role="tabpanel" aria-labelledby="titles-tab">Job Titles</div>
			<div class="tab-pane" id="kpi-panel" role="tabpanel" aria-labelledby="kpi-tab">KPI Categories</div>
		</div>
	</div>
</div>
<?php include("_footer.php"); ?>
