function createEvent(date,time,title,desc,tags){
    let data = new FormData();
    data.append('date', date);
    data.append('time', time);
    data.append('title', title);
    data.append('description', desc);
    data.append('tags', tags);

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("success").innerHTML = "Successfully created new event";
            }
        };

        xmlhttp.open("POST","createsEvents.php",false);
        xmlhttp.send(data);

}

function testPhp(){
    {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("success").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","createsEvents.php",false);
        xmlhttp.send();

    }
}