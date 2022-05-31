<?php

require __DIR__ . '/../../vendor/autoload.php';
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
//$dotenv->load();

use App\Controllers\DBController;

$operate = new DBController();

//セッションの開始
session_start();

$dsn = $_ENV['DB_CONNECTION'] . ":" . "host=" . $_ENV['DB_HOST'] . "; dbname=" . $_ENV['DB_DATABASE'] . "; charset=utf8";
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$login_id = $_SESSION["id"];

//echo $_SESSION["id"];
//exit;


// echo $dsn;

//echo $_ENV['DB_DATABASE'];  
//echo "<br>";
//echo $_ENV['DB_USERNAME'];  
//echo "<br>";
//echo $_ENV['DB_PASSWORD'];  

//DBに接続
$db = $operate->connect($dsn, $user, $pass);
if ($db === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}

//スキルポイント変更
if (isset($_POST['modify'])) {
$modify = $operate->point($db, $login_id, $_POST['input_point']);
if ($modify === 2) {
//    $operate->syserr();
    echo "システムエラー";
    exit;
}
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
        <a href="index.php">■ホーム</a>
        <a href="skill.php">&nbsp;■自分のスキル</a>
        <a>&nbsp;■スキルポイント変更</a>
        <a href="skill_list.php">&nbsp;■スキル一覧</a>
        <a href="login.php">&nbsp;■ログアウト</a>
    </div>
    <div class="top">
        <h1 class="title">@<?php echo $_SESSION["name"]; ?>さんのスキルのポイントを変更します@</h1>
    </div>
    <form action="skill_edit.php" method="post">
        <table border=1>
	    <tr>
		    <td>ポイント</td>
		    <td><input type="number" name="input_point" min="0" max="99999"></td>
	    </tr>
        </table>
    <input type="submit" name="modify" value="変更">
    </form>
</body>
</html>