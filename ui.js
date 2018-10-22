/*****************************************************************************
Alex Chow and Kenneth McNelly

Code implements Month class created on the website
******************************************************************************/


let months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

let currentMonth = new Month(2018, 9); // October 2017


// This updateCalendar() function only alerts the dates in the currently specified month.  You need to write
// it to modify the DOM (optionally using jQuery) to display the days and weeks in the current month.
function updateCalendar(){
	//update top of calendar
	document.getElementById("curMonth").innerHTML = months[currentMonth.month];
	document.getElementById("curYear").innerHTML = currentMonth.year;

	var weeks = currentMonth.getWeeks();
	
	for(var w in weeks){
		var days = weeks[w].getDates();
		// days contains normal JavaScript Date objects.
		
		alert("Week starting on "+days[0]);
		
		for(var d in days){
			// You can see console.log() output in your JavaScript debugging tool, like Firebug,
			// WebWit Inspector, or Dragonfly.
			console.log(days[d].toISOString());
		}
	}
}


function getCurDay(){
	d = new Date();
	document.getElementById("curDate").innerHTML = d ;
}

//change current month to Prev month
function getPrevMonth(){
	currentMonth = currentMonth.prevMonth();
	updateCalendar();
	alert("The new month is "+currentMonth.month+" "+currentMonth.year);
}

//change current month to next month
function getNextMonth(){
	currentMonth = currentMonth.nextMonth();
	updateCalendar(); 
	alert("The new month is "+currentMonth.month+" "+currentMonth.year);
}


function selected(){
    alert("do stuff");
}

//jquery ================================================================================================================================
//================================================================================================================================
$('#date').datepicker({});

//change month
$("#prev").click(function(){
    getPrevMonth();
});
$("#next").click(function(){
	getNextMonth();
});

//select Date =====================================================================================================
$("#1").click(function(){
    selected();
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#2").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#3").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#4").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#5").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#6").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#7").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

//Row 2 =================================================================
$("#8").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#9").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#10").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#11").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#12").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#13").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#14").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

//Row #3 ==================================================================
$("#15").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#16").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#17").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#18").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#19").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#20").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#21").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

//Row #4 ==================================================================
$("#22").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#23").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#24").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#25").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#26").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#27").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#28").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

//Row #5 ==================================================================
$("#29").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#30").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#31").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#32").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#33").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#34").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});

$("#35").click(function(){
    $(".active").removeClass("active");
    $(this).children().addClass("active");
});


//========================================================================================================================
//================================================================================================================================

document.addEventListener("DOMContentLoaded", function (){
	getCurDay();

	
});