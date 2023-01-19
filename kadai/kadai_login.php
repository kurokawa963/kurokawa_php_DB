<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <form action="kadai_login_act.php" method="POST">
    <fieldset>
      <legend>負の遺産登録ログイン画面</legend>
      <div>
        メールアドレス: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="kadai_register.php">or register</a>
    </fieldset>
  </form>

</body>

</html>