$(window).on('load', function() {
  hideAllForms();
});

$('#assignment').click(function() {
  hideAllForms();
  $('#assignment-form').css('display', 'block');
});

var hideAllForms = function() {
  $('.forms').each(function(idx) {
    $(this).css('display', 'none');
  });
};
