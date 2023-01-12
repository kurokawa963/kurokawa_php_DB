<?php

include('kadai_functions.php');


if( 
  !isset($_POST['place']) || $_POST['place'] === ''|| 
!isset($_POST['intro']) || $_POST['intro']===''
) { 
   // !isset ないですよね？
  exit('paramError');
  // なければエラー
}

$place=$_POST['place'];
$intro=$_POST['intro'];
$id = $_POST['id'];

// $type = $_FILES['pic']['type'];
// $upimg=$_FILES['pic']['name'];

// $upload_dir = 'kadai_data/';
// $uploaded_path = date('YmdHis') . $upimg;
// $save_path = $upload_dir . $uploaded_path;

// $upload = move_uploaded_file($_FILES['pic']['tmp_name'],$save_path);


// 各種項目設定
$pdo=connect_to_db();


// SQL作成&実行
// これもテーブル名以外触らない
$sql = 'UPDATE kadai_o1 SET place=:place, introduction=:introduction WHERE id=:id';
// コロンから始まる変数⇒バインド変数
// バインド変数つかわないとデータいじられる可能性があるから必ずコロンつかう！
$stmt = $pdo->prepare($sql);

// バインド変数を設定
// バインド変数の中には以下の二行を使いましょう！
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':introduction', $intro, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);



// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  // 実際にインサート文が実行される
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


header("Location:kadai_read.php");
exit();

