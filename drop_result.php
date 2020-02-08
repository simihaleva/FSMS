<?php
session_start();


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fsms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$i = $_SESSION['id'];
$building = $_POST['building'];
$room = $_POST['room'];
$date = $_POST['date'];
$Date=date('Y-m-d', strtotime($date));
$hour = $_POST['hour'];

//if ($stmt = $con->prepare('DELETE s FROM schedule s  join room r ON (s.id_room = r.id) WHERE (s.id_teacher = $i AND r.building = $building AND r.room = $room 
  //                                                                                                       AND s.date = $Date AND s.start_hour = $hour);')) {
    
    
    if ($stmt = $con->prepare('SELECT s.id_teacher,  r.building, r.room, s.date, s.start_hour   FROM schedule s  join room r ON (s.id_room = r.id) WHERE s.id_teacher=$i;')) {
    $stmt->execute();
    $error = "Успешно отменихте занятието!";
    $_SESSION["error"] = $error;
    header("location: drop.php");
} 
else {
    $error = "Неуспешно отменяне на занятието! Проверете дали сте избрали коректни данни и дали Вие го провеждате и опитайте отново!";
    //$_SESSION["error"] = ;
    header("location: drop.php");
}
	
$stmt->close();
$con->close();
?>
