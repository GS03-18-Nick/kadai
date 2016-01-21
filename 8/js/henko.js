$(document).ready(function () {

  //Change <td> to <input> for editing
  $('a').on('click', function () {

    //define variables & DOM parts
    var currentA = $(this),
      tableRow = $(this).closest('tr'),
      linkParent = $(this).parent();

    //Flag open or close
    currentA.toggleClass('open');

    if (currentA.hasClass('open')) {

      //Find all <td> except the one with <a>, save text & replace w/<input>
      tableRow.find('td').not(linkParent).each(function () {
        $(this).css({
          'padding': '10px 0'
        });
        var currentVal = $(this).text();
        $(this).text('').append('<input type="text" class="table-input" value="' + currentVal + '">');
      });

      //Bounce new inputs to make obvious
      tableRow.find('input')
        .animate({
          'top': '+=20px'
        }, 300)
        .animate({
          'top': '-=30px'
        }, 300)
        .animate({
          'top': '+=15px'
        }, 200)
        .animate({
          'top': '-=5px'
        }, 200);
      //switch <a> text
      $(event.target).text('保存');
    } //END if <a> does not have open
    else {
      var currentData = {}
      //switch back to <td> delete <inputs>
      tableRow.find('input').each(function () {
        var currentKey = $(this).closest('td').data('tableId'),
            currentVal = $(this).val();
        $(this).parent().text(currentVal);
        $(this).remove();
        currentData[currentKey] = currentVal;
      });
      currentData['init'] = true;
      //switch <a> text
      $(event.target).text('変更');
      $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {mydata:currentData},
        success: function () {
          console.log(currentData);
      }
      });
    }
  });
  
});