<?php 
include 'conf.php';
include 'functions.php';
session_start();

 try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $joinedQuery= $conn->prepare("SELECT  *  FROM room r left join schedule s on r.id=s.id_room ");
 $joinedQuery->execute();
 $joinedResult=$joinedQuery -> fetchAll(); 
 //var_dump($joinedResult);

 $time=$_POST['time'];
 $date=$_POST['date'];
 $is_computer=$_POST['is_computer'];
 $duration=$_POST['duration'];
 $capacity=$_POST['capacity'];

 $rooms=findAllRooms($joinedResult,$date,$time,$duration,$capacity,$is_computer);
 var_dump($rooms);


 echo'
 <div class="detailsForm">' ;
 foreach($rooms as $room){
    echo' 
    <div> Стая: '.$room['room'].' </div>
    </div>
    ';
}
echo'
</div>';
 }

 
        

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
