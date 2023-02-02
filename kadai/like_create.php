<?php

session_start();

include('kadai_functions.php');

$user_id = $_GET['user_id'];
$kadai_id = $_GET['kadai_id'];


$pdo = connect_to_db();


$sql = 'INSERT INTO like_table (id, user_id, kadai_id, created_at) VALUES (NULL, :user_id, :kadai_id, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

var_dump($sql);
exit();

$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND kadai_id=:kadai_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// $sql = 'SELECT kadai_id AND COUNT(id) AS CNT FROM like_table GROUP BY kadai_id';

// $sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND kadai_id=:kadai_id';

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_STR);

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

$like_count = $stmt->fetchColumn();
// SQLでデータの件数がわかるってやつ意味はわからんでおけ

if ($like_count !== 0) {
    
  // いいねされている状態
  $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND kadai_id=:kadai_id';
//   いいねされてる状況でいいねボタンを押すと消す
} else {
  // いいねされていない状態（elseで逆説）
  $sql = 'INSERT INTO like_table (id, user_id, kadai_id, created_at) VALUES (NULL, :user_id, :kadai_id, now())';
// いいねされると増やす
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}



header("Location:kadai_read.php");
exit();

