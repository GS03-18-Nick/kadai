$(document).ready(function () {

  /* TODO
  1. open hidden sections slide down and have buttons move down 20px or so
  2. modal to pop up and confirm form submission (add data validation to JS)
  2b. Clicking the submit from the MODAL button activates the PHP 
  3. Entry display screen comes from button
  4. clicking an entry slides down the SEC to see the full entry
  5. can edit the entry to update the csv
  6. button to download the csv
  */


  //toggle btn down and show/hide input-sec
  $('#input-btn').on('click', function () {
    if ($(this).hasClass('down-btn')) {
      $(this).animate({
        top: '-=30px'
      });
      $('#input-sec').slideUp();
      $(this).toggleClass('down-btn');
    } else {
      $(this).animate({
        top: '+=30px'
      });
      $('#input-sec').slideDown();
      $(this).toggleClass('down-btn');
    }
  });

  //FORM SUBMISSION
  var userInputMap = {};
  $('#btn-submit').on('click', function () {
    var proceed = true;

    //Put user input in MAP
    $('#main-form input').each(function () {
      userInputMap[$(this).attr('name')] = $(this).val();
      userInputMap['interest[]'] = [];
      userInputMap.sex = null;
    });

    $('input[type=checkbox]').each(function () {
      if ($(this).is(':checked')) {
        userInputMap['interest[]'].push($(this).val());
      }
    });

    $('input[type=radio]').each(function () {
      if ($(this).is(':checked')) {
        userInputMap.sex = $(this).val();
      }
    });

    userInputMap.comment = $('textarea').val();
    
    
    //Validation TESTS
    var modalBody = $('#error-modal .modal-body');
    var errorInput = function (a) {
      a.addClass('error-input');
    };
    
    
    if (userInputMap.name.indexOf(" ") === -1 || userInputMap.name.length() < 1) {
      $(modalBody).append('<p class="text-lg text-thin"> Name ' + userInputMap.name + ': (Include First and last name)</p>');
      errorInput($('#name'));
      proceed = false;
    }
    
    if (userInputMap.email.indexOf('@') === -1 || userInputMap.email.indexOf('.') === -1 || userInputMap.email.length() < 5) {
      $(modalBody).append('<p class="text-lg text-thin"> Email ' + userInputMap.email + ': (Include valid email)</p>');
      errorInput($('#email'));
      proceed = false;
    }
    
    if (userInputMap.sex === null) {
      $(modalBody).append('<p class="text-lg text-thin"> Select a Gender </p>');
      proceed = false;
    }
    
    if (Number(userInputMap.age) < 10) {
      $(modalBody).append('<p class="text-lg text-thin">Add valid age</p>');
      errorInput($('#age'))
      proceed = false;
    }
    
    if (userInputMap["interest[]"][0] === undefined) {
      $(modalBody).append('<p class="text-lg text-thin">Select at least one interest</p>');
      proceed = false;
    }
    
    //Launch CONFIRM or ERROR modal on proceed flag
    if (proceed === false) {
      $('#error-modal').modal();
      
      proceed = true;
      
      $('#error-close').on('click', function () {
        $(modalBody).html("");
      });
      
      return;
      
    } else {
      //TODO add APPENDED info to .modal-dialog for confirmation
      //CONfirm and edit button click functions
      //PHP
      $('#confirm-modal').modal();
    }
    
    console.log(userInputMap);
    return userInputMap;
  });
  //end FORM SUBMIT

  $('#btn-reset').on('click', function () {
    console.log(userInputMap);
  });

});