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

<script>
function writeUser(){
  let username = <?php echo json_encode($_SESSION['username']); ?>;
  if(username == null){
    username = 'Guest';
    document.getElementById("acct").innerHTML = "Have an account? Login below:";
    document.getElementById("guest").innerHTML = "<form action = 'loggingIn.php' method = 'POST'> Username: <input type='text' name='user'> <br> Password: <input type='password' name='pass'> <br><input type = 'submit' id = 'info' value = 'Log In'> </form>";
    document.getElementById("creation").innerHTML = "New here? Make an account";
    document.getElementById("new").innerHTML = "<form action ='createuser.php' method = 'POST'> <input type = 'submit' id = 'logout' value = 'Create Account'> </form>";
  }
  else{
  let newthing = "Welcome, " + username; 
  document.getElementById('currentuser').innerHTML = newthing;
  document.getElementById('guest').innerHTML = "<form action = 'accountInfo.php'> <input type = 'submit' id = 'info' value = 'My Account'> </form> <form action ='logout.php'> <input type = 'submit' id = 'logout' value = 'Logout'> </form>";
}
}
document.addEventListener("DOMContentLoaded", writeUser, false);
</script>
<p id = 'currentuser'></p>
<p id = 'acct'></p>
<p id = 'guest'></p>
<p id = 'creation'></p>
<p id = 'new'></p>

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
  <li><span id= "1">-</span></li>

  <li><span id= "2">-</span></li>

  <li><span id= "3">-</span></li>

  <li><span id= "4">-</span></li>

  <li><span id= "5">-</span></li>

  <li><span id= "6">-</span></li>

  <li><span id= "7">-</span></li>

<!-- Row 2 -->
  <li><span id= "8">-</span></li>

  <li><span id= "9">-</span></li>

  <li><span id= "10">-</span></li>

  <li><span id= "11">-</span></li>

  <li><span id= "12">-</span></li>

  <li><span id= "13">-</span></li>

  <li><span id= "14">-</span></li>

<!-- Row 3 -->

  <li><span id= "15">-</span></li>

  <li><span id= "16">-</span></li>

  <li><span id= "17">-</span></li>

  <li><span id= "18">-</span></li>

  <li><span id= "19">-</span></li>

  <li><span id= "20">-<!--<span class="event">*</span>--></span></li>

  <li><span id= "21">-</span></li>

<!-- Row 4 -->

  <li><span id= "22">-</span></li>

  <li><span id= "23">-</span></li>

  <li><span id= "24">-</span></li>

  <li><span id= "25">-</span></li>

  <li><span id= "26">-</span></li>

  <li> <span id= "27">-</span></li>

  <li><span id= "28">-</span></li>

<!-- Row 5 -->

  <li><span id= "29">-</span></li>

  <li><span id= "30">-</span></li>

  <li><span id= "31">-</span></li>

  <li><span id= "32">-</span></li>

  <li><span id= "33">-</span></li>

  <li><span id= "34">-</span></li>

  <li><span id= "35">-</span></li>

  <!-- Row 6 -->

  <li><span id= "36">-</span></li>

  <li><span id= "37">-</span></li>

  <li><span id= "38">-</span></li>

  <li><span id= "39">-</span></li>

  <li><span id= "40">-</span></li>

  <li><span id= "41">-</span></li>

  <li><span id= "42">-</span></li>

</ul>

<div class="window-popup" >
  <div class="wp-content">
    <form action="/calendar.php"> can you deal with this
      Date: <input type = 'date' name = 'date' id='date' value='2018-10-22' required> <br>
      Time: <input type = 'time' name = 'time' id='time' required> <br> <br>
      Event Title: <input type = 'text' name = 'title' id='eventTitle' required> <br>
      Description:<input type = 'text' name = 'description' id='eventDescription'> <br>
      Tags?<input type = 'text' name = 'tags' id ='tags'> <br> <br>
      <input type = 'submit'class='button' value = 'Create New Event' id='test'>
    </form>

    <a href="#" class="button" id="button-popup-close">Close</a>

   </div> 
</div>

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
document.getElementById('test').addEventListener("click",makeNewEvent,false);
</script>
</body>
</html>