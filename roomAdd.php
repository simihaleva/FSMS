<?php

include 'room.php';
include 'conf.php';
$time=$_GET['time'];
$date=$_GET['date'];
$room_id=$row['id'];
$_SESSION['room_id']=$room_id;

$is_computer=$row['is_computer'];

 echo '
 <div class="detailsForm">
 <form action="/insertRoom.php" method="post" >
 <label>Предмет:</label><input type="text" name="subject"><br>
 <label>Специалност:</label>
 <select name="specialty">
 <option value="Компютърни науки">КН</option>
 <option value="Софтуерно инжинерство">СИ</option>
 <option value="Информационни системи">ИС</option>
 <option value="Информатика">И</option>

 </select><br>

 <label>Курс:</label>
 <select name="course">
 <option value="0">0</option>
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="1.1">1.1</option>
 <option value="1.2">1.2</option>
 <option value="2.1">2.1</option>
 <option value="2.2">2.2</option>
 <option value="3.1">3.1</option>
 <option value="3.2">3.2</option>
 <option value="4.1">4.1</option>
 <option value="4.2">4.2</option>
 </select><br>

 <label>Група:</label>
 <select name="group">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 <option value="6">6</option>
 <option value="7">7</option>
 <option value="8">8</option>
 </select><br>

 <label> Лекция: 
 <input type="radio"  name="is_lecture" value="1">
 <label> Да </label>
 <input type="radio"  name="is_lecture" value="0">
 <label> Не </label>

 <br>
 <input type="hidden" name="time" value='.$_GET['time'].'> 
 <input type="hidden" name="duration" value='.$_GET['duration'].'> 
 <input type="hidden" name="date" value='.$_GET['date'].'> 
 <input type="hidden" name="id" value='.$room_id.'> 
<input type="hidden" name="is_computer" value='.$is_computer.'> 

 
 
 <button type="submit">Запази</button> 
</div>
 ';

?>