<?php require_once('ConnectDB.php'); ?>

<li id="food-box-template" class="item-box">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">料理の種類</label>
        <select name="kindBox" class="kind-box form-control">
          <?php
          $db = new ConnectDB();
          $get_type = $db->db_accessor("DISTINCT type_id, type", "Mlang", "id >= 1");
          ?>

          <option>種類を選択してください</option>

          <?php
          $i = 0;
          foreach ($get_type as $key => $value) {
          ?>
            <option value="<?php echo $value['type_id'] ?>">
            <?php
            echo $value['type'];
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
        <select name="foodNameBox[]" class="food_name_box form-control">
          <?php
          $get_foodname = $db->db_accessor("DISTINCT id, japanese", "Mlang", "id >= 1");
          $i = 0;
          foreach ($get_foodname as $key => $value) {
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
    <div class="col-md-4 mb">
      <label for="foodOption" class="block-label">オプション</label>
      <label class="checkbox-inline">
        <input type="checkbox" name="foodOption[]" value="misoSoup"> 味噌汁
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="foodOption[]" value="rice"> ご飯
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="foodOption[]" value="miniSoba"> ミニそば
      </label>
    </div>
  </div> <!-- /row -->
  <div class="row">
    <div class="col-md-5 col-md-offset-7">
      <div class="form-group">
        <label for="price">金額</label>
        <input type="number" class="form-control" name="price[]" id="price" placeholder="メニューの金額を入力してください">
      </div>
    </div>
  </div>
</li> <!-- /.item-box -->