<?php
$lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('连接失败 : ' . mysql_error());
mysql_query("set names gb2312");

mysql_select_db('bookstore', $lnk);

//获取查询项和查询关键字的值
$searchitem=$_POST['searchitem'];
$searchvalue=$_POST['searchvalue'];

/*定义查询语句，如果查询关键字的值不为空，则在SQL语句的Where子句中
指定查询项模糊匹配关键字，否则查询所有记录*/
if($searchvalue!="") 
  $myquery="SELECT * from books where {$searchitem} like '%{$searchvalue}%'";  
else
  $myquery="SELECT * from books";   
  

$result = mysql_query($myquery)	or die("<br>查询失败: " . mysql_error());

$row=mysql_fetch_array($result);

$id = $row["bookID"];

header("location:book.php?id=$id");

$row=mysql_fetch_array($result); 
?>

