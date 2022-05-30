<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

echo $_ENV['DB_DATABASE'];  
echo "<br>";
echo $_ENV['DB_USERNAME'];  
echo "<br>";
echo $_ENV['DB_PASSWORD'];  

//DBに接続
//$db = $operate->connect_db($dsn, $user, $pass);
//if ($db === 2) {
//    $operate->syserr();
//    exit;
//}

//DBから全ての情報を取得
//$getinfo = $operate->list_db($db);
//if ($db === 2) {
//    $operate->syserr();
//    exit;
//}

//foreach($getinfo as $product_id) {
//    $result .= "<tr>"
//            . "<td>"
//            . $product_id[1]
//            . "</td>"
//            . "<td>"
//            . "&yen;"
//            . $product_id[2]
//            . "</td>"
//            . "</tr>";
//}

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
        <th>商品名</th>
        <th>金額</th>
    </tr>
        <?php echo $result; ?>
    </table>
    </div>
</body>
</html>