$(document).ready(function(){

  var idNum = 1;

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function(){
    $.ajax({
      type: "POST",
      scriptCharset: 'utf-8',
      url: "item-add.php",
    }).done(function(data){
      idNum++;
      $('#food-list').append(data);
      $('#food-box-template').attr('id', "food-box-" + idNum);
    }).fail(function(data){
      alert('error!!!');
    });
  });
});

