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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT first_name, last_name, email, authority, created_at FROM user  WHERE id = ?');
// In this case we can use the account ID to get the account info.
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
				<a href="<?=$link1?>"><i class="fas fa-backward"></i>Назад</a>
			</div>
        </nav>
        
        <div class="content">
        
        <br><br>
        <img class="schedule1" style="width:10%;" src="schedule1.png"  alt="schedule1"></img>
        
        </div>


        <div class="content">
            <h2 style="text-align:center;">Моля, изберете опция за търсене и попълнете всички полета!</h2>
           </div>
   

           <div class="search_room" id="left">
               <h1>Търсене на зала:</h1>

               <form id="left" action="" method="post">
                 <h2>Сграда:</h2>
                <select name="building">
                    <option value="ФМИ">ФМИ</option>
                    <option value="Ректорат">Ректорат</option>
                    <option value="Блок 2">Блок 2</option>
                  </select>

                  <h2>Етаж:</h2>
                  <select name="floor">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>

                    <h2>Дата:</h2>
                    <input type="date" name="date">



                   <h2>Час:</h2>
                  <select name="hour">
                      <option value="7">7:00</option>
                      <option value="8">8:00</option>
                      <option value="9">9:00</option>
                      <option value="10">10:00</option>
                      <option value="11">11:00</option>
                      <option value="12">12:00</option>
                      <option value="13">13:00</option>
                      <option value="14">14:00</option>
                      <option value="15">15:00</option>
                      <option value="16">16:00</option>
                      <option value="17">17:00</option>
                      <option value="18">18:00</option>
                      <option value="19">19:00</option>
                      <option value="20">20:00</option>
                      <option value="21">21:00</option>
                    </select>

                    <input type="submit" name="submit" value="Търсене">
               </form>
               
   
</div>


           <div class="search_room1" id="right">
               <h1>Търсене на зала:</h1>

               <form id="right" action="" method="post">
                 <h2>Капацитет:</h2>
                 <input type="text" id="capacity" name="capacity" placeholder="Въведете число: " required> 

                  <h2>Вид:</h2>
                  <select name="type">
                      <option value="Аудитория">Аудитория</option>
                      <option value="Учебна зала">Учебна зала</option>
                      <option value="Компютрна зала">Компютрна зала</option>
                    </select>

                    <h2>Дата:</h2>
                    <input type="date" name="date">

                   <h2>Час:</h2>
                  <select name="hour">
                      <option value="7">7:00</option>
                      <option value="8">8:00</option>
                      <option value="9">9:00</option>
                      <option value="10">10:00</option>
                      <option value="11">11:00</option>
                      <option value="12">12:00</option>
                      <option value="13">13:00</option>
                      <option value="14">14:00</option>
                      <option value="15">15:00</option>
                      <option value="16">16:00</option>
                      <option value="17">17:00</option>
                      <option value="18">18:00</option>
                      <option value="19">19:00</option>
                      <option value="20">20:00</option>
                      <option value="21">21:00</option>
                    </select>

                    <input type="submit" name="submit" value="Търсене">
               </form>
               


</div>

<?php
/*
            if(isset($_SESSION['submit'])){
            $selected_val_s = $_POST['specialty'];

            $selected_val_c = $_POST['course'];
            $selected_val_d = $_POST['date'];
            }
            */
                ?>
                


	</body>
</html>
<?php
    unset($_SESSION['submit']);
?>