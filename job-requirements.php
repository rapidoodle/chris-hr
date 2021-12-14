<?php include("_header.php"); ?>
<div class="header">
	<div class="row">
		<div class="col-6">
			<h2>Job Requirements</h2>
		</div>
		<div class="col-6">
		</div>
	</div>
	<div class="bg-white p-3 my-4">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="duties-tab" data-bs-toggle="tab" data-bs-target="#duties-panel" type="button" role="tab" aria-controls="duties-panel" aria-selected="true">Duties</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects-panel" type="button" role="tab" aria-controls="projects-panel" aria-selected="false">Projects</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills-panel" type="button" role="tab" aria-controls="skills-panel" aria-selected="false">Skills</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="kpi-tab" data-bs-toggle="tab" data-bs-target="#kpi-panel" type="button" role="tab" aria-controls="kpi-panel" aria-selected="false">KPI's</button>
			</li>
		</ul>

		<div class="tab-content mt-4">
			<div class="tab-pane active" id="duties-panel" role="tabpanel" aria-labelledby="duties-tab">DUTIES</div>
			<div class="tab-pane" id="projects-panel" role="tabpanel" aria-labelledby="projects-tab">Projects</div>
			<div class="tab-pane" id="skills-panel" role="tabpanel" aria-labelledby="skills-tab">Skills</div>
			<div class="tab-pane" id="kpi-panel" role="tabpanel" aria-labelledby="kpi-tab">KPI's</div>
		</div>
	</div>
</div>
<?php include("_footer.php"); ?>
