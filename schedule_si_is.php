<?php
session_start();

include 'conf.php';

$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT first_name, last_name, email, authority, created_at FROM user  WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $authority,$created_at);
$stmt->fetch();
$stmt->close();
                 
if($authority === "Преподавател"){
    $link = "home_logged.php";
    }
    else {
        $link = "home_logged_student.php";
    }

?>

<?php
            function day_of_week_bg($date) {
                $weekday = date('w', strtotime($date));
                switch ($weekday) 
                {
                    case 0: return "Неделя"; break;
                    case 1: return "Понеделник"; break;
                    case 2: return "Вторник"; break;
                    case 3: return "Сряда"; break;
                    case 4: return "Четвъртък"; break;
                    case 5: return "Петък"; break;
                    case 6: return "Събота"; break;
                    default: echo "Error!";
                }
            }
        ?>

<!DOCTYPE html>
<html>
  <head>

  <title>Schedule</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" type="image/png"> 
<link rel="stylesheet" type="text/css" href="schedule.css">
</head>
<body>

<nav class="navtop">
			<div>
                <a class="logo" href="<?=$link?>"><img src="https://cdn4.iconfinder.com/data/icons/time-date-management/512/schedule_clock-512.png" width="80" height="50" align="left" alt="Logo" /></a>
                <h1><?=$_SESSION['specialty']?> Курс: <?=$_SESSION['course']?></h1>
                <h2><?=day_of_week_bg($_SESSION['date'])?>, <?=$_SESSION['date']?></h2>

				<a href="schedule.php"><i class="fas fa-search"></i>Ново търсене</a>
                <a href="<?=$link?>"><i class="fas fa-home"></i>Начало</a>
			</div>
        </nav>


        <?php
    unset($_SESSION["submit"]);
?>

