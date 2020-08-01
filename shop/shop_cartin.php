<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ろくまる農園</title>
</head>
<body>
  <?php
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲストさま';
    print '<a href="member_login.php">会員ログイン</a><br>';
    print '<br>';
  }else{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<a href="member_logout.php">ログアウト</a><br>';
    print '<br>';
  }
  try{
    // urlを受け取る場合は、GETを使う。formで情報を受け取る場合は、postを使う
    $pro_code = $_GET['procode'];

    $cart = $_SESSION['cart'];
    $cart[] = $pro_code;
    $kazu = $_SESSION['kazu'];
    $_SESSION['cart']=$cart;
    $_SESSION['kazu']=$kazu;

  } catch(Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております';
    exit();
  }
  ?>
  カートに追加しました <br>
  <br>
  <a href="shop_list.php">商品一覧に戻る</a>
</body>
</html>