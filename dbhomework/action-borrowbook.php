<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

require('dbconfig.php');
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);

$bookid = $_POST["bookid"];
$s_or_t = $_POST["s_or_t"];
$idid = $_POST["idid"];
$dept = $_POST["dept"];


$isBorrow1 = "select bookid from borrowstu where bookid=$bookid";
$isBorrow2 = "select bookid from borrowtea where bookid=$bookid";
$isBorrow1 = mysql_query($isBorrow1);
$row1 = mysql_fetch_array($isBorrow1);
if($row1)
{
	?>
		<script> 
   			alert("已被借出，返回上一页");
   			window.location.href="borrowbook.php";  
   		</script>
   	<?php
}
else
{
	if($s_or_t == 'stu')
	{
		$find_stu = "select stuid, department from student where stuid=$idid and department='$dept'";
		if(!mysql_query($find_stu))
		{
			?>
			<script> 
   				alert("没有这个学生");
   				window.location.href="borrowbook.php";  
   			</script>
   			<?php
		}
		$insert_book = "insert into borrowstu values($bookid, '$dept', $idid)";
		if(mysql_query($insert_book))
		{
			?>
			<script> 
   				alert("借书成功");
   				window.location.href="home.php";  
   			</script>
   			<?php
		}
		else
		{
			?>
			<script> 
   				alert("借书错误");
   				window.location.href="borrowbook.php";  
   			</script>
   			<?php
		}
	
	}
	else if($s_or_t == 'tea')
	{
		$find_tea = "select teaid, department from teacher where teaid=$idid and department='$dept'";
		if(!mysql_query($find_tea))
		{
			?>
			<script> 
   				alert("没有这个教师");
   				window.location.href="borrowbook.php";  
   			</script>
   			<?php
		}
		$insert_book = "insert into borrowstu values($bookid, '$dept', $idid)";
		if(mysql_query($insert_book))
		{
			?>
			<script> 
   				alert("借书成功");
   				window.location.href="home.php";  
   			</script>
   			<?php
		}
		else
		{
			?>
			<script> 
   				alert("借书错误");
   				window.location.href="borrowbook.php";  
   			</script>
   			<?php
		}
	}
}

?>