<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>質問フォーム</title>
</head>
<body>
    <h1>質問などは下記のフォームからお願いします</h1>
    <form action="confirm.php" method="POST">
        <p>■名前</p>
        <input type="text" name="name">
        <p>■メールアドレス</p>
        <input type="mail" name="email">
        <p>■質問の内容</p>
        <?php $questions = array("記事の内容について","投稿者への質問","調査してほしい道について","その他");?>
        <select name="category">
        <?php 
        foreach($questions as $question){
           echo "<option value='{$question}'>{$question}</option>";
        }
        unset($question);
        ?>
        </select>
        <p>■詳しい内容</p>
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="確認画面へ">
    </form>
</body>
</html>