<table id="scheduletable1">
               <tr style="border: double">
                   <th>Ден/Час</th>
                   <th>Група</th>
                   <th>07:00</th>
                   <th>08:00</th>
                   <th>09:00</th>
                   <th>10:00</th>
                   <th>11:00</th>
                   <th>12:00</th>
                   <th>13:00</th>
                   <th>14:00</th>
                   <th>15:00</th>
                   <th>16:00</th>
                   <th>17:00</th>
                   <th>18:00</th>
                   <th>19:00</th>
                   <th>20:00</th>
                   <th>21:00</th>
               </tr>

               <tr>
                   <td id="M" rowspan="6"> Понеделник</td>
                  <td id="H">1</td>
                  <td id="1"></td>
                  <td id="2"></td>
                  <td id="3"></td>
                  <td id="4"></td>
                  <td id="5"></td>
                  <td id="6"></td>
                  <td id="7"></td>
                  <td id="8"></td>
                  <td id="9"></td>
                  <td id="10"></td>
                  <td id="11"></td>
                  <td id="12"></td>
                  <td id="13"></td>
                  <td id="14"></td>
                  <td id="15"></td>

               </tr>
               
               <tr>
                <td id="H">2</td>
                <td id="16"></td>
                  <td id="17"></td>
                  <td id="18"></td>
                  <td id="19"></td>
                  <td id="20"></td>
                  <td id="21"></td>
                  <td id="22"></td>
                  <td id="23"></td>
                  <td id="24"></td>
                  <td id="25"></td>
                  <td id="26"></td>
                  <td id="27"></td>
                  <td id="28"></td>
                  <td id="29"></td>
                  <td id="30"></td>
            </tr>
            <tr>
                <td id="H">3</td>
                <td id="31"></td>
                  <td id="32"></td>
                  <td id="33"></td>
                  <td id="34"></td>
                  <td id="35"></td>
                  <td id="36"></td>
                  <td id="37"></td>
                  <td id="38"></td>
                  <td id="39"></td>
                  <td id="40"></td>
                  <td id="41"></td>
                  <td id="42"></td>
                  <td id="43"></td>
                  <td id="44"></td>
                  <td id="45"></td>
            </tr>
            <tr>
                <td id="H">4</td>
                <td id="46"></td>
                  <td id="47"></td>
                  <td id="48"></td>
                  <td id="49"></td>
                  <td id="50"></td>
                  <td id="51"></td>
                  <td id="52"></td>
                  <td id="53"></td>
                  <td id="54"></td>
                  <td id="55"></td>
                  <td id="56"></td>
                  <td id="57"></td>
                  <td id="58"></td>
                  <td id="59"></td>
                  <td id="60"></td>
            </tr>
            <tr>
                <td id="H">5</td>
                <td id="61"></td>
                  <td id="62"></td>
                  <td id="63"></td>
                  <td id="64"></td>
                  <td id="65"></td>
                  <td id="66"></td>
                  <td id="67"></td>
                  <td id="68"></td>
                  <td id="69"></td>
                  <td id="70"></td>
                  <td id="71"></td>
                  <td id="72"></td>
                  <td id="73"></td>
                  <td id="74"></td>
                  <td id="75"></td>
            </tr>
            <tr style="border-bottom:double;">
                <td id="H">6</td>
                <td id="76"></td>
                  <td id="77"></td>
                  <td id="78"></td>
                  <td id="79"></td>
                  <td id="80"></td>
                  <td id="81"></td>
                  <td id="82"></td>
                  <td id="83"></td>
                  <td id="84"></td>
                  <td id="85"></td>
                  <td id="86"></td>
                  <td id="87"></td>
                  <td id="88"></td>
                  <td id="89"></td>
                  <td id="90"></td>
            </tr>

               <tr>
                <td id="Tu" rowspan="6">Вторник</td>
                <td id="H">1</td>
                <td id="91"></td>
                  <td id="92"></td>
                  <td id="93"></td>
                  <td id="94"></td>
                  <td id="95"></td>
                  <td id="96"></td>
                  <td id="97"></td>
                  <td id="98"></td>
                  <td id="99"></td>
                  <td id="100"></td>
                  <td id="101"></td>
                  <td id="102"></td>
                  <td id="103"></td>
                  <td id="104"></td>
                  <td id="105"></td>
 

               </tr>
               <tr>
                <td id="H">2</td>
                <td id="106"></td>
                  <td id="107"></td>
                  <td id="108"></td>
                  <td id="109"></td>
                  <td id="110"></td>
                  <td id="111"></td>
                  <td id="112"></td>
                  <td id="113"></td>
                  <td id="114"></td>
                  <td id="115"></td>
                  <td id="116"></td>
                  <td id="117"></td>
                  <td id="118"></td>
                  <td id="119"></td>
                  <td id="120"></td>
            </tr>
            <tr>
                <td id="H">3</td>
                <td id="121"></td>
                  <td id="122"></td>
                  <td id="123"></td>
                  <td id="124"></td>
                  <td id="125"></td>
                  <td id="126"></td>
                  <td id="127"></td>
                  <td id="128"></td>
                  <td id="129"></td>
                  <td id="130"></td>
                  <td id="131"></td>
                  <td id="132"></td>
                  <td id="133"></td>
                  <td id="134"></td>
                  <td id="135"></td>
            </tr>
            <tr>
                <td id="H">4</td>
                <td id="136"></td>
                  <td id="137"></td>
                  <td id="138"></td>
                  <td id="139"></td>
                  <td id="140"></td>
                  <td id="141"></td>
                  <td id="142"></td>
                  <td id="143"></td>
                  <td id="144"></td>
                  <td id="145"></td>
                  <td id="146"></td>
                  <td id="147"></td>
                  <td id="148"></td>
                  <td id="149"></td>
                  <td id="150"></td>
            </tr>
            <tr>
                <td id="H">5</td>
                <td id="151"></td>
                  <td id="152"></td>
                  <td id="153"></td>
                  <td id="154"></td>
                  <td id="155"></td>
                  <td id="156"></td>
                  <td id="157"></td>
                  <td id="158"></td>
                  <td id="159"></td>
                  <td id="160"></td>
                  <td id="161"></td>
                  <td id="162"></td>
                  <td id="163"></td>
                  <td id="164"></td>
                  <td id="165"></td>
            </tr>
            <tr style="border-bottom:double;">
                <td id="H">6</td>
                <td id="166"></td>
                  <td id="167"></td>
                  <td id="168"></td>
                  <td id="169"></td>
                  <td id="170"></td>
                  <td id="171"></td>
                  <td id="172"></td>
                  <td id="173"></td>
                  <td id="174"></td>
                  <td id="175"></td>
                  <td id="176"></td>
                  <td id="177"></td>
                  <td id="178"></td>
                  <td id="179"></td>
                  <td id="180"></td>
            </tr>
               <tr>
                   <td id="W" rowspan="6">Сряда</td>
                   <td id="H">1</td>
                   <td id="181"></td>
                  <td id="182"></td>
                  <td id="183"></td>
                  <td id="184"></td>
                  <td id="185"></td>
                  <td id="186"></td>
                  <td id="187"></td>
                  <td id="188"></td>
                  <td id="189"></td>
                  <td id="190"></td>
                  <td id="191"></td>
                  <td id="192"></td>
                  <td id="193"></td>
                  <td id="194"></td>
                  <td id="195"></td>
               </tr>
               <tr>
                <td id="H">2</td>
                <td id="196"></td>
                  <td id="197"></td>
                  <td id="198"></td>
                  <td id="199"></td>
                  <td id="200"></td>
                  <td id="201"></td>
                  <td id="202"></td>
                  <td id="203"></td>
                  <td id="204"></td>
                  <td id="205"></td>
                  <td id="206"></td>
                  <td id="207"></td>
                  <td id="208"></td>
                  <td id="209"></td>
                  <td id="210"></td>
            </tr>
            <tr>
                <td id="H">3</td>
                <td id="211"></td>
                  <td id="212"></td>
                  <td id="213"></td>
                  <td id="214"></td>
                  <td id="215"></td>
                  <td id="216"></td>
                  <td id="217"></td>
                  <td id="218"></td>
                  <td id="219"></td>
                  <td id="220"></td>
                  <td id="221"></td>
                  <td id="222"></td>
                  <td id="223"></td>
                  <td id="224"></td>
                  <td id="225"></td>
            </tr>
            <tr>
                <td id="H">4</td>
                <td id="226"></td>
                  <td id="227"></td>
                  <td id="228"></td>
                  <td id="229"></td>
                  <td id="230"></td>
                  <td id="231"></td>
                  <td id="232"></td>
                  <td id="233"></td>
                  <td id="234"></td>
                  <td id="235"></td>
                  <td id="236"></td>
                  <td id="237"></td>
                  <td id="238"></td>
                  <td id="239"></td>
                  <td id="240"></td>
            </tr>
            <tr>
                <td id="H">5</td>
                <td id="241"></td>
                  <td id="242"></td>
                  <td id="243"></td>
                  <td id="244"></td>
                  <td id="245"></td>
                  <td id="246"></td>
                  <td id="247"></td>
                  <td id="248"></td>
                  <td id="249"></td>
                  <td id="250"></td>
                  <td id="251"></td>
                  <td id="252"></td>
                  <td id="253"></td>
                  <td id="254"></td>
                  <td id="255"></td>
            </tr>
            <tr style="border-bottom:double;">
                <td id="H">6</td>
                <td id="256"></td>
                  <td id="257"></td>
                  <td id="258"></td>
                  <td id="259"></td>
                  <td id="260"></td>
                  <td id="261"></td>
                  <td id="262"></td>
                  <td id="263"></td>
                  <td id="264"></td>
                  <td id="265"></td>
                  <td id="266"></td>
                  <td id="267"></td>
                  <td id="268"></td>
                  <td id="269"></td>
                  <td id="270"></td>
            </tr>
               <tr>
                   <td id="Th" rowspan="6">Четвъртък</td>
                   <td id="H">1</td>
                   <td id="271"></td>
                  <td id="272"></td>
                  <td id="273"></td>
                  <td id="274"></td>
                  <td id="275"></td>
                  <td id="276"></td>
                  <td id="277"></td>
                  <td id="278"></td>
                  <td id="279"></td>
                  <td id="280"></td>
                  <td id="281"></td>
                  <td id="282"></td>
                  <td id="283"></td>
                  <td id="284"></td>
                  <td id="285"></td>
               </tr>
               <tr>
                <td id="H">2</td>
                <td id="286"></td>
                  <td id="287"></td>
                  <td id="288"></td>
                  <td id="289"></td>
                  <td id="290"></td>
                  <td id="291"></td>
                  <td id="292"></td>
                  <td id="293"></td>
                  <td id="294"></td>
                  <td id="295"></td>
                  <td id="296"></td>
                  <td id="297"></td>
                  <td id="298"></td>
                  <td id="299"></td>
                  <td id="300"></td>
            </tr>
            <tr>
                <td id="H">3</td>
                <td id="301"></td>
                  <td id="302"></td>
                  <td id="303"></td>
                  <td id="304"></td>
                  <td id="305"></td>
                  <td id="306"></td>
                  <td id="307"></td>
                  <td id="308"></td>
                  <td id="309"></td>
                  <td id="310"></td>
                  <td id="311"></td>
                  <td id="312"></td>
                  <td id="313"></td>
                  <td id="314"></td>
                  <td id="315"></td>
            </tr>
            <tr>
                <td id="H">4</td>
                <td id="316"></td>
                  <td id="317"></td>
                  <td id="318"></td>
                  <td id="319"></td>
                  <td id="320"></td>
                  <td id="321"></td>
                  <td id="322"></td>
                  <td id="323"></td>
                  <td id="324"></td>
                  <td id="325"></td>
                  <td id="326"></td>
                  <td id="327"></td>
                  <td id="328"></td>
                  <td id="329"></td>
                  <td id="330"></td>
            </tr>
            <tr>
                <td id="H">5</td>
                <td id="331"></td>
                  <td id="332"></td>
                  <td id="333"></td>
                  <td id="334"></td>
                  <td id="335"></td>
                  <td id="336"></td>
                  <td id="337"></td>
                  <td id="338"></td>
                  <td id="339"></td>
                  <td id="340"></td>
                  <td id="341"></td>
                  <td id="342"></td>
                  <td id="343"></td>
                  <td id="344"></td>
                  <td id="345"></td>
            </tr>
            <tr style="border-bottom:double;">
                <td id="H">6</td>
                <td id="346"></td>
                  <td id="347"></td>
                  <td id="348"></td>
                  <td id="349"></td>
                  <td id="350"></td>
                  <td id="351"></td>
                  <td id="352"></td>
                  <td id="353"></td>
                  <td id="354"></td>
                  <td id="355"></td>
                  <td id="356"></td>
                  <td id="357"></td>
                  <td id="358"></td>
                  <td id="359"></td>
                  <td id="360"></td>
            </tr>
               <tr>
                   <td id="F" rowspan="6">Петък</td>
                   <td id="H">1</td>
                   <td id="361"></td>
                  <td id="362"></td>
                  <td id="363"></td>
                  <td id="364"></td>
                  <td id="365"></td>
                  <td id="366"></td>
                  <td id="367"></td>
                  <td id="368"></td>
                  <td id="369"></td>
                  <td id="370"></td>
                  <td id="371"></td>
                  <td id="372"></td>
                  <td id="373"></td>
                  <td id="374"></td>
                  <td id="375"></td>

               </tr>  
               <tr>
                <td id="H">2</td>
                <td id="376"></td>
                  <td id="377"></td>
                  <td id="378"></td>
                  <td id="379"></td>
                  <td id="380"></td>
                  <td id="381"></td>
                  <td id="382"></td>
                  <td id="383"></td>
                  <td id="384"></td>
                  <td id="385"></td>
                  <td id="386"></td>
                  <td id="387"></td>
                  <td id="388"></td>
                  <td id="389"></td>
                  <td id="390"></td>
            </tr>
            <tr>
                <td id="H">3</td>
                <td id="391"></td>
                  <td id="392"></td>
                  <td id="393"></td>
                  <td id="394"></td>
                  <td id="395"></td>
                  <td id="396"></td>
                  <td id="397"></td>
                  <td id="398"></td>
                  <td id="399"></td>
                  <td id="400"></td>
                  <td id="401"></td>
                  <td id="402"></td>
                  <td id="403"></td>
                  <td id="404"></td>
                  <td id="405"></td>
            </tr>
            <tr>
                <td id="H">4</td>
                <td id="406"></td>
                  <td id="407"></td>
                  <td id="408"></td>
                  <td id="409"></td>
                  <td id="410"></td>
                  <td id="411"></td>
                  <td id="412"></td>
                  <td id="413"></td>
                  <td id="414"></td>
                  <td id="415"></td>
                  <td id="416"></td>
                  <td id="417"></td>
                  <td id="418"></td>
                  <td id="419"></td>
                  <td id="420"></td>
            </tr>
            <tr>
                <td id="H">5</td>
                <td id="421"></td>
                  <td id="422"></td>
                  <td id="423"></td>
                  <td id="424"></td>
                  <td id="425"></td>
                  <td id="426"></td>
                  <td id="427"></td>
                  <td id="428"></td>
                  <td id="429"></td>
                  <td id="430"></td>
                  <td id="431"></td>
                  <td id="432"></td>
                  <td id="433"></td>
                  <td id="434"></td>
                  <td id="435"></td>
            </tr>
            <tr style="border-bottom:double;">
                <td id="H">6</td>
                <td id="436"></td>
                  <td id="437"></td>
                  <td id="438"></td>
                  <td id="439"></td>
                  <td id="440"></td>
                  <td id="441"></td>
                  <td id="442"></td>
                  <td id="443"></td>
                  <td id="444"></td>
                  <td id="445"></td>
                  <td id="446"></td>
                  <td id="447"></td>
                  <td id="448"></td>
                  <td id="449"></td>
                  <td id="450"></td>
            </tr>
            <tr>
                <td id="Sa" rowspan="6"> Събота</td>
               <td id="H">1</td>
               <td id="451"></td>
                  <td id="452"></td>
                  <td id="453"></td>
                  <td id="454"></td>
                  <td id="455"></td>
                  <td id="456"></td>
                  <td id="457"></td>
                  <td id="458"></td>
                  <td id="459"></td>
                  <td id="460"></td>
                  <td id="461"></td>
                  <td id="462"></td>
                  <td id="463"></td>
                  <td id="464"></td>
                  <td id="465"></td>

            </tr>
            <tr>
             <td id="H">2</td>
             <td id="466"></td>
                  <td id="467"></td>
                  <td id="468"></td>
                  <td id="469"></td>
                  <td id="470"></td>
                  <td id="471"></td>
                  <td id="472"></td>
                  <td id="473"></td>
                  <td id="474"></td>
                  <td id="475"></td>
                  <td id="476"></td>
                  <td id="477"></td>
                  <td id="478"></td>
                  <td id="479"></td>
                  <td id="480"></td>
         </tr>
         <tr>
             <td id="H">3</td>
             <td id="481"></td>
                  <td id="482"></td>
                  <td id="483"></td>
                  <td id="484"></td>
                  <td id="485"></td>
                  <td id="486"></td>
                  <td id="487"></td>
                  <td id="488"></td>
                  <td id="489"></td>
                  <td id="490"></td>
                  <td id="491"></td>
                  <td id="492"></td>
                  <td id="493"></td>
                  <td id="494"></td>
                  <td id="495"></td>
         </tr>
         <tr>
             <td id="H">4</td>
             <td id="496"></td>
                  <td id="497"></td>
                  <td id="498"></td>
                  <td id="499"></td>
                  <td id="500"></td>
                  <td id="501"></td>
                  <td id="502"></td>
                  <td id="503"></td>
                  <td id="504"></td>
                  <td id="505"></td>
                  <td id="506"></td>
                  <td id="507"></td>
                  <td id="508"></td>
                  <td id="509"></td>
                  <td id="510"></td>
         </tr>
         <tr>
             <td id="H">5</td>
             <td id="511"></td>
                  <td id="512"></td>
                  <td id="513"></td>
                  <td id="514"></td>
                  <td id="515"></td>
                  <td id="516"></td>
                  <td id="517"></td>
                  <td id="518"></td>
                  <td id="519"></td>
                  <td id="520"></td>
                  <td id="521"></td>
                  <td id="522"></td>
                  <td id="523"></td>
                  <td id="524"></td>
                  <td id="525"></td>
         </tr>
         <tr style="border-bottom:double;">
             <td id="H">6</td>
             <td id="526"></td>
                  <td id="527"></td>
                  <td id="528"></td>
                  <td id="529"></td>
                  <td id="530"></td>
                  <td id="531"></td>
                  <td id="532"></td>
                  <td id="533"></td>
                  <td id="534"></td>
                  <td id="535"></td>
                  <td id="536"></td>
                  <td id="537"></td>
                  <td id="538"></td>
                  <td id="539"></td>
                  <td id="540"></td>
         </tr>
         <tr>
            <td id="Su" rowspan="6"> Неделя</td>
           <td id="H">1</td>
           <td id="541"></td>
                  <td id="542"></td>
                  <td id="543"></td>
                  <td id="544"></td>
                  <td id="545"></td>
                  <td id="546"></td>
                  <td id="547"></td>
                  <td id="548"></td>
                  <td id="549"></td>
                  <td id="550"></td>
                  <td id="551"></td>
                  <td id="552"></td>
                  <td id="553"></td>
                  <td id="554"></td>
                  <td id="555"></td>

        </tr>
        <tr>
         <td id="H">2</td>
         <td id="556"></td>
                  <td id="557"></td>
                  <td id="558"></td>
                  <td id="559"></td>
                  <td id="560"></td>
                  <td id="561"></td>
                  <td id="562"></td>
                  <td id="563"></td>
                  <td id="564"></td>
                  <td id="565"></td>
                  <td id="566"></td>
                  <td id="567"></td>
                  <td id="568"></td>
                  <td id="569"></td>
                  <td id="570"></td>

        </tr>
     <tr>
         <td id="H">3</td>
         <td id="571"></td>
                  <td id="572"></td>
                  <td id="573"></td>
                  <td id="574"></td>
                  <td id="575"></td>
                  <td id="576"></td>
                  <td id="577"></td>
                  <td id="578"></td>
                  <td id="579"></td>
                  <td id="580"></td>
                  <td id="581"></td>
                  <td id="582"></td>
                  <td id="583"></td>
                  <td id="584"></td>
                  <td id="585"></td>

        </tr>
     <tr>
         <td id="H">4</td>
         <td id="586"></td>
                  <td id="587"></td>
                  <td id="588"></td>
                  <td id="589"></td>
                  <td id="590"></td>
                  <td id="591"></td>
                  <td id="592"></td>
                  <td id="593"></td>
                  <td id="594"></td>
                  <td id="595"></td>
                  <td id="596"></td>
                  <td id="597"></td>
                  <td id="598"></td>
                  <td id="599"></td>
                  <td id="600"></td>

        </tr>
        <tr>
             <td id="H">5</td>
             <td id="601"></td>
                  <td id="602"></td>
                  <td id="603"></td>
                  <td id="604"></td>
                  <td id="605"></td>
                  <td id="606"></td>
                  <td id="607"></td>
                  <td id="608"></td>
                  <td id="609"></td>
                  <td id="610"></td>
                  <td id="611"></td>
                  <td id="612"></td>
                  <td id="613"></td>
                  <td id="614"></td>
                  <td id="615"></td>
         </tr>
         <tr style="border-bottom:double;">
             <td id="H">6</td>
             <td id="616"></td>
                  <td id="617"></td>
                  <td id="618"></td>
                  <td id="619"></td>
                  <td id="620"></td>
                  <td id="621"></td>
                  <td id="622"></td>
                  <td id="623"></td>
                  <td id="624"></td>
                  <td id="625"></td>
                  <td id="626"></td>
                  <td id="627"></td>
                  <td id="628"></td>
                  <td id="629"></td>
                  <td id="630"></td>
         </tr>
           </table>

           <?php
            function day_of_week($date) {
                $weekday = date('w', strtotime($date));
                switch ($weekday) 
                {
                    case 0: return "Sunday"; break;
                    case 1: return "Monday"; break;
                    case 2: return "Tuesday"; break;
                    case 3: return "Wednesday"; break;
                    case 4: return "Thursday"; break;
                    case 5: return "Friday"; break;
                    case 6: return "Saturday"; break;
                    default: echo "Error!";
                }
            }
        ?>

           <script>
               function writeDataLecture(res,index,dur) {
                    document.getElementById(index).innerHTML = res;
                            
                    let i = 1;
                    while (i < 6 ) {
                        i = i + 1;
                        let z = index+15*(i-1);
                        document.getElementById(z).innerHTML = res;
                    }
                    const table = document.querySelector("scheduletable");
                    let headerCell = null;
                    let j = 0;
                    while (j < 6 ) {
                        j = j + 1;
                        let p = index+15*(j-1);
                        const firstCell = document.getElementById(p);
                                                
                        if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
                            headerCell = firstCell;
                        } 
                        else {
                            headerCell.rowSpan++;
                            firstCell.remove();
                        }                        
                    }

                    var k = 0;
                    while (k < 6) {
                        k = k+1;
                        var d = 1;
                        const firstCell = document.getElementById(index+d+15*(k-1));
                        document.getElementById(index).colSpan = dur;
                        while(d < dur) {
                            headerCell = document.getElementById(index+d+15*(k-1));
                            headerCell.remove();
                            d = d+1;
                        }
                    }            
                    document.getElementById(index).style.backgroundColor = "#FFF8DC"; 
                    //document.getElementById(index).style.border = "double";                                                          
               }
            </script>

            
           <script>

               function writeDataUpr(res,index,dur) {

                     document.getElementById(index).innerHTML = res;   
                     var d = 1;
                     const firstCell = document.getElementById(index+d);
                    document.getElementById(index).colSpan = dur;
                    while(d < dur) {
                        headerCell = document.getElementById(index+d);
                        headerCell.remove();
                        d = d+1;

                    }
                    
                    document.getElementById(index).style.backgroundColor = "#FFF8DC";
                    //document.getElementById(index).style.border = "double";  
               }
            </script>

