<!--
データベースに接続する
インサート文でデータを登録
データベース切断
-->
<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
    $name = $_POST['name'];
    $stmt = $mysqli->prepare("INSERT INTO employees (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $stmt->close();
    $mysqli->close();
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>シャッフルランチサービス</title>
</head>
<body>

<h1><a href='/'>シャッフルランチサービス</a></h1>

<form action="register.php" method="post">
  <label for="name">お名前：</label>
  <input type="text" id="name" name="name" required>
  <button type="submit">登録する</button>
</form>

</body>
</html>
