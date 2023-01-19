<?php

session_start();
// 必ず入れる！！

include('kadai_functions.php');

$username=$_POST['username'];
$password=$_POST['password'];

$pdo=connect_to_db();

$sql="SELECT*FROM kadai_user WHERE username=:username AND password=:password AND deleted_at IS NULL";

$stmt= $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try{
    $status=$stmt->execute();
} catch(PDOException $e){
    echo json_encode(["sql error"=>"{$e->getMessage()}"]);
exit();
}

// ユーザ有無で条件分岐
$user=$stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=kadai_login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['username'] = $user['username'];
  header("Location:kadai_read.php");
  exit();
}


