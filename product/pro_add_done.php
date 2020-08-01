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
      $pro_name = $_POST['name'];
      $pro_price = $_POST['price'];
      $pro_gazou_name = $_POST['gazou_name'];

      // カラムに安全対策(XSS対策)
      $pro_name = htmlspecialchars($pro_name, ENT_QUOTES,'UTF-8');
      $pro_price = htmlspecialchars($pro_price, ENT_QUOTES,'UTF-8');

      // db接続の設定
      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      // 以下でDBに接続しに行っている
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO mst_product(name,price,gazou) VALUES (?,?,?)';
      $stmt = $dbh -> prepare($sql);
      // セットしたいデータを順番に代入する
      $data[] = $pro_name;
      $data[] = $pro_price;
      $data[] = $pro_gazou_name;

      // dbを実行
      $stmt -> execute($data);

      // 切断
      $dbh = null;

      print $pro_name;
      print 'を追加しました<br/>';

    }
    catch(Exeption $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }
  ?>
  <a href="pro_list.php">戻る</a>
</body>
</html>