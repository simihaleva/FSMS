<?php
session_start();

$_SESSION['specialty'] = $_POST['specialty'];
$_SESSION['course'] = $_POST['course'];
?>

<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fsms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT first_name, last_name, email, authority, created_at FROM user  WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $authority,$created_at);
$stmt->fetch();
$stmt->close();
?>

<?php
                 
if($authority === "Преподавател"){
    $link = "login_home.php";
    }
    else {
        $link = "login_home1.php";
    }

?>

<!DOCTYPE html>
<html>
  <head>

  <title>Exam Dates</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png"> 
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>



<nav class="navtop">
			<div>
                <a class="logo" href="#whsel"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>

                <h1><?=$_SESSION['specialty']?> Курс: <?=$_SESSION['course']?></h1>
                <h2>Сесия: <br> Начало: 2020-06-08 <br> Край: 2020-07-03 </h2>
      
  

				<a href="exam_dates.php"><i class="fas fa-search"></i>Ново търсене</a>
                <a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
			</div>
        </nav>



        <?php

?>


<table   id="scheduletable2" >
               <tr style="border-bottom:double;">
                   <th >Дата</th>
                   <th>Час</th>
                   <th>Предмет</th>
                   <th>Преподавател</th>
                   <th>Сграда</th>
                   <th>Зала</th>
                   <th>Продължителност</th>
               </tr>

           </table>
           <br>

<script>
function show_exams(index,date,hour,subject,teacher,building,room,duration) {
  var table = document.getElementById("scheduletable2");
  var row = table.insertRow(index);
  row.style.border = "double";
  row.style.height = "40px";
  row.style.backgroundColor = "#FFF8DC";
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  cell1.style.fontSize = "16px";
  cell2.style.fontSize = "16px";
  cell3.style.fontSize = "16px";
  cell4.style.fontSize = "16px";
  cell5.style.fontSize = "16px";
  cell6.style.fontSize = "16px";
  cell7.style.fontSize = "16px";
  cell1.innerHTML = date;
  cell2.innerHTML = hour;
  cell3.innerHTML = subject;
  cell4.innerHTML = teacher;
  cell5.innerHTML = building;
  cell6.innerHTML = room;
  cell7.innerHTML = duration;
}
</script>     

<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "fsms";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT s.subject, s.day_of_week, s.start_hour, s.group, s.is_lecture, s.duration, s.date, s.specialty, s.course, 
                                   u.first_name, u.last_name, r.building, r.room FROM schedule s left join room r on (s.id_room = r.id)
                                                                                                 left join user u on (s.id_teacher=u.id)");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $i = 1;
    while ($row = $stmt->fetch()){

        $hour = $row['start_hour'].":00";
        $duration = $row['duration']." часа";
        $date = $row['date'];
        $teacher = $row['first_name']." ".$row['last_name'];
        $building = $row['building'];
        $room = $row['room'];
        $subject = $row['subject'];
        $specialty = $row['specialty'];
        $course = $row['course'];

        $wanted_course = $_SESSION['course'];
        $wanted_specialty = $_SESSION['specialty'];

        $Date=date('Y-m-d', strtotime($date));

        $DateBegin = date('Y-m-d', strtotime("06/08/2020"));
        $DateEnd = date('Y-m-d', strtotime("07/03/2020"));

        

        if($wanted_specialty === $specialty  && $wanted_course === $course && ($Date >= $DateBegin && $Date <= $DateEnd)){

        echo "<script>dur = '$duration'</script>";
        echo "<script>d = '$date'</script>";
        echo "<script>h = '$hour'</script>";
        echo "<script>s = '$subject'</script>";
        echo "<script>t = '$teacher'</script>";
        echo "<script>b = '$building'</script>";
        echo "<script>r = '$room'</script>";

        echo "<script>i = '$i'</script>";

        echo' <script> ',
            'show_exams(i,d,h,s,t,b,r,dur);',
             '</script>';
             $i = $i + 1;

        }

    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

    ?>




</body>
</html>