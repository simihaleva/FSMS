<?php
session_start();
include 'conf.php';

 $time=$_GET['time'];
 $date=$_GET['date'];
 $duration=$_GET['duration'];
 $specialty=$_GET['specialty'];
 $group=$_GET['group'];
 $course=$_GET['course'];
 $room_id=$_GET['room_id'];
 $subject=$_GET['subject'];
 $is_lecture=$_GET['is_lecture'];
 $id_teacher=$_SESSION['id'];
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);   
$insert=$conn -> prepare("INSERT INTO `schedule` (`id`, `id_room`, `date`, `start_hour`, `subject`, `id_teacher`, `is_lecture`, `specialty`, `course`, `group`, `duration`) 
VALUES (NULL,'$room_id','$date' ,'$time' ,'$subject' , '$id_teacher','$is_lecture','$specialty' ,'$course' ,'$group' ,'$duration' )");
$insert->execute();

?>
