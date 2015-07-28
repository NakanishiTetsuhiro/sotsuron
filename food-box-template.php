<?php require_once('connect-db.php'); ?>

<li id="food-box-template" class="item-box">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">料理の種類</label>
        <select name="kindBox" class="kind-box form-control">
          <?php
          try {
            $sql= "SELECT DISTINCT type_id, type FROM Mlang";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます
          } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
          }

          ?>
          <option>種類を選択してください</option>
          <?php

          $i = 0;
          foreach ($row as $key => $value) {
          ?>
          <option value="<?php echo $value['type_id'] ?>">
          <?php
          echo $value['type'];
          // var_dump($value);
          // echo $value;
          ?>
          </option>
          <?php
          $i++;
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">料理名</label>
        <select name="food-name-box[]" class="food-name-box form-control">
          <?php
          try {
            $sql= "SELECT DISTINCT id, japanese FROM Mlang";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます
          } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
          }
          $i = 0;
          foreach ($row as $key => $value) {
          ?>
          <option value="<?php echo $value['id'] ?>">
          <?php
          echo $value['japanese'];
          ?>
          </option>
          <?php
            $i++;
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <label for="food-option" class="block-label">オプション</label>
      <label id="food-option" class="checkbox-inline">
        <input type="checkbox" name="food-option[]" class="misoshiru" value="miso-soup"> 味噌汁
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="food-option[]" class="rice" value="rice"> ご飯
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="food-option[]" class="minisoba" value="mini-soba"> ミニそば
      </label>
    </div>
  </div> <!-- /row -->
  <div class="row">
    <div class="col-md-5 col-md-offset-7">
      <div class="form-group">
        <label for="price">金額</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="メニューの金額を入力してください">
      </div>
    </div>
  </div>
</li> <!-- /.item-box -->