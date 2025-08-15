<h2>社員登録</h2>

  <?php if (count($errors)) : ?>
    <ul>
      <?php foreach ($errors as $error): ?>
        <li>
          <?= $error ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif ; ?>
<form action="/employee/create" method="post">
  <label for="name">お名前：</label>
  <input type="text" id="name" name="name" required>
  <button type="submit">登録する</button>
</form>

<h2>社員一覧</h2>
<ul style="list-style-type : none;">
  <?php foreach ($employees as $employee): ?>
    <li>
      <?= $employee['id'] ?>：<?= $employee['name'] ?>
    </li>
  <?php endforeach; ?>
</ul>
