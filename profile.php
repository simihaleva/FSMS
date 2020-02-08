<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login1.php');
	exit();
}

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
		<meta charset="utf-8">
		<title>FMI Floor Schedule</title>
		<link href="login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <a class="logo" href="#whsel"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
                <h1>ФМИ - Управление на график по етажи</h1>
               
				<a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Изход</a>
			</div>
		</nav>
		<div class="content">

        <br><br>
        <img class="schedule1" src="schedule1.png"  alt="schedule1"></img>
        <br>


			<h2 style="text-align:center;">Профил</h2>
			<div>
				<p>Подробни данни за Вашия акаунт:</p>
				<table>
					<tr>
						<td>Потребителско име:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Име:</td>
						<td><?=$first_name?></td>
                    </tr>
                    <tr>
						<td>Фамилия:</td>
						<td><?=$last_name?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
                    </tr>
                    <tr>
						<td>Вие сте:</td>
						<td><?=$authority?></td>
                    </tr>
                    <tr>
						<td>Създаден на:</td>
						<td><?=$created_at?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>