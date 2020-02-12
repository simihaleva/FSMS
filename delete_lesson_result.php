<?php
session_start();

include 'conf.php';

$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$building = $_POST['building'];
$room = $_POST['room'];
$date = $_POST['date'];
$Date=date('Y-m-d', strtotime($date));
$hour = $_POST['hour'];

if ($stmt = $con->prepare("DELETE s  FROM schedule s left join room r ON (s.id_room = r.id) WHERE (s.id_teacher = '".$_SESSION['id']."' AND r.building = '".$building."' AND r.room = '".$room."' 
                                                                                                        AND s.date = '".$Date."' AND s.start_hour = '".$hour."')")) {

    $stmt->execute();
    $stmt->fetch();
    $error = "Успешно отменихте занятието!";
    $_SESSION["error"] = $error;
    header("location: delete_lesson.php");
} 
else {
    $error = "Неуспешно отменяне на занятието! Проверете дали сте избрали коректни данни и дали Вие го провеждате и опитайте отново!1";
    $_SESSION["error"] = $error;
    header("location: delete_lesson.php");
}

	
$stmt->close();
$con->close();
?>
