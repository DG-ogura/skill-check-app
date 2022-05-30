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
    <div class="errmsg">
        <p><?php echo $errmsg; ?></p>
    </div>
</body>
</html>