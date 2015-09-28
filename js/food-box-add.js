$(function() {

  var idNum = 0;

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function(){
    $.ajax({
      type: "POST",
      scriptCharset: 'utf-8',
      url: "food-box-template.php",
    }).done(function(data){

      // テンプレートを元に料理の入力欄を生成。連番でIDを与える。
      idNum++;
      var foodBoxTemp = data.replace(/food-box-template/, 'food-box-' + idNum);
      $('#food-list').append(foodBoxTemp);
      $("#food-box-" + idNum + " > div > div > div > .kind-box").on({change: function() {
          var kindBoxValue = $(this).val();
          console.log(kindBoxValue);
          var tempId = $(this).parents('[id^=food-box-]').attr('id');
          $.ajax({
            type: "POST",
            scriptCharset: 'utf-8',
            dataType: "json",
            url: "get-food-name.php",
            data: {
              item:kindBoxValue
            },
          }).done(function(data){
            console.log(tempId);
            $('#' + tempId + ' .food-name-box > option').remove();
            for (var i = 0; i < data.length; i++){
              $('.food-name-box').append($('<option>').html(data[i]["japanese"]).val(data[i]["id"]));
            }
          }).fail(function(data){
            alert('error!!!');
            console.log(data);
          });

        }
      });

    }).fail(function(data){
      alert('error!!!');
    });
  });
});
