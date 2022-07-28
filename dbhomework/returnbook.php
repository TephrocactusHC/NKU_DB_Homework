<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("dbconfig.php");
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);

?>
<html>
<head>
	<title>我要还书</title>
</head>
<body>
	<form action="action-returnbook.php" method="post">
		<div align="center">你的编号</div>
		<div align="center">
		<input type="text" name="idid">
		</div>
		<div align="center">你的身份(学生：stu/教师：tea)</div>
		<div align="center">
		<input type="text" name="s_or_t">
		</div>
		<div align="center">你的学院</div>
		<div align="center">
		<input type="text" name="dept">
		</div>
		<div align="center">你要还的书籍编号</div>
		<div align="center">
		<input type="text" name="bookid">
		</div>
		<div align="center">
		<input type="submit" value="提交">
		</div>
	</form>
</body>
</html>