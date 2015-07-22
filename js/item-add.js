$(document).ready(function(){

var _new_list = '<li id="food-box-01" class="item-box">\
  <div class="row">\
    <div class="col-md-4">\
      <div class="form-group">\
        <label for="exampleInputEmail1">料理の種類</label>\
        <select name="kindBox" class="kind-box form-control">\
          <?php\
          try {\
            $sql= "SELECT DISTINCT type_id, type FROM Mlang";\
            $stmh = $pdo->prepare($sql);\
            $stmh->execute();\
            $row = $stmh->fetchall(PDO::FETCH_ASSOC);\
          } catch (PDOException $Exception) {\
            print "エラー：" . $Exception->getMessage();\
          }\
          $i = 0;\
          foreach ($row as $key => $value) {\
          ?>\
          <option value="<?php echo $value[\'type_id\'] ?>">\
          <?php\
          echo $value[\'type\'];\
          // var_dump($value);\
          // echo $value;\
          ?>\
          </option>\
          <?php\
          $i++;\
          }\
          ?>\
        </select>\
      </div>\
    </div>\
    <div class="col-md-4">\
      <div class="form-group">\
        <label for="exampleInputEmail1">料理名</label>\
        <select name="food-name-box" class="food-name-box form-control">\
          <?php\
          try {\
            // $sql= "SELECT * FROM Mlang";\
            $sql= "SELECT DISTINCT id, type_id, japanese FROM Mlang";\
            $stmh = $pdo->prepare($sql);\
            $stmh->execute();\
            $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます\
          } catch (PDOException $Exception) {\
            print "エラー：" . $Exception->getMessage();\
          }\
          $i = 0;\
          foreach ($row as $key => $value) {\
          ?>\
          <option value="<?php echo $value[\'type_id\'] ?>">\
          <?php\
          echo $value[\'japanese\'];\
          // var_dump($value);\
          // echo $value;\
          ?>\
          </option>\
          <?php\
            $i++;\
          }\
          ?>\
        </select>\
      </div>\
    </div>\
    <div class="col-md-4">\
      <label for="exampleInputEmail1" class="block-label">オプション</label>\
      <label class="checkbox-inline">\
        <input type="checkbox" id="inlineCheckbox1" value="option1"> 味噌汁\
      </label>\
      <label class="checkbox-inline">\
        <input type="checkbox" id="inlineCheckbox2" value="option2"> ご飯\
      </label>\
      <label class="checkbox-inline">\
        <input type="checkbox" id="inlineCheckbox3" value="option3"> ミニそば\
      </label>\
    </div>\
  </div> <!-- /row -->\
  <div class="row">\
    <div class="col-md-5 col-md-offset-7">\
      <div class="form-group">\
        <label for="exampleInputEmail1">金額</label>\
        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="メニューの金額を入力してください">\
      </div>\
    </div>\
  </div>\
</li> <!-- /food-box -->';

var new_list = document.getElementById("food-box-01");

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function(){
    // $('#food-list').append(new_list);
    console.log(new_list);
  });

});
