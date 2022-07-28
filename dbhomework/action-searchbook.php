<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php


require('dbconfig.php');
$link = mysql_connect($server_name,$host,$pwd);
mysql_select_db($database);


$bookname = $_POST["bookname"];
$book_sql1 = "select * from allbook where bookname like'%".trim($bookname)."%'";
$found_book = mysql_query($book_sql1);
$row=mysql_fetch_row($found_book);
/*$row = mysql_fetch_row($found_book);*/
if(!$row)
{	?>
	
	<script> 
		alert("没有符合条件的书");
		window.location.href="searchbook.php";  
	</script>
	<?php
}

else
{
	
	?>
	<?php
	do{
	?>
	<tr align="center" bgcolor="#FFFFFF">
		<td height="20" align="center"><?php echo "图书:";?></td>
		<td height="20" align="center"><?php echo $row[1];?></td>
		<td><?php echo ",在";?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo "楼";?></td>
		<td align="center"><?php echo $row[3];?></td>
		<td><?php echo "号,编号是";?></td>
		<td align="center"><?php echo $row[0];?></td>
		<td align="center"><?php echo "<br>";?></td>
	</tr>
	<?php
	}while($row=mysql_fetch_row($found_book));
}




?>