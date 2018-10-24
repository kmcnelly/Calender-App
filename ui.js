/*****************************************************************************
Alex Chow and Kenneth McNelly

Code implements Month class created on the website

******************************************************************************/

const NUM_SLOTS = 42;

let months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

let currentMonth = new Month(2018, 9); // October 2017

//current date object
let today = new Date();


// This updateCalendar() function only alerts the dates in the currently specified month.  You need to write
// it to modify the DOM (optionally using jQuery) to display the days and weeks in the current month.
function updateCalendar(){
	//update Month & Year of calendar
	document.getElementById("curMonth").innerHTML = months[currentMonth.month];
	document.getElementById("curYear").innerHTML = currentMonth.year;

	let clear = 1;
	while(clear <= NUM_SLOTS){
		document.getElementById(clear).innerText = "";
		clear += 1;
	}

	//get the weeks filled with days
	let weeks = currentMonth.getWeeks();
	
	let counter = 1; //day counter starting at 1

	for(let w in weeks){
		let days = weeks[w].getDates();
		// days contains normal JavaScript Date objects.
		
		// alert("Week starting on "+days[0]);
		
		for(let d in days){
			const monthRegex = /(?<=-)\d{2}(?=-)/g
			const dateRegex = /(?!-)\d{2}(?=T)/g
			//day info from the class
			let dString = days[d].toISOString();

			//display only days from the that month
			let monthIn = monthRegex.exec(dString);

			//date
			let dateIn = dateRegex.exec(dString);

			//denotes current date in the calendar
			if(today.getMonth()== (monthIn-1) && today.getDate()==dateIn){
				$(document.getElementById(counter)).addClass("today");
			}

			//get the date of the month
			if(currentMonth.month == (parseInt(monthIn)-1)){
				//update days in the month
				document.getElementById(counter).innerHTML = dateIn;
				document.getElementById(counter).value = dString.substring(0,10);
			}

			
			// console.log(currentMonth.month + "==" + (monthIn - 1));
			// console.log(counter + ":" + dateIn);
			// console.log(document.getElementById(counter).value);

			counter += 1;
		}
	}
}


function getCurDay(){
	dIn = new Date();
	dString = new Date(dIn).toUTCString();
	dString = dString.split(' ').slice(0, 4).join(' ');
	document.getElementById("curDate").innerHTML = days[(today.getDay())]+", " + ((today.getMonth())+1) +"/"+(today.getDate())+"/"+(today.getFullYear());
}

//change current month to Prev month
function getPrevMonth(){
	currentMonth = currentMonth.prevMonth();
	$(".active").removeClass("active");
	$(".today").removeClass("today");

	updateCalendar();

}

//change current month to next month
function getNextMonth(){
	currentMonth = currentMonth.nextMonth();
	$(".active").removeClass("active");
	$(".today").removeClass("today");

	updateCalendar(); 
	
}

//pre sets date value to selected date
function selected(id){
    $(".window-popup").fadeIn(500);

	let date = document.getElementById(id).value;
    document.getElementById("eventDate").value = date;

    document.getElementById("selectedDate").innerHTML = date + ": ";



    $("#button-popup-close").click(function(){
    	$(".window-popup").fadeOut(300);
    });

}

//
function getData(){
  let date = document.getElementById("eventDate").value;
  let time = document.getElementById("eventTime").value;
  let title = document.getElementById("eventTitle").value;
  let desc = document.getElementById("eventDescription").value;
  let tag;

  //get checked tag
  let tags = document.getElementsByName('category');
  for(let i = 0, length = tags.length; i < length; i++){
  	if(tags[i].checked){
  		tag = tags[i].value;
  		break;
  	}
  }

 console.log(": " + date);
  console.log(": " + time);
  console.log(": " + title);
  console.log(": " + desc);
  console.log(": " + tag);

  if(date != "" && time != "" && title != "" && tags != ""){
  	alert("sent to createEvent");
  	createEvent(date,time,title,desc,tag);
  }
  else{
  	alert("Please fill in remaining required fields");
  }
  
}


//jquery ================================================================================================================================
//================================================================================================================================

//submit =====================================================================================================
$("#addEvent").click(function(){
	getData();
});

//change month =====================================================================================================
$("#prev").click(function(){
    getPrevMonth();
});
$("#next").click(function(){
	getNextMonth();
});

//select Date =====================================================================================================
$("#1").click(function(){
    selected(1);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#2").click(function(){
	selected(2);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#3").click(function(){
	selected(3);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#4").click(function(){
	selected(4);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#5").click(function(){
	selected(5);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#6").click(function(){
	selected(6);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#7").click(function(){
	selected(7);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

//Row 2 =================================================================
$("#8").click(function(){
	selected(8);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#9").click(function(){
	selected(9);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#10").click(function(){
	selected(10);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#11").click(function(){
	selected(11);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#12").click(function(){
	selected(12);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#13").click(function(){
	selected(13);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#14").click(function(){
	selected(14);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

//Row #3 ==================================================================
$("#15").click(function(){
	selected(15);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#16").click(function(){
	selected(16);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#17").click(function(){
	selected(17);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#18").click(function(){
	selected(18);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#19").click(function(){
	selected(19);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#20").click(function(){
	selected(20);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#21").click(function(){
	selected(21);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

//Row #4 ==================================================================
$("#22").click(function(){
	selected(22);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#23").click(function(){
	selected(23);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#24").click(function(){
	selected(24);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#25").click(function(){
	selected(25);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#26").click(function(){
	selected(26);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#27").click(function(){
	selected(27);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#28").click(function(){
	selected(28);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

//Row #5 ==================================================================
$("#29").click(function(){
	selected(29);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#30").click(function(){
	selected(30);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#31").click(function(){
	selected(31);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#32").click(function(){
	selected(32);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#33").click(function(){
	selected(33);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#34").click(function(){
	selected(34);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#35").click(function(){
	selected(35);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#36").click(function(){
	selected(36);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#37").click(function(){
	selected(37);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#38").click(function(){
	selected(38);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#39").click(function(){
	selected(39);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#40").click(function(){
	selected(40);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#41").click(function(){
	selected(35);
    $(".active").removeClass("active");
    $(this).addClass("active");
});

$("#42").click(function(){
	selected(42);
    $(".active").removeClass("active");
    $(this).addClass("active");
});
//========================================================================================================================
//================================================================================================================================

document.addEventListener("DOMContentLoaded", function (){
	updateCalendar();
	getCurDay();

	
});