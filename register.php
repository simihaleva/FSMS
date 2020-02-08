<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fsms';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	die ('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	die ('Please complete the registration form');
}

if ($stmt = $con->prepare('SELECT id, password FROM user  WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
        $error = "Потребителското име вече съществува! Опитайте с друго!";
        $_SESSION["error"] = $error;
        header("location: register_beg.php");
	} else {
if ($stmt = $con->prepare('INSERT INTO user (username, password, email, first_name, last_name, fn, authority) VALUES (?,?,?,?,?,?,?)')) {
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('sssssss' ,$_POST['username'], $password, $_POST['email'],  $_POST['first_name'],$_POST['last_name'],$_POST['fn'],$_POST['authority']);
	$stmt->execute();
    $error = "Успешно се регистрирахте в системата! Вече можете да влезете в профила си!";
    $_SESSION["error"] = $error;
    header("location: register_beg.php");
} else {
    $error = "Неуспешна регистрация! Опитайте отново!";
    $_SESSION["error"] = $error;
    header("location: register_beg.php");
}
	}
	$stmt->close();
} 

else {
    $error = "Неуспешна регистрация! Опитайте отново!";
    $_SESSION["error"] = $error;
    header("location: register_beg.php");
}

$con->close();
?>

