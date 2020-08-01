<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ろくまる農園</title>
</head>
<body>
  <?php
    require_once('../common/common.php');

    $seireki = $_POST['seireki'];

    $wareki = gengo($seireki);
    print $wareki;
  ?>
  
  <form method="post" action="gengo.php">
    <input type="text" name="seireki"><br>
    <input type="submit" value="OK">
  </form>
</body>
</html>