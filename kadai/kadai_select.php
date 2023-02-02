<?php


if(
  !isset($_POST['place']) || $_POST['place'] === ''|| 
!isset($_POST['genre']) || $_POST['genre'] === ''||
!isset($_POST['intro']) || $_POST['intro']===''||
!isset($_FILES['pic']['name']) || $_FILES['pic']['name']===''||
!isset($_FILES['pic']['type'])||$_FILES['pic']['type']===''){
  // !isset ないですよね？
  exit('paramError');
  // なければエラー
}


$place=$_POST['place'];
$genre=$_POST['genre'];
$intro=$_POST['intro'];
$type = $_FILES['pic']['type'];
$upimg=$_FILES['pic']['name'];

$upload_dir = 'kadai_data/';
$uploaded_path = date('YmdHis') . $upimg;
$save_path = $upload_dir . $uploaded_path;

$upload = move_uploaded_file($_FILES['pic']['tmp_name'],$save_path);


// 各種項目設定
session_start();
include('kadai_functions.php');
$pdo = connect_to_db();
check_session_id();


// SQL作成&実行
// これもテーブル名以外触らない
$sql = 'INSERT INTO kadai_o1 (id, place, kind, introduction, img_type, photo) VALUES (NULL, :place, :kind, :introduction, :img_type, :photo)';
// コロンから始まる変数⇒バインド変数
// バインド変数つかわないとデータいじられる可能性があるから必ずコロンつかう！
$stmt = $pdo->prepare($sql);

// バインド変数を設定
// バインド変数の中には以下の二行を使いましょう！
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':kind', $genre, PDO::PARAM_STR);
$stmt->bindValue(':introduction', $intro, PDO::PARAM_STR);
$stmt->bindValue(':img_type', $type, PDO::PARAM_STR);
$stmt->bindValue(':photo', $save_path, PDO::PARAM_STR);



// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  // 実際にインサート文が実行される
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:kadai_read.php');
exit();


?>