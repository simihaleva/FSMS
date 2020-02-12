<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login_form.php');
	exit();
}

include 'conf.php';

$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT first_name, last_name FROM user  WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name);
$stmt->fetch();
$stmt->close();

$stmt = $con->prepare('SELECT first_name, last_name, email, authority, created_at FROM user  WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $authority,$created_at);
$stmt->fetch();
$stmt->close();
                 
if($authority === "Преподавател" || $authority === "Асистент"){
    $link = "rooms_options.php";
    }
    else {
        $link = "rooms_options_student.php";
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
            <a class="logo" href="home_logged.php"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
				<h1>ФМИ - Управление на график по етажи </h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Профил</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Изход</a>
			</div>
		</nav>
		<div class="content">
            
        
        <br><br>
        <img class="schedule1" src="schedule1.png"  alt="schedule1"></img>
        <br><br>

        <br>
        <nav class="navbottom">
			<div>
                <a class = "links" href="schedule.php"><i class="fas fa-calendar-alt"></i>Седмично разписание</a>
                <a class = "links" href="<?=$link?>"><i class="fas fa-university"></i>Зали</a>
                <a class = "links" href="exam_dates.php"><i class="fas fa-book-dead"></i>Сесия</a>
                <a class = "links" href="exams.php"><i class="fas fa-file-alt"></i>Заявяване на изпит</a>
			</div>
        </nav>
        <br>

            <h2 style="text-align:center">Здравейте, <?=$first_name?> <?=$last_name?>!</h2>
            <p>Това е платформата за управление на график по етажи на ФМИ, Ректорат и Блок 2 на СУ!</p>


		</div>
	</body>
</html>



