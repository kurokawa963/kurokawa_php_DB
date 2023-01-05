<?php

// DB接続
$dbn ='mysql:dbname=kurokawa_uy03_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成＆実行
$sql = 'SELECT * FROM kadai_o1';
// この内容はmyadminのSQLの中で確認しましょう！
$stmt = $pdo->prepare($sql);


// SQL実行（実行に失敗すると"sql error"が実行される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

echo

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$str = "";
foreach ($result as $record) {
  $str .= "
    <tr>
      <td>{$record["place"]}</td>
      <td>{$record["kind"]}</td>
      <tr>
      <td>{$record["introduction"]}</td>
</tr>
<tr>

</tr>
    </tr>
  ";
}



?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>負の遺産アーカイブ</h1>
    <table>
<td><?= $str ?></td>
    </table>
</body>

</html>