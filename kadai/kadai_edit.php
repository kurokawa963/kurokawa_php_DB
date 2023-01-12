<?php
// var_dump($_GET);
// exit();
// とりあえず_GETでread.phpのデータを引き出す
include('kadai_functions.php');

// id受け取り
$id=$_GET['id'];


// DB接続
$pdo=connect_to_db();

// SQL実行
$sql = 'SELECT * FROM kadai_o1 WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  // catch＝例外処理
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($result);
// exit();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="kadai_update.php" method="POST">
    <fieldset>
      <legend>DB連携型todoリスト（編集画面）</legend>
      <a href="kadai_read.php">一覧画面</a>
      <div>
        場所: <input type="text" name="place" value="<?= $result['place'] ?>">
      </div>
      <div>
         内容: <textarea name="intro" id="" cols="50" rows="20" value="<?= $result['introduction'] ?>"></textarea>
      </div>
      <input  type="hidden" name="id" value="<?= $result['id'] ?>">
      <!-- idを入れてあげないと -->
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>



