
<?php
session_start();
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
<?php
                 
    if($authority === "Преподавател" || $authority === "Асистент" ){
         $link1 = "rooms_choice.php";
    }
    else {
        $link1 = "rooms_choice1.php";
     }
                 
?>



<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link href="login.css" rel="stylesheet" type="text/css">
        
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
    <title>FMI Floor Schedule</title>

		<link href="login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <a class="logo" href="#whsel"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
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
            <a class = "links" href="rooms.php"><i class="fas fa-calendar-alt"></i>Търсене на зала</a>
                <a class = "links" href="rooms1.php" ><i class="fas fa-university"></i>Запазване на зала</a>             
                <a class = "links" href="drop.php" ><i class="fas fa-file-alt"></i>Отмяна на занятие</a>             
</div>
</nav>

        <br>

      

		</div>
	</body>
</html>