<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ろくまる農園</title>
</head>
<body>
<?php
  // 変数に前の画面から受け取った値を落とし込んでいる(代入)
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  $staff_pass2 = $_POST['pass2'];

  // 入力データの安全対策？バリデーション？

  require_once('../common/common.php')

  $post=sanitize($_POST);
  $staff_name = $post['name'];
  $staff_pass = $post['pass'];
  $staff_pass2 = $post['pass2'];
  // $staff_name  = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
  // $staff_pass  = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
  // $staff_pass2 = htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

  if($staff_name == ''){
    print 'スタッフ名が入力されていません<br/>';
  }else{
    print 'スタッフ名:';
    print $staff_name;
    print '<br/>';
  }

  if($staff_pass == ''){
    print 'パスワードが入力されていません<br/>';
  }

  if($staff_pass != $staff_pass2){
    print 'パスワードが一致しません<br/>';
  }

  if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  } else {
    // 暗号化してデータをおくる
    $staff_pass = md5($staff_pass);
    print '<form method="post" action="staff_add_done.php">';
    // 次のページへこっそりデータを送っている
    print '<input type="hidden" name="name" value="'.$staff_name.'">';
    print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
    print '<br/>';
    // history.backは前のページへ戻る処理
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
  }
?>
</body>
</html>