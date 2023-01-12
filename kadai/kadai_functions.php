<?php

function connect_to_db()
{
   // DB接続
$dbn ='mysql:dbname=kurokawa_uy03_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  return new PDO($dbn, $user, $pwd);
//  returnでread.phpに返す

} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
} 
}
// connect_to_dbの結果が他のとこでつかえる
// 同じ文を別のファイルに書いてて、全部書き換えるのに時間かかる
// ひとつのファイルに関数書いておけばよくね？
?>
