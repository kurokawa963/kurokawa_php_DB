<?php

// DB接続
session_start();
include('kadai_functions.php');
// SQL作成＆実行
check_session_id();
$pdo=connect_to_db();


$sql = 'SELECT * FROM kadai_o1';
// この内容はmyadminのSQLの中で確認しましょう！


$stmt = $pdo->prepare($sql);



// SQL実行（実行に失敗すると"sql error"が実行される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}



// SQL実行の処理
$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
// foreach ($result as $record) {
//   $str .= "
//     <tr>
//       <td>{$record["place"]}</td>
//       <td>{$record["kind"]}</td>
//       <tr>

//       </tr>
//       <tr>
//       <td>{$record["introduction"]}</td>
// </tr>
// <tr>

// </tr>
//     </tr>
//   ";
// }



?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>負の遺産アーカイブ</h1>
    <p>
    <a href="kadai_logout.php">ログアウト</a>  
    </p>
    <p>
    <a href="kadai_input.php">登録する</a>  
    </p>
    <table>

<?php foreach ($result as $record): ?>
        
            <tr class="＊">
       
            <tr><td><?php echo $record["place"]?></td></tr>
      <tr> <td><?php echo $record["kind"]?></td></tr>
       <tr>
       <td style="white-space:pre-wrap"><?php echo $record["introduction"]?></td>
 </tr>
       <tr>
  <td>
<img src="<?php echo $record["photo"]?>" width="300px" height="200px" ></td>
</tr>
<tr>
<td><a href='kadai_edit.php?id=<?php echo $record["id"]?>'>編集</a></td>
<td><a href='kadai_delete.php?id=<?php echo $record["id"]?>'>delete</a></td>
   </tr>    
      
            
         
<?php endforeach; ?>
    </table>
</body>

</html>