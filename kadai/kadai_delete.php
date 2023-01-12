<?php

include('kadai_functions.php');



// データ受け取り
$id = $_GET['id'];

$pdo=connect_to_db();
$sql = 'DELETE FROM kadai_o1 WHERE id=:id';

// UPDATEはFROMいらんけど、DELETEはFROMいるよ
// WHERE入れないと全部消えるよ！
// SQLは


// DB接続
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}



// SQL実行

header("Location:kadai_read.php");


exit();