<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $conn->prepare("SELECT s.subject, s.start_hour, s.group, s.is_lecture, s.duration, s.date, s.specialty, s.course, 
   u.first_name, u.last_name, r.building, r.room FROM schedule s left join room r on (s.id_room = r.id)
                                                                 left join user u on (s.id_teacher=u.id)");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()){
        $result = $row['subject'].",".$row['building'].",".$row['room'].",".$row['first_name']." ".$row['last_name'];
        //$day = $row['day_of_week'];
        $hour = $row['start_hour'];
        $group = $row['group'];
        $islecture = $row['is_lecture'];
        $duration = $row['duration'];
        $date = $row['date'];
        $day = day_of_week($date);
        $course = $row['course'];
        $specialty = $row['specialty'];

        $wanted_date = $_SESSION['date'];
        $wanted_course = $_SESSION['course'];
        $wanted_specialty = $_SESSION['specialty'];
        
        $begin = new DateTime( date("Y-m-d", strtotime('monday this week', strtotime($wanted_date))) );
        $end   = new DateTime( date("Y-m-d", strtotime('sunday this week', strtotime($wanted_date))) );
        $ok = 0;
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            if($date === $i->format("Y-m-d")) {
                $ok = 1;
            }
        }

        if($ok === 1 && $wanted_course === $course && $wanted_specialty === $specialty){

        echo "<script>dur = '$duration'</script>";
        switch($day)
        {
            case "Monday": 
                echo "<script>d = '$date'</script>";
                echo' <script> ',
                               'document.getElementById("M").innerHTML = "Понеделник ".concat (d)',
                               '</script>';
                switch($hour)
                {
                    case 7:

                        switch($islecture)
                        {
                            case 0: 

                              {  switch($group)
                                {
                                    case 1: 

                                            {echo "<script>res = '$result'</script>";
                                            echo '<script>',
                                                'writeDataUpr(res,1,dur);',
                                                '</script>';
                                        
                                        break;}
                                    
                            case 2: 
                                {
                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,16,dur);',
                                        '</script>';
                                break;
                                }

                            case 3:                                         
                                {
                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,31,dur);',
                                        '</script>';
                                break;
                                }
                            case 4: 
                                {
                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,46,dur);',
                                        '</script>';
                                break;
                                }
                                case 5: 
                                    {
                                        echo "<script>res = '$result'</script>";
                                        echo '<script>',
                                            'writeDataUpr(res,61,dur);',
                                            '</script>';
                                    break;
                                    }
                                    case 6: 
                                        {
                                            echo "<script>res = '$result'</script>";
                                            echo '<script>',
                                                'writeDataUpr(res,76,dur);',
                                                '</script>';
                                        break;
                                        }

                                default:
                                echo "Error!";    
                        }
                    break;}
                    
                        case 1:   

                            { echo "<script>res = '$result'</script>";
                             echo '<script>',
                            'writeDataLecture(res,1,dur);',
                            '</script>';
                        break;}

                    default:
                    echo "Error!";
                }
            break;

            case 8:

                switch($islecture)
                {
                    case 0: 

                        switch($group)
                        {
                            case 1: 

                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,2,dur);',
                                        '</script>';
                                
                                break;
                            
                    case 2: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,17,dur);',
                                '</script>';
                        break;
                        }

                    case 3:                                         
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,32,dur);',
                                '</script>';
                        break;
                        }
                    case 4: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,47,dur);',
                                '</script>';
                        break;
                        }
                        case 5: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,62,dur);',
                                    '</script>';
                            break;
                            }
                            case 6: 
                                {
                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,77,dur);',
                                        '</script>';
                                break;
                                }

                        default:
                        echo "Error!";    
                }
            break;
                case 1:   

                     echo "<script>res = '$result'</script>";
                     echo '<script>',
                    'writeDataLecture(res,2,dur);',
                    '</script>';
                break;

            default:
            echo "Error!";
        }
    break;
        case 9:

            switch($islecture)
            {
                case 0: 

                    switch($group)
                    {
                        case 1: 

                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,3,dur);',
                                    '</script>';
                            
                            break;
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,18,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,33,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,48,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,63,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,78,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;
            case 1:   

                 echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,3,dur);',
                '</script>';
            break;

        default:
        echo "Error!";
    }

    break;

    case 10:

        switch($islecture)
        {
            case 0: 

                switch($group)
                {
                    case 1: 

                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,4,dur);',
                                '</script>';
                        
                        break;
                    
            case 2: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,19,dur);',
                        '</script>';
                break;
                }

            case 3:                                         
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,34,dur);',
                        '</script>';
                break;
                }
            case 4: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,49,dur);',
                        '</script>';
                break;
                }
                case 5: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,64,dur);',
                            '</script>';
                    break;
                    }
                    case 6: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,79,dur);',
                                '</script>';
                        break;
                        }

                default:
                echo "Error!";    
        }
    break;
        case 1:   

             echo "<script>res = '$result'</script>";
             echo '<script>',
            'writeDataLecture(res,4,dur);',
            '</script>';
        break;

    default:
    echo "Error!";
}

