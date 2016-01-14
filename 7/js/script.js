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

  var userInputMap = {};

  //toggle btn down and show/hide input-sec
  $('#input-btn').on('click', function () {
    if (!$(this).hasClass('down-btn')) {

      if ($('#entry-btn').hasClass('down-btn')) {
        $('#entry-btn').animate({
          top: '-=30px'
        }).removeClass('down-btn');
        $('#entry-sec').slideUp();
      }

      $(this).animate({
        top: '+=30px'
      }).addClass('down-btn');

      $('#input-sec').slideDown().addClass('down-sec');

    } else {
      $(this).animate({
        top: '-=30px'
      }).removeClass('down-btn');

      $('#input-sec').slideUp();
    }
  });

  //toggle down-btn and show/hide entry-sec
  $('#entry-btn').on('click', function () {
    if (!$(this).hasClass('down-btn')) {

      if ($('#input-btn').hasClass('down-btn')) {
        $('#input-btn').animate({
          top: '-=30px'
        }).removeClass('down-btn');
        $('#input-sec').slideUp();
      }

      $(this).animate({
        top: '+=30px'
      }).addClass('down-btn');

      $('#entry-sec').slideDown().addClass('down-sec');

    } else {
      $(this).animate({
        top: '-=30px'
      }).removeClass('down-btn');

      $('#entry-sec').slideUp().removeClass('down-sec');
    }
  });


  //FORM submit for error or confirm modal
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

    if (userInputMap.name.indexOf(" ") === -1) {
      $(modalBody).append('<p class="text-lg text-thin"> Name ' + userInputMap.name + ': (Include First and last name)</p>');
      errorInput($('#name'));
      proceed = false;
    }

    if (userInputMap.email.indexOf('@') === -1 || userInputMap.email.indexOf('.') === -1) {
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
      errorInput($('#age'));
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
    } else {

      $('#main-form').find('error-input').removeClass('error-input');

      for (var key in userInputMap) {
        $('#confirm-modal .modal-body ul').append('<li class="text-lg text-thin text-center">' + key + ' : ' + userInputMap[key] + '</li>');
      };

      $('#confirm-modal').modal();

      //FORM SUBMISSION -- write to CSV with PHP, input into entry-sec
      $('#form-submit').on('click', function () {
        //close modal
        $('#confirm-modal').modal('hide');
        
        //Set ID of new Table row
        var userID = userInputMap['name'].split(" ").join("_");
        
        //Trying to set date, and failing
//        var dateMonth = new date.prototype.getMonth();
//        var dateDay = new date.prototype.getDate();
//        var dateHour = new date.prototype.getHours();
//        var dateMin = new date.prototype.getMinutes();
//
//        var dateFull = dateMonth + "/" + dateDay + " " + dateHour + ":" + dateMin;
        
        //Create new Table row with ID as name
        var newRow = $('<tr id="' + userID + '"><td>' + 'today' + '</td></tr>');
        $('thead').append(newRow);
        for (var key in userInputMap) {
          $('#' + userID).append('<td>' + userInputMap[key] + '</td>');
        };
        
        $('#confirm-modal .modal-body ul').html('');
//        $('input, textarea').val('');
      });
    };
  });
  //end FORM SUBMIT



});