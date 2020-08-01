<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ろくまる農園</title>
</head>
<body>
  <?php
    // 前フォームから受け取った値をDBに登録する処理
    // DBとの障害対策
    try{
      // 前画面からの情報を変数に格納
      $pro_code = $_POST['code'];
      $pro_gazou_name = $_POST['gazou_name'];
      // db接続の設定
      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      // 以下でDBに接続しに行っている
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'DELETE FROM mst_product WHERE code=?';
      $stmt = $dbh -> prepare($sql);
      // セットしたいデータを順番に代入する
      $data[] = $pro_code;

      // dbを実行
      $stmt -> execute($data);

      // 切断
      $dbh = null;

      if($pro_gazou_name != ''){
        unlink('./gazou/'.$pro_gazou_name);
      }
    }
    catch(Exeption $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }
  ?>
  削除しました。<br>
  <br>
  <a href="pro_list.php">戻る</a>
</body>
</html>