break;

case 11:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,5,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,20,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,35,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,50,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,65,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,80,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,5,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 12:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,6,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,21,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,36,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,51,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,66,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,81,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;

    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,6,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 13:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,7,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,22,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,37,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,52,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,67,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,82,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,7,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 14:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,8,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,23,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,38,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,53,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,68,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,83,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,8,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 15:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,9,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,24,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,39,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,54,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,69,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,84,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,9,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 16:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,10,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,25,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,40,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,55,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,70,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,85,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,10,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 17:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,11,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,26,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,41,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,56,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,71,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,86,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,11,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 18:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,12,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,27,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,42,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,57,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,72,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,87,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,12,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 19:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,13,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,28,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,43,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,58,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,73,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,88,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,13,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 20:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,14,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,29,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,44,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,59,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,74,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,89,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,14,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 21:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,15,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,30,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,45,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,60,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,75,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,90,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,15,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

            default:
            echo "Error!";
        }
    break;


    case "Tuesday": 
        echo "<script>d = '$date'</script>";
        echo' <script> ',
                       'document.getElementById("Tu").innerHTML = "Вторник ".concat (d)',
                       '</script>';
                
        switch($hour)
        {
            case 7:

                switch($islecture)
                {
                    case 0: 

                      {  switch($group)
                        {
                            case 1: 

                                    {echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,91,dur);',
                                        '</script>';
                                
                                break;}
                            
                    case 2: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,106,dur);',
                                '</script>';
                        break;
                        }

                    case 3:                                         
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,121,dur);',
                                '</script>';
                        break;
                        }
                    case 4: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,136,dur);',
                                '</script>';
                        break;
                        }
                        case 5: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,151,dur);',
                                    '</script>';
                            break;
                            }
                            case 6: 
                                {
                                    echo "<script>res = '$result'</script>";
                                    echo '<script>',
                                        'writeDataUpr(res,166,dur);',
                                        '</script>';
                                break;
                                }

                        default:
                        echo "Error!";    
                }
            break;}
            
                case 1:   

                    { echo "<script>res = '$result'</script>";
                     echo '<script>',
                    'writeDataLecture(res,91,dur);',
                    '</script>';
                break;}

            default:
            echo "Error!";
        }
    break;

    case 8:

        switch($islecture)
        {
            case 0: 

                switch($group)
                {
                    case 1: 

                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,92,dur);',
                                '</script>';
                        
                        break;
                    
            case 2: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,107,dur);',
                        '</script>';
                break;
                }

            case 3:                                         
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,122,dur);',
                        '</script>';
                break;
                }
            case 4: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,137,dur);',
                        '</script>';
                break;
                }
                case 5: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,152,dur);',
                            '</script>';
                    break;
                    }
                    case 6: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,167,dur);',
                                '</script>';
                        break;
                        }

                default:
                echo "Error!";    
        }
    break;
        case 1:   

             echo "<script>res = '$result'</script>";
             echo '<script>',
            'writeDataLecture(res,92,dur);',
            '</script>';
        break;

    default:
    echo "Error!";
}
break;
case 9:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,93,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,108,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,123,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,138,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,153,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,168,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,93,dur);',
        '</script>';
    break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,94,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,109,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,124,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,139,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,154,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,169,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,94,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,95,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,110,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,125,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,140,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,155,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,170,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,95,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,96,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,111,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,126,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,141,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,156,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,171,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;

