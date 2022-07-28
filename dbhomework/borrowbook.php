<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

?>

<html>
<title>我要借书</title>
<body>
<form action="action-borrowbook.php" method="post">
  <div align="center">你要借阅的书籍编号：</div>
	  <div align="center">
	    <input type="text" name="bookid">
  </div>
		  <div align="center">你的身份(学生：stu/教师：tea)：</div>
		  <div align="center"></div>
		  <div align="left"></div>
  <div align="center">
		    <input type="text" name="s_or_t">
  </div>
		  <div align="center">你的编号：</div>
		  <div align="center">
		    <input type="text" name="idid">
  </div>
		  <div align="center">你的学院：</div>
		  <div align="center">
		    <input type="text" name="dept">
		    <br/>
	          <input type="submit" value="提交">
      </div>
</form>
</body>
</html>