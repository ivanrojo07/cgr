// $('div#tab').remove();
$("tr").click(function(){
  $('div.persona').hide();
  // console.log(this.getAttribute('href'));
  var index = $(this.getAttribute('href'));
  // $(index).removeClass("pestana");
  // $('#tab').dialog('open');
  $(this.getAttribute('href')).show();

});
$(function() {
  $("li").click(function() {
  // remove classes from all
  $("li").removeClass("active");
  // add class to the one we clicked
  $(this).addClass("active");
 });
});

$(function() {
  $("li").click(function() {
  // remove classes from all
  $("li").removeClass("active");
  // add class to the one we clicked
  $(this).addClass("active");
 });
});
  
$('li a').click(function(){
  $(this.getAttribute('class')).addClass("active");
  $('.pestana').hide();
  $(this.getAttribute('href')).show();
}); 