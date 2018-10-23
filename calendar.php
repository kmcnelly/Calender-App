<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style.css">

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!--Calendar Dates-->
  <script src="calendar.min.js"></script>
 
</head>
<body>

<p>Today's Date: <span id=curDate></span></p>
<input id="date" type="text" size="8" />
<p id = 'currentuser'></p>
<script type="text/javascript" >
function writeUser(){
  let username = <?php echo json_encode($_SESSION['username']); ?>;
  let newthing = "Welcome, " + username; 
  document.getElementById('currentuser').innerHTML = newthing;
}
  document.addEventListener("DOMContentLoaded", writeUser, false);
</script>
<form action = "accountInfo.php">
<input type = 'submit' id = 'info' value = 'My Account'>
</form>
<input type = 'submit' id = 'logout' value = 'Logout'>

<div class="month">      
  <ul>
    <li class="prev"><span id="prev">&#10094;</span></li>
    <li class="next" id="next">&#10095;</li>
    <li>
      <span id="curMonth">October</span>
      <br>
      <span style="font-size:18px" id="curYear">2018</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Sun</li>
  <li>Mon</li>
  <li>Tues</li>
  <li>Wed</li>
  <li>Thur</li>
  <li>Fri</li>
  <li>Sat</li>
</ul>

<ul class="days">  
<!-- Row 1 -->
  <li id= "1"><span class="active">1</span></li>

  <li id= "2"><span class="">2</span></li>

  <li id= "3"><span>3</span></li>

  <li id= "4"><span>4</span></li>

  <li id= "5"><span>5</span></li>

  <li id= "6"><span>6</span></li>

  <li id= "7"><span>7</span></li>

<!-- Row 2 -->
  <li id= "8"><span>8</span></li>

  <li id= "9"><span>9</span></li>

  <li id= "10"><span>10</span></li>

  <li id= "11"><span>11</span></li>

  <li id= "12"><span>12</span></li>

  <li id= "13"><span>13</span></li>

  <li id= "14"><span>14</span></li>

<!-- Row 3 -->

  <li id= "15"><span>15</span></li>

  <li id= "16"><span>16</span></li>

  <li id= "17"><span>17</span></li>

  <li id= "18"><span>18</span></li>

  <li id= "19"><span>19</span></li>

  <li id= "20"><span>20<!--<span class="event">*</span>--></span></li>

  <li id= "21"><span>21</span></li>

<!-- Row 4 -->

  <li id= "22"><span>22</span></li>

  <li id= "23"><span>23</span></li>

  <li id= "24"><span>24</span></li>

  <li id= "25"><span>25</span></li>

  <li id= "26"><span>26</span></li>

  <li id= "27"><span>27</span></li>

  <li id= "28"><span>28</span></li>

<!-- Row 5 -->

  <li id= "29"><span>29</span></li>

  <li id= "30"><span>30</span></li>

  <li id= "31"><span>31</span></li>

  <li id= "32"><span></span></li>

  <li id= "33"><span></span></li>

  <li id= "34"><span></span></li>

  <li id= "35"><span></span></li>

</ul>

<script src="ui.js" type="text/javascript"></script>
<script src="calendar.min.js" type="text/javascript"></script>
<script src="createEvent.js" type="text/javascript"></script>

<script>
function makeNewEvent(){
  let date = document.getElementById("date").value;
  let time = document.getElementById("time").value;
  let title = document.getElementById("title").value;
  let desc = document.getElementById("description").value;
  let tags = document.getElementById("tags").value;
  createEvent(date,time,title,desc,tags);
}
document.getElementById("test").addEventListener("click",makeNewEvent,false);
</script>
  <input type = 'date' name = 'date' id='date'> date <br>
  <input type = 'time' name = 'time' id='time'> time <br>
  <input type = 'text' name = 'title' id='title'> title <br>
  <input type = 'text' name = 'description' id='description'> description <br>
  <input type = 'text' name = 'tags' id ='tags'> tags <br>
  <input type = 'Create New Event' id='test'>
</body>
</html>