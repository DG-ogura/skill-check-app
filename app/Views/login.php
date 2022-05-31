<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="skill-check-app.css">
</head>
<body>
<p>■ログイン</p>
<form action="index.php" method="post">
<table border=1>
	<tr>
		<td>ユーザ名</td>
		<td><input name="input_user" type="text" value=""></td>
	</tr>
	<tr>
		<td>パスワード</td>
		<td><input name="input_pass" type="text" value=""></td>
	</tr>
</table>
<input type="submit" name="login" value="ログイン">
</form>
</body>
</html>

