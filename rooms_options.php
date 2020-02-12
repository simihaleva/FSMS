
<?php
session_start();

include 'conf.php';

$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT first_name, last_name, email, authority, created_at FROM user  WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $authority,$created_at);
$stmt->fetch();
$stmt->close();
           
if($authority === "Преподавател"){
    $link = "home_logged.php";
    }
    else {
        $link = "home_logged_student.php";
    }
                 
    if($authority === "Преподавател" || $authority === "Асистент" ){
         $link1 = "rooms_options.php";
    }
    else {
        $link1 = "rooms_options_student.php";
     }
                 
?>



<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link href="login.css" rel="stylesheet" type="text/css">
        
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
    <title>FMI Floor Schedule</title>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <a class="logo" href="<?=$link?>"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
				<h1>ФМИ - Управление на график по етажи </h1>
				<a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Изход</a>
			</div>
		</nav>
		<div class="content">
            
        
        <br><br>
        <img class="schedule1" src="schedule1.png"  alt="schedule1"></img>
        <br><br>
        <h2 style="text-align:center">Изберете една от следните опции:</h2>
        <br><br>
        <nav class="navbottom">
			<div>
            <a class = "links" href="search_room.php"><i class="fas fa-calendar-alt"></i>Търсене на зала</a>
                <a class = "links" href="save_room.php" ><i class="fas fa-university"></i>Запазване на зала</a>             
                <a class = "links" href="delete_lesson.php" ><i class="fas fa-file-alt"></i>Отмяна на занятие</a>             
</div>
</nav>

        <br>

		</div>
	</body>
</html>