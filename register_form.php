<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="register.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
        <title>Registration</title>
        
            <link href="login.css" rel="stylesheet" type="text/css">

	</head>
	<body>

		<nav class="navtop">
			<div>
                <a class="logo" href="beginning.html"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
				<h1>ФМИ - Управление на график по етажи</h1>
				<a href="login_form.php"><i class="fas fa-sign-in-alt"></i>Вход</a>
                <a href="beginning.html"><i class="fas fa-home"></i>Начало</a>
                
           
			</div>
        </nav>
        
        <br>
        <div class="content">
         <h2 style="text-align:center;">Моля, попълнете необходимите полета!</h2>
         <h3 style="font-size:15px; text-align: center" >Забележка: Ако сте преподавател или завършил асистент, оставете празно полето "Факултетен номер"!</h3>
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

		<div class="register">
            <h1>Регистрация</h1>

			<form action="register.php" method="post" autocomplete="off">

                <input type="radio" name="authority" value="Преподавател" > Преподавател  
                <input type="radio" name="authority" value="Асистент"> Асистент  
                <input type="radio" name="authority" value="Студент"> Студент 

				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Потребителско име" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Парола" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
                <input type="email" name="email" placeholder="Имейл" id="email" required>
                
				<label for="first_name">
					<i class="fas fa-id-card"></i>
				</label>
                <input type="first_name" name="first_name" placeholder="Собствено име" id="first_name" required>

                <label for="last_name">
					<i class="far fa-id-card"></i>
				</label>
                <input type="last_name" name="last_name" placeholder="Фамилия" id="last_name" required>

                <label for="fn">
					<i class="fas fa-university"></i>
				</label>
                <input type="fn" name="fn" placeholder="Факултетен номер" id="fn">

				<input type="submit" value="Регистрация">
			</form>
		</div>
	</body>
</html>

<?php
    unset($_SESSION["error"]);
?>