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
      $staff_name = $_POST['name'];
      $staff_pass = $_POST['pass'];

      // カラムに安全対策(XSS対策)
      $staff_name = htmlspecialchars($staff_name, ENT_QUOTES,'UTF-8');
      $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES,'UTF-8');

      // db接続の設定
      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      // 以下でDBに接続しに行っている
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
      $stmt = $dbh -> prepare($sql);
      // セットしたいデータを順番に代入する
      $data[] = $staff_name;
      $data[] = $staff_pass;

      // dbを実行
      $stmt -> execute($data);

      // 切断
      $dbh = null;

      print $staff_name;
      print 'さんを追加しました<br/>';

    }
    catch(Exeption $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }
  ?>
  <a href="staff_list.php">戻る</a>
</body>
</html>