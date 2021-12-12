<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最終確認</title>
</head>
<body>
    <h1>間違いがないか確認の上、送信ボタンを押してください</h1>
        <p>■名前</p>
        <p><?=$_POST["name"]?></p>
        <p>■メールアドレス</p>
        <p><?=$_POST["email"]?></p>
        <p>■質問の内容</p>
        <p><?=$_POST["category"]?></p>
        <p>■詳しい内容</p>
        <p><?=$_POST["text"]?></p>
    <form action="remenber.php" method="POST">
        <input type="submit" name="generation" value="送信する">
    </form>

</body>
</html>