var date1 = document.getElementById('date1');
var date2 = document.getElementById('date2');
var date3 = document.getElementById('date3');
var date4 = document.getElementById('date4');
var date5 = document.getElementById('date5');

function dateTime(){
    var date = new Date();
    var text = date.toDateString();
    date1.innerHTML=text;
    date2.innerHTML=text;
    date3.innerHTML=text;
    date4.innerHTML=text;
    date5.innerHTML=text;
}

window.setTimeout(function() {
    $(".alert-notif").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);

window.setTimeout(function(){
    $(".alert-redirect").fadeTo(500,0).slideUp(500, function(){
        window.location.replace("login.php");
    });
}, 2000)