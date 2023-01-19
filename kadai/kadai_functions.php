<?php

function connect_to_db()
{

    try {
        return new PDO($dsn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}



// connect_to_dbの結果が他のとこでつかえる
// 同じ文を別のファイルに書いてて、全部書き換えるのに時間かかる
// ひとつのファイルに関数書いておけばよくね？

// ログイン状態のチェック関数
// ログインページをそのままコピーして貼り付けたらログインできちゃうじゃん
// そうならないような仕組み
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
    // session_idが入っている
    
    
    header('Location:kadai_login.php');
    exit();
   
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  // session_id再生成して入れてあげる
  
  }
}

// ！！ログインページには絶対入れない！！
// 一生ログインできない


?>

