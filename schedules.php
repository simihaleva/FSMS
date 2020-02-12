<?php
session_start();

            $_SESSION['specialty'] = $_POST['specialty'];
            $_SESSION['course'] = $_POST['course'];
            $_SESSION['date'] = $_POST['date'];

            if($_POST['specialty'] === "Информатика" || ($_POST['specialty'] === "Компютърни науки" && ($_POST['course'] === "1.1" || $_POST['course'] === "2.1" || $_POST['course'] === "3.1" || $_POST['course'] === "4.1"))){
            header('Location: schedule_kn1_inf.php');    
            }

            if($_POST['specialty'] === "Компютърни науки" && ($_POST['course'] === "1.2" || $_POST['course'] === "2.2" || $_POST['course'] === "3.2" || $_POST['course'] === "4.2")){
            header('Location: schedule_kn2.php');    
            }


            if($_POST['specialty'] === "Софтуерно инженерство" || $_POST['specialty'] === "Информационни системи"){
                header('Location: schedule_si_is.php');    
                }

            
?>