<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Floor</title>
        <link rel="stylesheet" type="text/css" href="floor.css">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png">
		<link href="navtop.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    </head>
    <body>
    
    <?php
        
        
        include 'functions.php';
        include 'conf.php';

        $floor=$_POST['floor'];
        $building=$_POST['building'];
        $time=$_POST['hour'];
        $date=$_POST['date'];
        $duration=$_POST['duration'];
        

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT  *  FROM room r WHERE floor='$floor' and building='$building'");
            $stmt->execute();
            $count=0;
            $flag=0;
            
           $joinedQuery= $conn->prepare("SELECT  *  FROM room r join schedule s on r.id=s.id_room WHERE floor='$floor' and building='$building'");
           $joinedQuery->execute();
           $joinedResult=$joinedQuery -> fetchAll(); 
            
           echo '
           <nav class="navtop">
               <div>
               <a class="logo" href="#whsel"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
                   <h1>Сграда '.$building.' Етаж '.$floor.' </h1>
                   <a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
                   <a href="<?=$link1?>"><i class="fas fa-backward"></i>Назад</a>
               </div>
           </nav>
           ';
           $date1=date("Y-m-d", strtotime($date));
            while( $row = $stmt->fetch()){
                $busy=isBusy($joinedResult,$row,$date1,$time,$duration);
                if($count==0){
                    if(!$busy)   {
                    echo '
                <form action="roomAdd.php" method="get"/>
                <div class="column" style="
                float: left;
                width: 50%;
                padding: 10px; ">
                    <div id="menubar">
                        <div id="menu">
                            <div class="button"  >
                            <input type="hidden" name="date" value='.$date.'>
                            <input type="hidden" name="time" value='.$time.'>    
                            <input type="hidden" name="duration" value='.$duration.'>    
                                     
                                 <Button  type=submit name="room" value='.$row['room'].' style= "font-size:30px; padding:120px 200px; background-color: #138240;
                                 ">'.$row['room'].' </Button>
                            </div>
                        </div>
                    </div>
               </div> 
               </form>
                ';
                $count=1;
            }
                else{ 
                    echo '
                    <form action="roomBusy.php" method="get"/>
                    <div class="column" style="
                    float: left;
                    width: 50%;
                    padding: 10px; ">
                        <div id="menubar">
                            <div id="menu">
                                <div class="button"  >
                                <input type="hidden" name="date" value='.$date.'>
                                <input type="hidden" name="time" value='.$time.'>
                                <input type="hidden" name="duration" value='.$duration.'> 
                                     <Button type=submit name="room" value='.$row['room'].' style= "font-size:30px; padding:120px 200px; background-color: #D3341E;
                                     ">'.$row['room'].' </Button>
                                </div>
                            </div>
                        </div>
                   </div> 
                   
               </form>
                    ';
                   $count=1;
                }

                }
                else {
                    if(!$busy){
                    echo  '
                    <form action="roomAdd.php" method="get"/>
                    <div class="column" style=  
                float: left;
                width: 50%;
                padding: 10px; "
              >
                    <div id="menubar">
                        <div id="menu">
                            <div class="button">
                                <input type="hidden" name="date" value='.$date.'>
                                <input type="hidden" name="time" value='.$time.'>
                                <input type="hidden" name="duration" value='.$duration.'> 
                                 <Button type=submit name="room" value='.$row['room'].' style= "font-size:30px; padding:120px 200px; background-color: #138240;">'.$row['room'].' </Button>
                            </div>
                    </div>
                </div>
                </form>
                ';
                    $count=0;
                    }
                    else{
                        echo  '
                        <form action="roomBusy.php" method="get"/>
                    
                        <div class="column" style=  
                        float: left;
                        width: 50%;
                        padding: 10px; "
                      >
                            <div id="menubar">
                                <div id="menu">
                                    <div class="button">
                                         <input type="hidden" name="date" value='.$date.'>
                                        
                                         
                                         <Button type=submit name="room" value='.$row['room'].' style= "font-size:30px; padding:120px 200px; background-color: #D3341E;">'.$row['room'].' </Button>
                                    </div>
                            </div>
                        </div>
                    </form>    ';
                            $count=0;
                            }
                }
            }
        }
        

        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
       
?>
</table>
    </body>
</html>









