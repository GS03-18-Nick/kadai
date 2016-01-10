$(document).ready(function () {
  
  
  //Open and close main page hidden section functions
  var openClose = function (thisSec, otherSec) {
    var thisButton = $(event.target),
        otherButton = $('#nav-sec button').not(thisButton);
    
    console.log(otherButton);
    
    //Check if the button clicked is NOT open
    if (!thisButton.hasClass('open')) {
      
      //check if the other button is open first
      if (otherButton.hasClass('open')) {
        otherSec.slideUp();
        otherButton.removeClass('open').animate({
          'top': '-=30px'
        });
      }
      //End other button check
      
      //animate and open since this button does NOT have open
      thisButton.addClass('open').animate({
        'top': '+=30px'
      });
      thisSec.slideDown();
      
      //else if this button has .open
    } else {
      thisButton.removeClass('open').animate({
        'top': '-=30px'
      });
      thisSec.slideUp();
    }
  };
  
  $('#btn-login').on('click', function () {
    openClose($('#login-sec'), $('#create-sec'));
  });
  
  $('#btn-create').on('click', function () {
    openClose($('#create-sec'), $('#login-sec'));
  });

});