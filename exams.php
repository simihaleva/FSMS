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
        <!--<img class="schedule1" style="width:10%" src="schedule1.png"  alt="schedule1"></img>-->
        
        </div>

        <div class="content">
            <h2 style="text-align:center;">Моля, попълнете всички полета!</h2>
           </div>
   
           <div class="search_schedule" style="width:500px;">
               <h1>Заявяване на изпит</h1>

               <form action="" method="post">

               <h2 style="float:left;margin-left:70px;margin-right:0;">Предмет:</h2>
                    <input type="text" id="subject"  placeholder="Въведете текст:" name="subject" style="float:right;margin-right:70px;margin-left:0;margin-top:9px" required>

                 <h2 style="float:left;margin-left:70px;margin-right:0;" >Специалност:</h2>
                <select name="specialty" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">
                    <option value="Компютърни науки">Компютърни науки</option>
                    <option value="Софтуерно инженерство">Софтуерно инженерство</option>
                  </select>

                  <h2 style="float:left;margin-left:70px;margin-right:0;">Курс:</h2>
                  <select name="course" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">
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

                    <h2 style="float:left;margin-left:70px;margin-right:0;">Брой студенти:</h2>
                 <input type="text" id="capacity" name="capacity" placeholder="Въведете число: " style="float:right;margin-right:70px;margin-left:0;margin-top:9px" required>

                 <h2 style="float:left;margin-left:70px;margin-right:0;">Брой зали:</h2>
                 <input type="text" id="count_rooms" name="count_rooms" placeholder="Въведете число: " style="float:right;margin-right:70px;margin-left:0;margin-top:9px" required>

                 <h2 style="float:left;margin-left:70px;margin-right:0;">Вид на залата:</h2>
                  <select name="type" style="float:right;margin-right:70px;margin-left:0;margin-top:9px">
                      <option value="Аудитория">Аудитория</option>
                      <option value="Учебна зала">Учебна зала</option>
                      <option value="Компютрна зала">Компютрна зала</option>
                    </select>

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

                    <h2 style="float:left;margin-left:70px;margin-right:0;">Времетраене:</h2>
                 <input type="text" id="duration" name="duration" placeholder="Въведете число: " style="float:right;margin-right:70px;margin-left:0;margin-top:9px" required>

                   <input type="submit" name="submit" value="Заявяване">
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