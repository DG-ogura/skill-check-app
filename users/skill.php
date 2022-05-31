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
$user_table = $_ENV['USER'];
$middle_table = $_ENV['SKILL_USER'];
$skill_table = $_ENV['SKILL'];
$login_user = $_SESSION["name"];

//DBに接続
$db = $operate->connect_db($dsn, $user, $pass);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

//多対多
$getinfo = $operate->join_db($db, $user_table, $middle_table, $skill_table, $login_user);
if ($db === 2) {
    //    $operate->syserr();
        echo "システムエラー";
        exit;
}

//var_dump($getinfo);

//DBから全ての情報を取得
//$getinfo = $operate->list_db($db, $main_table);
//if ($db === 2) {
//    $operate->syserr();
//    echo "システムエラー";
//    exit;
//}

//表示内容
$result = '';
foreach($getinfo as $ai_id) {
    $result .= "<tr>"
            . "<td>"
            . $ai_id[7]
            . "</td>"
            . "<td>"
            . $ai_id[1]
            . "</td>"
            . "<td>"
            . $ai_id[2]
            . "</td>"
            . "<td>"
            . $ai_id[3]
            . "</td>"
            . "<td>"
            . $ai_id[4]
            . "</td>"
            . "<td>"
            . $ai_id[5]
            . "</td>"
            . "<td>"
            . $ai_id[8]
            . "</td>"
            . "<td>"
            . $ai_id[13]
            . "</td>"
            . "<td>"
            . $ai_id[9]
            . "</td>"
            . "<td>"
            . $ai_id[11]
            . "</td>"
            . "<td>"
            . $ai_id[10]
            . "</td>"
            . "<tr>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スキルチェック</title>
    <link rel="stylesheet" href="DB_operate.css">
</head>
<body>
<div class="header">
        <a href="../home/index.php">■ホーム</a>
        <a>&nbsp;■自分のスキル</a>
        <a href="../skills/skill_edit.php">&nbsp;■スキル点数変更</a>
        <a href="../skills/skill_list.php">&nbsp;■スキル一覧</a>
        <a href="../login/login.php">&nbsp;■ログアウト</a>
    </div>
    </div>
    <br>
    <div class="top">
        <h1 class="title">@こちらが<?php echo $_SESSION["name"]; ?>さんのスキル情報です@</h1>
    </div>
    <br>
    <div class="result">
    <table id="result" border="3">
    <tr>
        <th>スキルID</th>
        <th>名前</th>
        <th>メール</th>
        <th>パスワード</th>
        <th>権限</th>
        <th>部署ID</th>
        <th>スキルID</th>
        <th>スキル</th>
        <th>ポイント</th>
        <th>申請日時</th>
        <th>承認</th>
    </tr>
        <?php echo $result; ?>
    </table>
    </div>
</body>
</html>