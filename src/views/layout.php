<!DOCTYPE html>
<html lang='ja'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (isset($title)) : echo $title . ' - '; endif ;?>シャッフルランチ
  </title>
</head>
<body>
  <div>
    <h1>
      <a href="/">シャッフルランチ</a>
    </h1>
    <div>
      <?php echo $content; ?>
    </div>
</body>
</html>
