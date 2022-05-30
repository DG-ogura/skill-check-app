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
		<td>ID</td>
		<td><input name="input_id" type="text" value=""></td>
	</tr>
	<tr>
		<td>パスワード</td>
		<td><input name="input_pw" type="text" value=""></td>
	</tr>
</table>
<input type="submit" value="ログイン">
<input type="hidden" name="mode" value="login">
</form>
</body>
</html>

