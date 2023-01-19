<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();

// いつもこれ
header('Location:kadai_login.php');
// ログアウト後の行き先を変えるだけ

exit();