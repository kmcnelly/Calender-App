function getCurDay(){

	d = new Date();

	document.getElementById("curDate").innerHTML = d ;
}

$('#date').datepicker({});

document.addEventListener("DOMContentLoaded", function (){
	getCurDay();

	
});