case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,96,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,97,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,112,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,127,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,142,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,157,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,172,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,97,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,98,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,113,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,128,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,143,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,158,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,173,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,98,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,99,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,114,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,129,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,144,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,159,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,174,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,99,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,100,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,115,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,130,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,145,dur;',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,160,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,175,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,100,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,101,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,116,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,131,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,146,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,161,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,176,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,101,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,102,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,117,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,132,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,147,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,162,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,177,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,102,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,103,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,118,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,133,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,148,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,163,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,178,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,103,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,104,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,119,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,134,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,149,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,164,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,179,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,104,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,105,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,120,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,135,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,150,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,165,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,180,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,105,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

    default:
    echo "Error!";
}
break;

case "Wednesday": 
    echo "<script>d = '$date'</script>";
    echo' <script> ',
                   'document.getElementById("W").innerHTML = "Сряда ".concat (d)',
                   '</script>';
    switch($hour)
    {
        case 7:

            switch($islecture)
            {
                case 0: 

                  {  switch($group)
                    {
                        case 1: 

                                {echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,181,dur);',
                                    '</script>';
                            
                            break;}
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,196,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,211,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,226,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,241,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,256,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;}
        
            case 1:   

                { echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,181,dur);',
                '</script>';
            break;}

        default:
        echo "Error!";
    }
