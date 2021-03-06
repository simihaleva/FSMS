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
        <link href="register.css" rel="stylesheet" type="text/css">
        
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
    <title>FMI Floor Schedule</title>

		<link href="login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <a class="logo" href="<?=$link?>"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
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
            <h2 style="text-align:center;">Моля, попълнете всички полета!</h2>
           </div>

           <style type=text/css> 
         span{ 
         color: red; 
         //text-decoration: underline; 
         //font-style: italic; 
         font-weight: bold; 
         font-size: 18px; 
         }  
      </style> 

        <?php
        if(isset($_SESSION["error"])){
            $error = $_SESSION["error"];
            echo '<div style="text-align:center; margin-top:25px"> <span>'.$error.'</span></div>';
        }
    ?> 

           <div class="search_schedule" style="width:500px;">
               <h1>Отмяна на занятие</h1>

               <form action="delete_lesson_result.php" method="post">

                    <h2 style="float:left;margin-left:70px;margin-right:0;">Сграда:</h2>
                <select name="building" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">
                    <option value="ФМИ">ФМИ</option>
                    <option value="Ректорат">Ректорат</option>
                    <option value="Блок 2">Блок 2</option>
                  </select>

                    <h2 style="float:left;margin-left:70px;margin-right:0;" >Зала:</h2>
                    <input type="text" id="room"  placeholder="Въведете текст:" name="room" style="float:right;margin-right:70px;margin-left:0;margin-top:9px" required>

                    <h2 style="float:left;margin-left:70px;margin-right:0;">Дата:</h2>
                    <input type="date" name="date" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">

                   <h2 style="float:left;margin-left:70px;margin-right:0;">Начален час:</h2>
                  <select name="hour" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">
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

                    
                   <input type="submit" name="submit" value="Изпрати">
               </form>
               
           </div>

<?php
            if(isset($_SESSION['submit'])){
            $selected_val_s = $_POST['specialty'];

            $selected_val_c = $_POST['course'];
            $selected_val_d = $_POST['date'];
            }
?>
                


	</body>
</html>
<?php
    unset($_SESSION['submit']);
?>

<?php
    unset($_SESSION["error"]);
?>