// JavaScript Document
//menu change size when scroll
window.addEventListener('scroll', function(){
    $('header').toggleClass('active', window.scrollY > 0);
    $('.logo-trangphuc').toggleClass('active', window.scrollY > 0);
    $('.logo-header').toggleClass('active', window.scrollY > 0);
    $('.logo-downgame').toggleClass('active', window.scrollY > 0);
    $('.logo').toggleClass('active', window.scrollY > 0);
});


//countdown Time

//var countDownDate = new Date().getTime();
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var nowhours = new Date().getHours();
  var nowminutes = new Date().getMinutes();
  var nowseconds = new Date().getSeconds();
  // Find the distance between now and the count down date
  //var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  //var days = 24 - nowhours;
  var hours = Math.floor(23 - nowhours);
  var minutes = Math.floor(59 - nowminutes);
  var seconds = Math.floor(59 - nowseconds);
    if(hours < 10){
        hours = "0"+hours;
    }
    if(minutes < 10){
        minutes = "0"+minutes;
    }
    if(seconds < 10){
        seconds = "0"+seconds;
    }
  // Output the result in an element with id="date"
  document.getElementById("date").innerHTML = hours + " : "
  + minutes + " : " + seconds + "";
    
  // If the count down is over, write some text 
  /*if (distance < 0) {
    clearInterval(x);
    document.getElementById("date").innerHTML = "EXPIRED";
  }*/
}, 1000);