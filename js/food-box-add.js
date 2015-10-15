$(function() {

  var idNum = 0;

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function(){
    $.ajax({
      type: "POST",
      scriptCharset: 'utf-8',
      url: "food-box-template.php",
    }).done(function(data){

      var foodBoxTemp = data.replace(/food-box-template/, 'food-box-' + idNum)
                            .replace(/foodOption/g, 'foodOption' + idNum);

      $('#food-list').append(foodBoxTemp);

      // 料理の種類が変わった時に料理名のドロップダウンメニューの中身を変更するイベントを設置
      $("#food-box-" + idNum + " > div > div > div > .kind-box").on({change: function() {
          var kindBoxValue = $(this).val();
          console.log(kindBoxValue);
          var tempId = $(this).parents('[id^=food-box-]').attr('id');
          // Ajaxでget-food-name.phpを利用してDBにアクセス
          $.ajax({
            type: "POST",
            scriptCharset: 'utf-8',
            dataType: "json",
            url: "get-food-name.php",
            data: {
              item:kindBoxValue
            },
          }).done(function(data){
            // DBから引っ張ってきたデータを料理名を選択するoptionにセット
            $('#' + tempId + ' .food_name_box > option').remove();
            for (var i = 0; i < data.length; i++){
              $('.food_name_box').append($('<option>').html(data[i]["japanese"]).val(data[i]["id"]));
            }
          }).fail(function(data){
            alert.log('error!!!');
            console.log(data);
          });
        }
      });

      idNum++;

    }).fail(function(data){
      alert('error!!!');
    });


  });
});
