

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="kadai_select.php" method="POST" enctype="multipart/form-data">
<body>
    <h1>あなたの「知ってる」を教えてください</h1>
    <table>
        <td>場所
            </td>
    <td><input type="text" name="place" >
</td>
</table>
    <table>
        <td>ジャンル</td>
    <td>
        <select name="genre" id="genre">
        <option value="0"></option>
        <option value="戦争遺構">戦争遺構</option>
<option value="被災遺構">被災遺構</option>
<option value="学習施設">学習施設</option>
</select></td></table>

    <table>
        <td>説明</td>
        <td><textarea name="intro" id="" cols="50" rows="20"></textarea></td>
    </table>
    <table>
<td>画像</td><td><input type="file" name="pic" accept="image/*"></td>
</table>
<div>
     <button>submit</button>
</div>
</form>

   
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>

    </script>
</body>
</html>