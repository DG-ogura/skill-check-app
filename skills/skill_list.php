<?php

//autoload
require __DIR__ . '/../vendor/autoload.php';

//dotenv有効化
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//インスタンス作成
use App\OperateDB;
$operate = new OperateDB();

//セッションの開始
session_start();

//変数定義
$dsn = $_ENV['DB_CONNECTION'] . ":" . "host=" . $_ENV['DB_HOST'] . "; dbname=" . $_ENV['DB_DATABASE'] . "; charset=utf8";
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$table = $_ENV['SKILL'];

//DBに接続
$db = $operate->connect_db($dsn, $user, $pass);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

//DBから全ての情報を取得
$getinfo = $operate->list_db($db, $table);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

//表示内容
$result = '';
//var_dump($getinfo);
foreach($getinfo as $ai_id) {
    $result .= "<tr>"
            . "<td>"
            . $ai_id[0]
            . "</td>"
            . "<td>"
            . $ai_id[1]
            . "</td>"
            . "</tr>";
}

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
        <a href="../home/index.php">■ホーム</a>
        <a href="../users/skill.php">&nbsp;■自分のスキル</a>
        <a href="../skills/skill_edit.php">&nbsp;■スキル点数変更</a>
        <a>&nbsp;■スキル一覧</a>
        <a href="../login/login.php">&nbsp;■ログアウト</a>
    </div>
    <div class="top">
        <h1 class="title">@スキルの一覧です@</h1>
    </div>
    <div class="result">
    <table id="result" border="3">
    <tr>
        <th>スキルID</th>
        <th>スキル名</th>
    </tr>
        <?php echo $result; ?>
    </table>
    </div>
</body>
</html>