<?php
require_once 'kadai_select.php';

$pdo = connectDB();

$sql = 'SELECT * FROM kadai_o1 WHERE id = :id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['img_type']);
echo $image['photo'];
exit();

?>