break;

case 8:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,182,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,197,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,212,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,227,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,242,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,257,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,182,dur);',
        '</script>';
    break;

default:
echo "Error!";
}
break;
case 9:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,183,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,198,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,213,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,228,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,243,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,258,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,183,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,184,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,199,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,214,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,229,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,244,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,259,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,184,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,185,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,200,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,215,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,230,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,245,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,260,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,185,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,186,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,201,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,216,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,231,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,246,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,261,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;

case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,186,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,187,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,202,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,217,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,232,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,247,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,262,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,187,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,188,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,203,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,218,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,233,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,248,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,263,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,188,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,189,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,204,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,219,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,234,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,249,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,263,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,189,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,190,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,205,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,220,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,235,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,250,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,265,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,190,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,191,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,206,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,221,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,236,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,251,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,266,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,191,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,192,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,207,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,222,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,237,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,252,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,267,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,192,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,193,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,208,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,223,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,238,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,253,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,269,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,193,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,194,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,209,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,224,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,239,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,254,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,269,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,194,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,195,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,210,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,225,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,240,dur);',
        '</script>';
break;
}

default:
echo "Error!";    
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,255,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,270,dur);',
                '</script>';
        break;
        }
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,195,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

default:
echo "Error!";
}
break;

case "Thursday": 
    echo "<script>d = '$date'</script>";
    echo' <script> ',
                   'document.getElementById("Th").innerHTML = "Четвъртък ".concat (d)',
                   '</script>';
                
    switch($hour)
    {
        case 7:

            switch($islecture)
            {
                case 0: 

                  {  switch($group)
                    {
                        case 1: 

                                {echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,271,dur);',
                                    '</script>';
                            
                            break;}
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,286,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,301,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,316,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,331,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,346,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;}
        
            case 1:   

                { echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,271,dur);',
                '</script>';
            break;}

        default:
        echo "Error!";
    }
