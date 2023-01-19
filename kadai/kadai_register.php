<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザ登録画面</title>
</head>

<body>
  <form action="kadai_register_act.php" method="POST">
    <fieldset>
      <legend>ユーザ登録</legend>
      <div>
        メールアドレス: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>会員登録</button>
      </div>
      <a href="kadai_login.php">or login</a>
    </fieldset>
  </form>

</body>

</html>