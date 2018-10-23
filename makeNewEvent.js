function makeNewEvent(){
    let date = document.getElementById("eventDate").value;
    let time = document.getElementById("eventTime").value;
    let title = document.getElementById("eventTitle").value;
    let desc = document.getElementById("description").value;
    let tags = document.getElementById("tags").value;
    createEvent(date,time,title,desc,tags);
  }
  document.getElementById("test").addEventListener('click',makeNewEvent);