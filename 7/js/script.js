$(document).ready(function () {

  /* TODO
  1. open hidden sections slide down and have buttons move down 20px or so
  2. modal to pop up and confirm form submission
  3. Display Entry is a either a dropdown or modal that displays partial entries
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
  
  
  
});