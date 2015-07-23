$(document).ready(function(){

var new_list = document.getElementById("food-box");


// var i=1;
// $("#food-list li").attr("id","food-box-"+i);
// i++;

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function(){
    $('#food-list').append(new_list);
    var i=1;
    $("#food_list li").each(function(){
      $("#food-box").attr("id","food-box-"+i);
      i++;
    });
  });
});
