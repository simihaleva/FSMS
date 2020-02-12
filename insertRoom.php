<?php
session_start();
include 'conf.php';

 $time=$_POST['time'];
 $date=$_POST['date'];
 $duration=$_POST['duration'];
 $specialty=$_POST['specialty'];
 $group=$_POST['group'];
 $course=$_POST['course'];
 $room_id=$_SESSION['room_id'];
 $subject=$_POST['subject'];
 $is_lecture=$_POST['is_lecture'];
 $id_teacher=$_SESSION['id'];
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);   
$insert=$conn -> prepare("INSERT INTO `schedule` (`id`, `id_room`, `date`, `start_hour`, `subject`, `id_teacher`, `is_lecture`, `specialty`, `course`, `group`, `duration`) 
VALUES (NULL,'$room_id','$date' ,'$time' ,'$subject' , '$id_teacher','$is_lecture','$specialty' ,'$course' ,'$group' ,'$duration' )");
$insert->execute();

$error="Стаята е запазена успешно!";
$_SESSION['error']=$error;
    header('location:rooms1.php');

?>
