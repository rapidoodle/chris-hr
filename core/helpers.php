<?php
//utilities
function getStatusColor($status){
	$colors = ["Applicant" => "warning", "Active" => "success", "Retired" => "danger"];

	return $colors[$status];
}

function getDateFromObj($obj){
	$date   = new DateTime($obj); //this returns the current date time

	return json_encode($date);
}
?>