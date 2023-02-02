<?php

// DB接続
session_start();
include('kadai_functions.php');
// SQL作成＆実行
check_session_id();
$pdo=connect_to_db();


$sql = 'SELECT * FROM kadai_o1 LEFT OUTER JOIN (SELECT kadai_id, COUNT(id) AS like_count FROM like_table GROUP BY kadai_id) AS result_table ON kadai_o1.id = result_table.kadai_id';
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

$user_id = $_SESSION['user_id'];

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
    <link rel="stylesheet" href="kadai_read.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>負の遺産情報</title>
</head>
<body>
    <h1>負の遺産アーカイブ</h1>
    <div class="d-flex flex-row bd-highlight mb-3">
  <div class="p-2 bd-highlight"><a href="kadai_logout.php">ログアウト</a></div>
  <div class="p-2 bd-highlight"><a href="kadai_input.php">登録する</a></div>
</div>
    <!-- <p>
    <a href="kadai_logout.php">ログアウト</a>  
    </p>
    <p>
    <a href="kadai_input.php">登録する</a>  
    </p> -->
<select name="" id="">
  <option value=""></option>
    <option value="">戦争遺構</option>
  <option value="">被災遺構</option>
    <option value="">学習施設</option>

</select>
<?php foreach ($result as $record): ?>
        
            <!-- <tr class="＊">
       
            <tr><td><?php echo $record["place"]?></td></tr>
      <tr> <td><?php echo $record["kind"]?></td></tr>
       <tr>
       <td style="white-space:pre-wrap"></td>
 </tr>
       <tr>
  <td>
<img src="<?php echo $record["photo"]?>" width="300px" height="200px" ></td>
</tr>
<tr>
<td><a href='kadai_edit.php?id=<?php echo $record["id"]?>'>編集</a></td>
<td><a href='kadai_delete.php?id=<?php echo $record["id"]?>'>delete</a></td>
   </tr>     -->
  <div class="clearfix">
  <img src="<?php echo $record["photo"]?>" class="col-md-6 float-md-end mb-3 ms-md-3" alt="" width="200px" height="400px">

  <h3>
<?php echo $record["place"]?>  </h3>

  <p>
<?php echo $record["kind"]?>
</p>

  <p style="white-space:pre-wrap"><?php echo $record["introduction"]?>
  </p>
        <p><a href='like_create.php?user_id=<?php echo $user_id?>&kadai_id=<?php echo $record["id"]?>'>like<?php echo $record["like_count"]?></a></p>

  <p><a href='kadai_edit.php?id=<?php echo $record["id"]?>'>編集</a></p>
<p><a href='kadai_delete.php?id=<?php echo $record["id"]?>'>delete</a></p>

</div>    
            
         
<?php endforeach; ?>
   
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>

    </script>

</body>

</html>