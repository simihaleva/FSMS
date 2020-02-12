<?php
session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="login.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">

	</head>
	<body>

		<nav class="navtop">
			<div>
                <a class="logo" href="beginning.html"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
				<h1>ФМИ - Управление на график по етажи</h1>
				<a href="register_form.php"><i class="fas fa-sign-in-alt"></i>Регистрация</a>
                <a href="beginning.html"><i class="fas fa-home"></i>Начало</a>
			</div>
        </nav>
        
        <br>
        <div class="content">
            <br><br>
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


		<div class="login">
			<h1>Вход</h1>
			<form action="login.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Потребителско име" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Парола" id="password" required>
                <input type="submit" value="Вход"> 

            </form>


		</div>
	</body>
</html>

<?php
    unset($_SESSION["error"]);
?>