break;

case 8:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,272,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,287,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,302,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,317,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,332,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,347,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,272,dur);',
        '</script>';
    break;

default:
echo "Error!";
}
break;
case 9:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,273,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,288,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,303,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,318,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,333,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,348,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,273,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,274,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,289,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,304,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,319,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,334,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,349,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,274,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,275,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,290,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,305,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,320,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,335,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,350,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,275,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,276,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,291,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,306,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,321,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,336,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,351,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;

case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,276,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,277,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,292,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,307,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,322,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,337,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,352,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,277,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,278,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,293,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,318,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,333,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,348,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,363,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,278,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,279,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,294,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,309,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,324,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,339,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,354,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,279,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,280,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,295,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,310,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,325,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,340,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,355,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,280,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,281,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,296,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,311,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,326,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,341,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,356,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,281,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,282,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,297,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,312,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,327,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,342,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,357,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,282,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,283,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,298,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,313,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,328,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,343,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,358,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,283,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,284,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,299,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,314,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,329,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,334,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,359,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,284,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,285,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,300,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,315,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,330,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,345,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,360,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,285);',
'</script>';
break;

default:
echo "Error!";
}

break;

default:
echo "Error!";
}
break;

case "Friday": 
    echo "<script>d = '$date'</script>";
    echo' <script> ',
                   'document.getElementById("F").innerHTML = "Петък ".concat (d)',
                   '</script>';
                
    switch($hour)
    {
        case 7:

            switch($islecture)
            {
                case 0: 

                  {  switch($group)
                    {
                        case 1: 

                                {echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,361,dur);',
                                    '</script>';
                            
                            break;}
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,376,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,391,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,406,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,421,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,436,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;}
        
            case 1:   

                { echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,361,dur);',
                '</script>';
            break;}

        default:
        echo "Error!";
    }
break;

case 8:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,362,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,377,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,392,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,407,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,422,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,437,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,362,dur);',
        '</script>';
    break;

default:
echo "Error!";
}
break;
case 9:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,363,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,378,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,393,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,408,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,423,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,438,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,363,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,364,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,379,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,394,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,409,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,424,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,439,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,244,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,365,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,380,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,395,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,410,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,425,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,440,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,365,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,366,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,381,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,396,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,411,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,426,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,449,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;

case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,366,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,367,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,382,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,397,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,412,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,427,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,442,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,367,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,368,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,383,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,398,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,413,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,428,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,443,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,368,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,369,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,384,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,399,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,414,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,429,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,444,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,369,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,370,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,385,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,400,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,415,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,430,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,445,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,370,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,371,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,386,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,401,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,416,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,431,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,446,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,371,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,372,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,387,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,402,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,417,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,432,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,447,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,372,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,373,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,388,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,403,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,418,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,433,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,448,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,373,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,374,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,389,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,404,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,419,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,434,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,449,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,374,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,375,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,390,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,405,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,420,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,435,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,450,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,375,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

default:
echo "Error!";
}
break;

case "Saturday": 
    echo "<script>d = '$date'</script>";
    echo' <script> ',
                   'document.getElementById("Sa").innerHTML = "Събота ".concat (d)',
                   '</script>';
                
    switch($hour)
    {
        case 7:

            switch($islecture)
            {
                case 0: 

                  {  switch($group)
                    {
                        case 1: 

                                {echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,451,dur);',
                                    '</script>';
                            
                            break;}
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,466,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,481,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,496,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,511,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,526,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;}
        
            case 1:   

                { echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,451,dur);',
                '</script>';
            break;}

        default:
        echo "Error!";
    }
break;

case 8:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,452,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,467,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,482,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,497,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,512,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,527,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,452,dur);',
        '</script>';
    break;

default:
echo "Error!";
}
break;
case 9:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,453,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,468,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,483,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,498,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,513,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,528,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,453,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,454,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,469,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,484,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,499,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,514,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,529,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,454,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,455,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,470,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,485,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,500,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,515,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,530,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,455,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,456,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,471,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,486,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,501,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,516,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,531,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;

case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,456,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,457,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,472,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,487,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,502,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,517,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,532,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,457,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,458,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,473,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,488,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,503,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,518,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,533,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,458,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,459,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,474,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,489,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,504,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,519,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,534,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,459,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,460,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,475,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,490,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,505,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,520,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,535,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,460,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,461,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,476,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,491,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,506,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,521,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,536,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,461,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,462,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,477,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,492,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,507,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,522,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,537,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,462,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,463,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,478,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,493,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,508,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,523,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,538,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,463,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,464,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,479,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,494,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,509,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,524,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,539,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,464,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,465,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,480,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,495,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,510,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,525,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,540,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,465,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

