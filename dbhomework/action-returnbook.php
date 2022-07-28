<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//连接串
require('dbconfig.php');
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);

$bookid = $_POST["bookid"];
$s_or_t = $_POST["s_or_t"];
$idid = $_POST["idid"];
$dept = $_POST["dept"];

$close_commit = "set autocommit = 0";
$begin = "begin";
$rollback = "rollback";
$commit = "commit";
$open_commit = "set autocommit = 1";



if($s_or_t == "stu")
{
	$find_stu = "select stuid, department from student where stuid=$idid and department='$dept'";
	$find_book = "select bookid, stuid, department from borrowstu where stuid=$idid and department='$dept' and bookid=$bookid";
	if(!mysql_query($find_stu))
	{
		?>
		<script> 
   			alert("没有这个学生");
   			window.location.href="returnbook.php";  
   		</script>
   		<?php
	}
	else if(!mysql_query($find_book))
	{
		?>
		<script> 
   			alert("你没有这本书的借阅记录");
   			window.location.href="returnbook.php";  
   		</script>
   		<?php
	}
}
else if($s_or_t == "tea")
{
	$find_tea = "select teaid, department from teacher where teaid=$idid and department='$dept'";
	$find_book = "select bookid, teaid, department from borrowstu where teaid=$idid and department='$dept' and bookid=$bookid";
	if(!mysql_query($find_tea))
	{
		?>
		<script> 
   			alert("没有这个老师");
   			window.location.href="returnbook.php";  
   		</script>
   		<?php
	}
	else if(!mysql_query($find_book))
	{
		?>
		<script> 
   			alert("你没有这本书的借阅记录");
   			window.location.href="returnbook.php";  
   		</script>
   		<?php
	}
}
else
{
	?>
	<script> 
   		alert("输入错误");
   		window.location.href="returnbook.php";  
   	</script>
   	<?php
}

// 开始删除操作
mysql_query($close_commit);
mysql_query($begin);

if($s_or_t == "stu")
{
	$delete = "delete from borrowstu where stuid=$idid";
	if(!mysql_query($delete))
	{
		mysql_query($rollback);
	}
}
else
{
	$delete = "delete from borrowtea where teaid=$idid";
	if(!mysql_query($delete))
	{
		mysql_query($rollback);
	}
}
mysql_query($commit);
mysql_query($open_commit);

?>
<script> 
	alert("操作成功");
   	window.location.href="home.php";  
</script>