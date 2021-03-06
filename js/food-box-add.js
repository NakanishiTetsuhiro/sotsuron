$(function() {

  // 画像アップロードフォームの表示、非表示を制御
  $(".image_switcher > input[value~='imgOn']").click(function(){
      $('.image_upload_form_wrapper').css('display', 'block');
  });
  $(".image_switcher > input[value~='imgOff']").click(function(){
      $('.image_upload_form_wrapper').css('display', 'none');
  });


  var idNum = 0;

  // "品目の追加"ボタンを押したときの処理
  $('#btn_add').click(function(){
    $.ajax({
      type: "POST",
      scriptCharset: 'utf-8',
      url: "food-box-template.php",

    }).done(function(data){
      var foodBoxTemp = data.replace(/food-box-template/g, 'food-box-' + idNum)
                            .replace(/foodBoxId\"/g, 'foodBoxId[]\" value=\"' + idNum + '\"')
                            .replace(/foodOption/g, 'foodOption[' + idNum + ']');

      $('#food-list').append(foodBoxTemp);

      if ($('.image_upload_form_wrapper').css('display') == 'block') {
        $('.image_upload_form_wrapper').css('display', 'block');
      }

      // 料理の種類が変わった時に料理名のドロップダウンメニューの中身を変更するイベントを設置
      $("#food-box-" + idNum + " > div > div > div > .kind-box").on({change: function() {
          var kindBoxValue = $(this).val();
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
          });
        }
      });


      // 削除ボタンを押した時のクリックイベントの設定
      $(document).on('click', '#delete_button', function () {

        $(this).parent().parent().parent().slideUp('400', function(){
          $(this).remove();
        });
      });

      idNum++;

    }).fail(function(data){
      alert('error!!!');
    });
  });


  // Windowの読み込み完了時に自動で１品目追加
  $(window).load(function() {
    $('#btn_add').trigger("click");
  });

});