default:
echo "Error!";
}
break;

case "Sunday": 
    echo "<script>d = '$date'</script>";
    echo' <script> ',
                   'document.getElementById("Su").innerHTML = "Неделя ".concat (d)',
                   '</script>';
                
    switch($hour)
    {
        case 7:

            switch($islecture)
            {
                case 0: 

                  {  switch($group)
                    {
                        case 1: 

                                {echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,541,dur);',
                                    '</script>';
                            
                            break;}
                        
                case 2: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,556,dur);',
                            '</script>';
                    break;
                    }

                case 3:                                         
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,571,dur);',
                            '</script>';
                    break;
                    }
                case 4: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,586,dur);',
                            '</script>';
                    break;
                    }
                    case 5: 
                        {
                            echo "<script>res = '$result'</script>";
                            echo '<script>',
                                'writeDataUpr(res,601,dur);',
                                '</script>';
                        break;
                        }
                        case 6: 
                            {
                                echo "<script>res = '$result'</script>";
                                echo '<script>',
                                    'writeDataUpr(res,616,dur);',
                                    '</script>';
                            break;
                            }

                    default:
                    echo "Error!";    
            }
        break;}
        
            case 1:   

                { echo "<script>res = '$result'</script>";
                 echo '<script>',
                'writeDataLecture(res,541,dur);',
                '</script>';
            break;}

        default:
        echo "Error!";
    }
break;

case 8:

    switch($islecture)
    {
        case 0: 

            switch($group)
            {
                case 1: 

                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,542,dur);',
                            '</script>';
                    
                    break;
                
        case 2: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,557,dur);',
                    '</script>';
            break;
            }

        case 3:                                         
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,572,dur);',
                    '</script>';
            break;
            }
        case 4: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,587,dur);',
                    '</script>';
            break;
            }
            case 5: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,602,dur);',
                        '</script>';
                break;
                }
                case 6: 
                    {
                        echo "<script>res = '$result'</script>";
                        echo '<script>',
                            'writeDataUpr(res,617,dur);',
                            '</script>';
                    break;
                    }

            default:
            echo "Error!";    
    }
break;
    case 1:   

         echo "<script>res = '$result'</script>";
         echo '<script>',
        'writeDataLecture(res,542,dur);',
        '</script>';
    break;

default:
echo "Error!";
}
break;
case 9:

switch($islecture)
{
    case 0: 

        switch($group)
        {
            case 1: 

                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,543,dur);',
                        '</script>';
                
                break;
            
    case 2: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,558,dur);',
                '</script>';
        break;
        }

    case 3:                                         
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,573,dur);',
                '</script>';
        break;
        }
    case 4: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,588,dur);',
                '</script>';
        break;
        }
        case 5: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,603,dur);',
                    '</script>';
            break;
            }
            case 6: 
                {
                    echo "<script>res = '$result'</script>";
                    echo '<script>',
                        'writeDataUpr(res,618,dur);',
                        '</script>';
                break;
                }

        default:
        echo "Error!";    
}
break;
case 1:   

     echo "<script>res = '$result'</script>";
     echo '<script>',
    'writeDataLecture(res,543,dur);',
    '</script>';
break;

default:
echo "Error!";
}

break;

case 10:

switch($islecture)
{
case 0: 

    switch($group)
    {
        case 1: 

                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,544,dur);',
                    '</script>';
            
            break;
        
case 2: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,559,dur);',
            '</script>';
    break;
    }

case 3:                                         
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,574,dur);',
            '</script>';
    break;
    }
case 4: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,589,dur);',
            '</script>';
    break;
    }
    case 5: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,604,dur);',
                '</script>';
        break;
        }
        case 6: 
            {
                echo "<script>res = '$result'</script>";
                echo '<script>',
                    'writeDataUpr(res,619,dur);',
                    '</script>';
            break;
            }

    default:
    echo "Error!";    
}
break;
case 1:   

 echo "<script>res = '$result'</script>";
 echo '<script>',
'writeDataLecture(res,544,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 11:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,545,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,560,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,575,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,590,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,605,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,620,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,545,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 12:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,546,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,561,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,576,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,591,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,606,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,621,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;

case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,546,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 13:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,547,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,562,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,577,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,592,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,607,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,622,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,547,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 14:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,548,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,563,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,578,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,593,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,608,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,623,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,548,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 15:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,549,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,564,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,579,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,594,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,609,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,624,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,549,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 16:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,550,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,565,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,580,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,595,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,610,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,625,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,550,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 17:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,551,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,566,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,581,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,596,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,611,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,626,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,551,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 18:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,552,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,567,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,582,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,597,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,612,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,627,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,552,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 19:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,553,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,568,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,583,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,598,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,613,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,628,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,553,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 20:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,554,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,569,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,584,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,599,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,614,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,629,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,554,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

case 21:

switch($islecture)
{
case 0: 

switch($group)
{
    case 1: 

            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,555,dur);',
                '</script>';
        
        break;
    
case 2: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,570,dur);',
        '</script>';
break;
}

case 3:                                         
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,585,dur);',
        '</script>';
break;
}
case 4: 
{
    echo "<script>res = '$result'</script>";
    echo '<script>',
        'writeDataUpr(res,600,dur);',
        '</script>';
break;
}
case 5: 
    {
        echo "<script>res = '$result'</script>";
        echo '<script>',
            'writeDataUpr(res,615,dur);',
            '</script>';
    break;
    }
    case 6: 
        {
            echo "<script>res = '$result'</script>";
            echo '<script>',
                'writeDataUpr(res,630,dur);',
                '</script>';
        break;
        }

default:
echo "Error!";    
}
break;
case 1:   

echo "<script>res = '$result'</script>";
echo '<script>',
'writeDataLecture(res,555,dur);',
'</script>';
break;

default:
echo "Error!";
}

break;

default:
echo "Error!";
}
break;


    default:
    echo "Error!";
}
        echo'</script>';


    }
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

    ?>





            
</body>
</html>

<?php
    unset($_SESSION["spec"]);
?>