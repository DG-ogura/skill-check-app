<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\OperateDB;

$operate = new OperateDB();

$dsn = $_ENV['DB_CONNECTION'] . ":" . "host=" . $_ENV['DB_HOST'] . "; dbname=" . $_ENV['DB_DATABASE'] . "; charset=utf8";
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$table = $_ENV['SKILL'];

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

//DBから全ての情報を取得
$getinfo = $operate->list_db($db, $table);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

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
        <a href="../users/skill_edit.php">&nbsp;■スキル点数変更</a>
        <a>&nbsp;■スキル一覧</a>
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
    <div class="errmsg">
        <p><?php echo $errmsg; ?></p>
    </div>
</body>
</html>