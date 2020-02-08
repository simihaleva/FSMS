<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fsms';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	die ('Please fill both the username and password field!');
}

    if ($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

            $DATABASE_HOST = 'localhost';
            $DATABASE_USER = 'root';
            $DATABASE_PASS = '';
            $DATABASE_NAME = 'fsms';
            $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
            if (mysqli_connect_errno()) {
                die ('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            $stmt = $con->prepare('SELECT authority FROM user  WHERE id = ?');

            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->bind_result($authority);
            $stmt->fetch();
            $stmt->close();
           
            if($authority === "Преподавател"){
            header('location: login_home.php');
            }

            else {
                header("Location: login_home1.php");
            }
        }
            else { 
            $error = "Невалидна парола! Опитайте отново!";
            $_SESSION["error"] = $error;
            header("location: login1.php");
        }
    }
     else {
        $error = "Невалидно потребителско име! Опитайте отново!";
        $_SESSION["error"] = $error;
        header("location: login1.php");
    }

	$stmt->close();

    }
?>

