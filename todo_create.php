<?php
// POST確認
if(
  !isset($_POST['todo']) || $_POST['todo'] === ''|| 
!isset($_POST['deadline']) || $_POST['deadline'] === ''){
  // !isset ないですよね？
  exit('paramError');
  // なければエラー
}
// DB接続

$todo=$_POST['todo'];
$deadline=$_POST['deadline'];

// 各種項目設定   
// 何も変えない！DB名だけ変える！
$dbn ='mysql:dbname=kurokawa_uy03_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// SQL作成&実行
// これもテーブル名以外触らない
$sql = 'INSERT INTO todo963 (id, todo, deadline, created_at, update_at) VALUES (NULL, :todo, :deadline, now(), now())';
// コロンから始まる変数⇒バインド変数
// バインド変数つかわないとデータいじられる可能性があるから必ずコロンつかう！
$stmt = $pdo->prepare($sql);

// バインド変数を設定
// バインド変数の中には以下の二行を使いましょう！
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  // 実際にインサート文が実行される
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:todo_input.php');
exit();


?>