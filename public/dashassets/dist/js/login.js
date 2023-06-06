$('.security_image').change(function(){
  $('.security_image').next("i").css('border','2px solid rgb(0, 128, 0)');
  $('.security_image').next("i").css('color','rgb(0, 128, 0)');
  if($(this).prop("checked") == true){
    $(this).parent().find('i').css('border','2px solid #b212e6');
    $(this).parent().find('i').css('color','#b212e6');
  }
})
$('.type').change(function(){
  $('.type').next("i").css('border','2px solid rgb(0, 128, 0)');
  $('.type').next("i").css('color','rgb(0, 128, 0)');
  if($(this).prop("checked") == true){
    $(this).parent().find('i').css('border','2px solid #b212e6');
    $(this).parent().find('i').css('color','#b212e6');
  }
});
var chp = 0;
$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  if (chp==0){
    $(this).closest("div").find("input").attr("type","text");
    chp = 1;
  }else{
    $(this).closest("div").find("input").attr("type","password");
    chp = 0;
  }

});