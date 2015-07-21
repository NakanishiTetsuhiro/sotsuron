$(function() {
  $(".kind-box").change(function() {
    $.get("192.168.33.10"+$(this).val(), function(data) {
      $("連動したいプルダウン").html(data);
    });
  });
});