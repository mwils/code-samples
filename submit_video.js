$(document).ready(function(){
  var addContent = function () {
    $.ajax("vid_form.html", {
    success: function (response) {
      $(".submit_button").remove("button");
      $(".box_contents").append(response);
      $(".form_basic").fadeIn(500);
      $('html, body').animate({
        scrollTop: $(".form_basic").offset().top
        }, 4000);
      }
    })};
  $(".white_box").on("click", "button", addContent);
});
