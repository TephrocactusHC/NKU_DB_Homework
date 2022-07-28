<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php


require('dbconfig.php');
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);



$bookid = $_POST["bookid"];
$floor = $_POST["floor"];
$number = $_POST["number"];
$manid = $_POST["manid"];


	
if(mysql_query("call update_book_location($bookid, $floor, $number, $manid)"))
{
	?>
	<script> 
   		alert("改变位置成功");
   		window.location.href="home.php";  
   	</script>
   	<?php
}
else
{
	?>
	<script> 
   		alert("改变位置错误");
   		window.location.href="changebook.php";  
   	</script>
   	<?php
}
?>