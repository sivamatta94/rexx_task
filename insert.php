<?php
include "connect.php";
$events = file_get_contents("events.json", true);
$result = json_decode($events);
if(!empty($result)){
	foreach ($result as $key => $value) {
		$sql = "INSERT INTO `employee`(`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`) VALUES ('".trim($value->participation_id)."','".trim($value->employee_name)."','".trim($value->employee_mail)."','".trim($value->event_id)."','".trim($value->event_name)."','".trim($value->participation_fee)."','".trim($value->event_date)."','".trim($value->version)."')"; 
		$conn->query($sql); 
	}
} 
$conn->close();

?>