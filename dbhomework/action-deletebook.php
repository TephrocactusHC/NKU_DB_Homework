<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

require('dbconfig.php');
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);

$bookid = $_POST["bookid"];

$close_commit = "set autocommit = 0";
$begin = "begin";
$rollback = "rollback";
$commit = "commit";
$open_commit = "set autocommit = 1";

//查询是否被借出
$find_book1 = "select bookid from borrowstu where bookid=$bookid";
$find_book2 = "select bookid from borrowtea where bookid=$bookid";
if(mysql_query($find_book1))// 如果查询到结果为学生借出的书
{
	// 事务
	// 关闭自动提交
	mysql_query($close_commit);
	mysql_query($begin);
	$delete = "delete from borrowstu where bookid=$bookid";
	if(!mysql_query($delete))// 如果删除失败则回滚
	{
		?>
		<script> 
   		alert("删除失败");
   		</script>
   		<?php
		mysql_query($rollback);
	}
	?>
	<script> 
   		alert("删除成功");
   	</script>
   	<?php
	mysql_query($commit);
	mysql_query($open_commit);
}
else if(mysql_query($find_book2))// 如果查询到结果为教师借出的书
{
	// 事务
	// 关闭自动提交
	mysql_query($close_commit);
	mysql_query($begin);
	$delete = "delete from borrowtea where bookid=$bookid";
	if(!mysql_query($delete))// 如果删除失败则回滚 
	{
		mysql_query($rollback);
	}
	mysql_query($commit);
	mysql_query($open_commit);
}

mysql_query($close_commit);
mysql_query($begin);

//从storage和book表中删除
$delete_storage = "delete from storage where bookid=$bookid";
$delete_book = "delete from book where bookid=$bookid";

if(!mysql_query($delete_storage))// 如果删除失败
{
	?>
		<script> 
   		alert("删除失败");
   		</script>
   	<?php
	mysql_query($rollback);
}
if(!mysql_query($delete_book))// 如果删除失败
{
	?>
		<script> 
   		alert("删除失败");
   		</script>
   	<?php
	mysql_query($rollback);
}
?>
	<script> 
   	alert("删除成功");
   	</script>
<?php
mysql_query($commit);
mysql_query($open_commit);
header('Location: home.php');

?>