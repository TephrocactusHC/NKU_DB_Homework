
<?php


?>

<html>
<head>
	<title>更改位置</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<form action="action-changebook.php" method="post">
		
		<label>
		<div align="center">书籍编号</div>
		</label>
		<div align="center">
		  <input type="text" name="bookid">
		</div>
		<label>
		<div align="center">换到几楼</div>
		</label>
		<div align="center">
		<input type="text" name="floor"><br/>
		</div>
		<label>
		<div align="center">换到几号</div>
		</label>
		<div align="center">
		<input type="text" name="number"><br/>
		</div>
		<label>
		<div align="center">新管理员</div>
		</label>
		<div align="center">
		<input type="text" name="manid"><br/>
		</div>
		<div align="center">
		<input type="submit" value="提交">
		</div>
	</form>
</body>
</html>