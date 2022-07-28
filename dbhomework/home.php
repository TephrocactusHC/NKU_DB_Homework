<html>
<head>
    <meta charset="UTF-8">
    <title>图书馆书籍电子管理系统</title>
</head>

<body>
<h1 style="text-align: center">图书馆书籍电子管理系统</h1>
    <div class="home"> 
      <div align="center">
        <style type="text/css">
            table
            {
                margin: 0 auto;
                border-collapse: collapse;
                text-align: center;
                table-layout: fixed;
                width: 700px;
            }
            table td, table th
            {
                border: 1px solid #cad9ea;
                color: #666;
                height: 30px;
            }
            table thead th
            {
                background-color: #CCE8EB;
                width: 100px;
            }
            table tr:nth-child(odd)
            {
                background: #fff;
            }
            table tr:nth-child(even)
            {
                background: #F5FAFA;
            }
        </style>
        <?php
        require('dbconfig.php');
        $link = mysql_connect($server_name,$host,$pwd);
		if($link)
		{
			mysql_query("set names 'utf8'",$link);
		}
        if(!$link)
        {
            //die("error".mysqli_connect_error());
        }
        mysql_select_db($database);
        $book_sql = "select * from book";
        $book = mysql_query($book_sql, $link);
		if($book){
    		$row = mysql_fetch_array($book);
		};
        if ($row)
        {
            echo "<table border='1' id='booktable'>";
            echo "<tr><th colspan='4' style='text-align: center'>图书馆书籍电子管理系统</th></tr>";
            echo "<tr><td>书籍编号</td><td>书籍名称</td><td>位置</td><td>在馆</td></tr>";
            mysql_data_seek($book, 0);
            while($row=mysql_fetch_row($book))
            {

                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                $locate_sql = "select Floor, Number from Storage where bookId='".$row[0]."'";
                $locate = mysql_query($locate_sql);
                while($location = mysql_fetch_row($locate))
                    echo "<td>".$location[0]."层".$location[1]."号</td>";
                $borrow1 = "select bookId from borrowstu where bookId='".$row[0]."'";
                $borrow2 = "select bookId from borrowtea where bookId='".$row[0]."'";
                $isBorrow1 = mysql_query($borrow1);
                $isBorrow2 = mysql_query($borrow2);
                $row1=mysql_fetch_array($isBorrow1);
                $row2=mysql_fetch_array($isBorrow2);
                if($row1 || $row2)
                {
                    echo "<td>No</td>";
                    echo "</tr>";
                }
                else
                {
                    echo "<td>Yes</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        else
        {
            echo "0 结果";
        }

        
        ?>
        </div>
    </div>
     <h3 style="text-align: center">
    <a href="borrowbook.php">借书服务</a>
    <a href="returnbook.php">还书服务</a>
    <a href="changebook.php">更改图书位置</a>
    <a href="deletebook.php">丢失现有书籍</a>
	<a href="searchbook.php">查询书籍</a>
    </h3>

     <div align="center">
       <?php
    mysql_select_db($database);
    $view = 
    "create view allbook 
    as select book.bookId, book.bookName, storage.Floor,storage.Number 
    from book, storage 
    where book.bookId = storage.bookId";
    mysql_query($view);

    
    mysql_close();
    ?>
     </div>
</body>
</html>