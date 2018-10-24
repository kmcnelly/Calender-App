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
    document.getElementById("new").innerHTML = "<form action ='createuser.php' method = 'POST'>Username: <input type='text' name='user'> <br> Password: <input type='password' name='pass'> <br> <input type = 'submit' id = 'ca' value = 'Create Account'> </form>";
  }
  else{
  let newthing = "Welcome, " + username; 
  document.getElementById('currentuser').innerHTML = newthing;
  document.getElementById('guest').innerHTML = "<form action = 'accountInfo.php' method='POST'> <input type = 'hidden' name = 'token' value = '<?php echo $_SESSION['token'];?>'> <input type = 'submit' id = 'info' value = 'My Account'> </form> <form action ='logout.php'> <input type = 'submit' id = 'logout' value = 'Logout'> </form>";
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

  <li><span id= "20">-</span></li>

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
    <h1><span id="selectedDate">Date: </span></h1>

    <div>
    <p>Add Event:</p>
      <form id='creation'>
        Date: <input type = 'date' name = 'date' id='eventDate' value='2018-10-22' required> <br>
        Time: <input type = 'time' name = 'time' id='eventTime' required> <br> <br>
        Title: <input type = 'text' name = 'title' id='eventTitle' value='' required> <br>
        Description: <input type = 'text' name = 'description' id='eventDescription' value=''> <br>
        Tags: <span class="school"><input type = 'radio' name = 'category' value ='school'>School. </span>
              <span class="fun"><input type = 'radio' name = 'category' value ='fun'>Fun. </span>
              <span class="family"><input type = 'radio' name = 'category' value ='family'>Family. </span>
              <span class="other"><input type = 'radio' name = 'category' value ='other'>Other. </span>
              <span><input type = 'radio' name = 'category' value ='none' checked="">None. </span>
        <br> <br>
        <input type = 'button' class='button' value = 'Create New Event' id='addEvent'>
      </form>
    </div>
    <br> <br>
    <div>
      <input type = 'date' id ='datetest'>

      <input type = 'submit' id='su'>
      Filter: <span><input type = 'radio' name = 'filter' value ='school'>School. </span>
              <span><input type = 'radio' name = 'filter' value ='fun'>Fun. </span>
              <span><input type = 'radio' name = 'filter' value ='family'>Family. </span>
              <span><input type = 'radio' name = 'filter' value ='other'>Other. </span>
              <span><input type = 'radio' name = 'filter' value ='none' checked="">None. </span>
      <p id='success'></p>
      <p id='daily'></p>
      <p id='elim'></p>
      <script>
      function getEvents(){
        let date = document.getElementById("datetest").value;
        let fdate = "date="+date;
        // alert(fdate);
          if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("daily").innerHTML = this.responseText;
                  }
              };
              // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xmlhttp.open("GET","generatesDailyEvents.php?date="+date,false);
              // let data = fdate;
              // alert(data);
              xmlhttp.send();
      }
      document.getElementById('su').addEventListener("click",getEvents,false);
      </script>
      Delete an event:<input type = 'number' id = 'eid'>
      <input type = 'submit' id = 'del' value = 'Delete'>
      <script>
      function getEvents(){
        let eid = document.getElementById("eid").value;
        // alert(fdate);
          if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("elim").innerHTML = this.responseText;
                  }
              };
              // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xmlhttp.open("GET","deleteEvent.php?eid="+eid,false);
              // let data = fdate;
              // alert(data);
              xmlhttp.send();
      }
      document.getElementById('del').addEventListener("click",getEvents,false);
      </script>
    </div>
    
    <a id="button-popup-close">Close</a>

   </div> 
</div>

<script src="ui.js" type="text/javascript"></script>
<script src="calendar.min.js" type="text/javascript"></script>
<script src="createEvent.js" type="text/javascript"></script>

<input type = 'date' id ='datetest'>
<input type = 'submit' id='su'>
<input type = 'number' id = 'eid'>
<input type = 'submit' id = 'del' value = 'Delete'>
<p id='daily'></p>
<p id='elim'></p>
<p id='mod'></p>
<p>Modify an Event:</p>
Event ID: <input type = 'number' id = 'meid'>
Date: <input type = 'date' name = 'date' id='eventDate1' value='2018-10-22'> <br>
      Time: <input type = 'time' name = 'time' id='eventTime1'> <br> <br>
      Title: <input type = 'text' name = 'title' id='eventTitle1' value=''> <br>
      Description: <input type = 'text' name = 'description' id='eventDescription1' value=''> <br>
      Tags: <span class="school"><input type = 'radio' name = 'category1' value ='school'>School. </span>
            <span class="fun"><input type = 'radio' name = 'category1' value ='fun'>Fun. </span>
            <span class="family"><input type = 'radio' name = 'category1' value ='family'>Family. </span>
            <span class="other"><input type = 'radio' name = 'category1' value ='misc'>Other. </span>
            <span><input type = 'radio' name = 'category1' value ='none'>None. </span>
            <span><input type = 'radio' name = 'category1' value ='' checked="">Same. </span>
      <br> <br>
      <input type = 'button' class='button' value = 'Modify Event' id='modEvent'>

<script>
function getEvents(){
  let date = document.getElementById("datetest").value;
  let fdate = "date="+date;
  // alert(fdate);
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("daily").innerHTML = this.responseText;
            }
        };
        // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.open("GET","generatesDailyEvents.php?date="+date,false);
        // let data = fdate;
        // alert(data);
        xmlhttp.send();
}
document.getElementById('su').addEventListener("click",getEvents,false);
function deleteE(){
  let eid = document.getElementById("eid").value;
  let data = new FormData();
    data.append('eid', eid);
  // alert(fdate);
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("elim").innerHTML = this.responseText;
            }
        };
        // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.open("POST","deleteEvent.php",false);
        // let data = fdate;
        // alert(data);
        xmlhttp.send(data);
        getEvents();
}
document.getElementById('del').addEventListener("click",deleteE,false);
function changeE(){
  let date;
  let time;
  let title;
  let desc;
  let meid = document.getElementById("meid").value;
  if(document.getElementById("eventDate1") != null){
  date = document.getElementById("eventDate1").value;
  }
  else{
  date = null;
  }
  if(document.getElementById("eventTime1") != null){
  time = document.getElementById("eventTime1").value;
  }
  else{
  time = null;
  }
  if(document.getElementById("eventTitle1") != null){
  title = document.getElementById("eventTitle1").value;
  }
  else{
  title = null;
  }
  if(document.getElementById("eventDescription1") != null){
  desc = document.getElementById("eventDescription1").value;
  }
  else{
  desc = null;
  }
  let tag;
  console.log(": " + date);
  console.log(": " + time);
  console.log(": " + title);
  console.log(": " + desc);
  console.log(": " + tag);

  //get checked tag
  let tags = document.getElementsByName('category1');
  for(let i = 0, length = tags.length; i < length; i++){
  	if(tags[i].checked){
  		tag = tags[i].value;
  		break;
  	}
  }
  if(tag != undefined){
  tag = tag;
  }
  else{
  tag = null;
  }
  let data = new FormData();
    data.append('date', date);
    data.append('time', time);
    data.append('title', title);
    data.append('description', desc);
    data.append('tags', tag);
  // alert(fdate);
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mod").innerHTML = this.responseText;
            }
        };
        // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.open("POST","modifyEvent.php",false);
        // let data = fdate;
        // alert(data);
        xmlhttp.send(data);
        // modifyEvents();
}
document.getElementById('modEvent').addEventListener("click",changeE,false);
</script>
</body>
</html>