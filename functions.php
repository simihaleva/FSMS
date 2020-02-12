<?php
       
         function isBusy($roomsInSchedule,$room,$date,$start_time,$duration){
            $end_time=$start_time + $duration;
            $start_schedule=0;
            $end_schedule=0;

            if(!$roomsInSchedule){
                echo'no schedule';
                return false;
            }
            foreach($roomsInSchedule as $currentSchedule){
                $start_schedule=$currentSchedule["start_hour"];
                $end_schedule=$currentSchedule["duration"]+$start_schedule;
                
                if($currentSchedule["id_room"]==$room['id']){
                    if($currentSchedule["date"]==$date&&
                    ( $start_schedule <$end_time && ($start_time< $end_schedule)))
                    {   
                        $_SESSION['startTime']=$start_schedule;
                        $_SESSION['endTime']=$end_schedule;
                        return true;
                    }
                }
            }
            return false;
        } 


        function findAllRooms($roomsInSchedule,$date,$start_time,$duration,$capacity,$is_computer){
            $i=0;
            $rooms= [];
            $end_time=$start_time + $duration;
            foreach($roomsInSchedule as $currentSchedule){
                $start_schedule=$currentSchedule["start_hour"];
                //echo "'.$start_schedule.'";
                $end_schedule=$currentSchedule["duration"]+$start_schedule;
                
                if($currentSchedule["date"]==$date){
                 
                    if   ( $currentSchedule["start_hour"]==' '  ||($start_schedule < $end_time && $start_time< $end_schedule)){
                        echo'hifsedgfs';
                        if(  $capacity<=$currentSchedule["capacity"]){  
                        if( $is_computer==$currentSchedule["is_computer"])
                            {  
                                echo'heloo'; 
                                $rooms[i]=$currentSchedule;
                                $i++;
                            }
                }
            }
            }
            }
            return $rooms;
        }

?>