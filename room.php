<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Floor</title>
        <link rel="stylesheet" type="text/css" href="floor.css">
        <link rel="stylesheet" type="text/css" href="roomDetails.css">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
		<link href="navtop.css" rel="stylesheet" type="text/css">
       
       
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        
    </head>
    <body>
  

<?php
    include 'conf.php';
    $room=$_GET['room'];
    $busy=true;
    echo '
    <nav class="navtop">
        <div>
        <a class="logo" href="#whsel"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
            <h1>Стая '.$room.'</h1>
            <a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
            <a href="<?=$link1?>"><i class="fas fa-backward"></i>Назад</a>
        </div>
    </nav>
    ';
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT  *  FROM room r join schedule s ON r.id=s.id_room WHERE room='$room' ");
        $stmt->execute();
        $row=$stmt->fetch();
        echo'
        <div class="detailsForm">
        <div> Капацитет: '.$row['capacity'].' </div>
        <div> Залата е: '.$row['description'].'</div> 
        </div>'
        ;
        
    }
    
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }




?>

