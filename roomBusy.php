<?php
include 'room.php';

$start_hour=$_SESSION['startTime'];
$end_hour=$_SESSION['endTime'];
echo'
<div>Заета от: '.$row['specialty'].' '.$row['course'].' курс '.$row['group'].' група</div>
<div> От:  '.$start_hour.' До: '.$end_hour.' </div> 
<div>Преподавател: </div>
';
?>
