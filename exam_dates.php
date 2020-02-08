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

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link href="login.css" rel="stylesheet" type="text/css">
        <link href="register.css" rel="stylesheet" type="text/css">
        
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
        
        </div>

        <div class="content">
            <h2 style="text-align:center;">Моля, изберете опция в задължителните полета!</h2>
           </div>

           <h3 style="font-size:18px; text-align: center" >Сесията за летен семестър ще се проведе в периода: 08.06.2020г. - 03.07.2020г.</h3>
   
           <div class="search_schedule">
               <h1>Дати за изпити</h1>

               <form action="exam_dates_results.php" method="post">
                 <h2>Специалност:</h2>
                <select name="specialty">
                    <option value="Компютърни науки">Компютърни науки</option>
                    <option value="Софтуерно инженерство">Софтуерно инженерство</option>
                  </select>

                  <h2>Курс:</h2>
                  <select name="course">
                      <option value="1.1">1.1</option>
                      <option value="1.2">1.2</option>
                      <option value="2.1">2.1</option>
                      <option value="2.2">2.2</option>
                      <option value="3.1">3.1</option>
                      <option value="3.2">3.2</option>
                      <option value="4.1">4.1</option>
                      <option value="4.2">4.2</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>

                    <!--<h2>Предмет:</h2>
                    <input type="text" id="subject"  placeholder="Въведете текст:" name="subject">-->

                   <input type="submit" name="submit" value="Търсене">
               </form>
               
           </div>

<?php
            if(isset($_SESSION['submit'])){
            $selected_val_s = $_POST['specialty'];

            $selected_val_c = $_POST['course'];
            //$selected_val_d = $_POST['subject'];
            }
                ?>
                


	</body>
</html>
<?php
    unset($_SESSION['submit']);
?>