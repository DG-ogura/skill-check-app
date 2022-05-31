<?php

require __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

use App\Controllers\DBController;

$operate = new DBController();

//セッションの開始
session_start();
//echo $_SESSION["name"];
//exit;

$input_user = '';
$input_pass = '';
if (empty($_SESSION["id"]) || empty($_SESSION["name"])) {
    //フォームから渡ってくる値
    //ユーザ名
    $input_user = $_POST['input_user'];
    //パスワード
    $input_pass = $_POST['input_pass'];

    //フォームから渡ってきた値が空の場合のエラー処理
    if (empty($input_user)) {
        header('Location: login.php');
        exit;
    }
    if (empty($input_pass)) {
        header('Location: login.php');
        exit;
    }

    //データベース接続用設定
    $dsn = $_ENV['DB_CONNECTION'] . ":" . "host=" . $_ENV['DB_HOST'] . "; dbname=" . $_ENV['DB_DATABASE'] . "; charset=utf8";
    //var_dump($dsn);
    //exit;
    //データベースに接続
    $db = $operate->connect($dsn, $input_user, $input_pass);
    if ($db === 2) {
    //    $operate->syserr();
        header('Location: login.php');
    	exit;
    }

    var_dump($db);
    exit;
    //メールアドレスとパスワードを基に、DBからユーザID取得
    $search = $operate->id($db, $input_user, $input_pass);
    //ユーザIDをセッションにセット
    if (isset($search[0])) {
        $_SESSION["id"] = $search[0]["id"];
        $_SESSION["name"] = $input_user;
    } elseif ($search === 2) {
        header('Location: login.php');
        exit;
    }
}
//入力値に誤りがあった際のエラーメッセージ
//$msg = 'メールアドレスまたはパスワードが間違っています。';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スキルチェック</title>
    <link rel="stylesheet" href="skill-check-app.css">
</head>
<body>
    <div class="header">
        <a>■ホーム</a>
        <a href="skill.php">&nbsp;■自分のスキル</a>
        <a href="skill_edit.php">&nbsp;■スキル点数変更</a>
        <a href="skill_list.php">&nbsp;■スキル一覧</a>
        <a href="login.php">&nbsp;■ログアウト</a>
    </div>
    <div class="top">
        <h1 class="title">@ようこそ<?php echo $_SESSION["name"]; ?>さん@</h1>
    </div>
    </html>