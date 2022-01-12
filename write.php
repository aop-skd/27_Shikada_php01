<?php

// 日本語操作をするための関数
// !!できていないこと：タイムゾーンを変更する方法
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    // echo date("Y/m/d H:i");

// postから受け取るデータを変数指定
    $name =$_POST["namae"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $member = $_POST["member"];

// セキュリティ対策を行う[必須]
    $name = htmlspecialchars($name, ENT_QUOTES);
    $sex = htmlspecialchars($sex, ENT_QUOTES);
    $age = htmlspecialchars($age, ENT_QUOTES);
    $member = htmlspecialchars($member, ENT_QUOTES);

// データを保存する形式にする
    $str = $name."/".$sex."/".$age."/".$member[0]."/".$member[1]."/".$member[2]."/";

// ファイルをあけて用意 書き込むときは”a"を記述
    $file = fopen('./data/data.txt', 'a');

// 書き込み&改行
    fwrite($file, $str . "\n");

// ファイルをクローズ
    fclose($file);

 ?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートのご協力ありがとうございました</title>
    <style>
        body{
            text-align: center;
            padding-top: 200px;
        }
    </style>

</head>
<body>
    <img src="https://edinamag.com/sites/default/files/styles/629w-scale/public/field/image/THANK%20YOU%20FOR.png?itok=OC5Rz4fK" alt="TYV">
    <br>
    <a href="http://localhost/27_shikada_php01/read.php">結果を見る</a>
    
</body>
</html>