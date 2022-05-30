<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\OperateDB;

$operate = new OperateDB();

$dsn = $_ENV['DB_CONNECTION'] . ":" . "host=" . $_ENV['DB_HOST'] . "; dbname=" . $_ENV['DB_DATABASE'] . "; charset=utf8";
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$main_table = $_ENV['USER'];
$join_table = $_ENV['SKILL_USER'];
// echo $dsn;

//echo $_ENV['DB_DATABASE'];  
//echo "<br>";
//echo $_ENV['DB_USERNAME'];  
//echo "<br>";
//echo $_ENV['DB_PASSWORD'];  

//DBに接続
$db = $operate->connect_db($dsn, $user, $pass);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

//多対多
$getinfo = $operate->join_db($db, $main_table, $join_table);
if ($db === 2) {
    //    $operate->syserr();
        echo "システムエラー";
        exit;
}

var_dump($getinfo);

//DBから全ての情報を取得
//$getinfo = $operate->list_db($db, $main_table);
//if ($db === 2) {
//    $operate->syserr();
//    echo "システムエラー";
//    exit;
//}

/*
$result = '';
foreach($getinfo as $ai_id) {
    $result .= "<tr>"
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
            . "</tr>";
}
*/

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
        <a href="../users/skill_edit.php">&nbsp;■スキル点数変更</a>
        <a href="../skills/index.php">&nbsp;■スキル一覧</a>
    </div>
    </div>
    <br>
    <div class="top">
        <h1 class="title">@こちらがあなたのスキル情報です@</h1>
    </div>
    <br>
    <div class="result">
    <table id="result" border="3">
    <tr>
        <th>ユーザID</th>
        <th>スキルID</th>
        <th>ポイント</th>
        <th>承認</th>
        <th>申請日時</th>
    </tr>
        <?php echo $result; ?>
    </table>
    </div>
</body>
</html>