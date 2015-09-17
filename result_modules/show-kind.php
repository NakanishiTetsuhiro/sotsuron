<!-- 料理の種類を表示させるとこ（旧）
       <h1 class="kind-box">
        <?php
        try {
          $sql= "SELECT type_id, type FROM Mlang WHERE type_id = 'hebikame'";
          $stmh = $pdo->prepare($sql);
          $stmh->execute();
          $row = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
          print "エラー：" . $Exception->getMessage();
        }
        echo $row[0]['type'];
        ?>
      </h1>
-->