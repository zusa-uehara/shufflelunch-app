<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>シャッフルランチサービス</title>
</head>
<body>

<h1><a href='/'>シャッフルランチサービス</a></h1>

<p><a href='register.php'>社員を登録する</a></p>

<div>
  <form method="post" action="/shuffle">
    <button type="submit" name="shuffle">シャッフルする</button>
  </form>
</div>

<?php foreach ($groups as $group) :?>
  <li>
      <?php foreach ($group as $employee) :?>
        <?php echo $employee ;?>
      <?php endforeach ;?>
  </li>
<?php endforeach ;?>

</body>
</html>
