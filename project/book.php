<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>二手书城</title>
<style type="text/css">

.pa {
	text-align: center;
}


/*超链接*/
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	font-size: 14px;
}
a {
	color: #FFF;
	font-size: 14px;
	font-weight: bold;
}

/*风格设计*/
#title1 {
	background-image: url(image/%E5%A4%B4%E5%B8%98.jpg);
}

#title2 {
	background-image: url(image/%E6%A0%87%E9%A2%98%EF%BC%88%E5%B0%8F%EF%BC%89.jpg);
}

#title3 {
	background-image: url(image/%E5%A4%B4%E5%B8%98%EF%BC%88%E5%B0%8F%EF%BC%89.jpg);
}
#title4 {
	background-image: url(image/%E5%A4%B4%E5%B8%98%EF%BC%88%E4%B8%AD%EF%BC%89.jpg);
}

body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}

</style>
</head>

<body>
<table width="965" height="535" border="0" align="center">
  <tr>
    <td width="955" height="23" colspan="5" id= "title1"  style=" font-weight:bold;color:#FFF">
	<?php 
	if($_SESSION["username"]!=""){
	  echo "欢迎您：".$_SESSION["username"]."，<a href='logout.php'>注销</a>";
	}
	else{
	  echo "<a href='login.php'> 登录</a>&nbsp;
	  <a href='reg.php'>注册</a>&nbsp;
	  <a href='logout.php'>注销</a>";
	}
	?>
   
    </td>
  </tr>
  <tr>
    <td height="122" colspan="5" id = "title2">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="5" id = "title3"><form id="form1" name="form1" method="post" action="booksearch.php">
      <select name="searchitem">
          <option value="bookID" selected>书号</option>
               <option value="bookName">书名</option>
        </select>
    <input name="searchvalue" type="text" />
    <input name="search" type="submit" class="btn1" value="查询"/>
    </form></td>
  </tr>
  <tr>
    <td height="328" valign="top"bgcolor="#FFFFFF" style=" font-weight:bold"><p>书籍信息：</p>
    <?php  
$id=$_GET['id'];
$lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('连接失败 : ' . mysql_error());

mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
$result = mysql_query("SELECT * from books where bookID={$id}")
	or die("<br>查询表members失败: " . mysql_error());
//创建记录集
$row=mysql_fetch_array($result);
while($row)
{
?>
<Form method="post" action="shopCart.php">
<table width="600" height="237" border="1" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="166" rowspan="5" align="center"><img src="<?php echo $row["pic"] ?>" width="164" height="191"></td>
    <td width="328" height="47">书号：<?php echo $row["bookID"] ?>
    <input name="bookID" type="hidden" id="bookID" value="<?php echo $row["bookID"] ?>" />
	</td>
  </tr>
  <tr>
    <td height="47">书名：<?php echo $row["bookName"] ?></td>
  </tr>
  
  <tr>
    <td height="47">作者：<?php echo $row["author"] ?></td>
  </tr>
  <tr>
    <td height="47">价格：<?php echo $row["price"]?></td>
  </tr>
  <tr>
    <td height="47"><input name="buy" type="submit" value="购买"></td>
  </tr>
 
</table>
</Form>

  <?php
  $row=mysql_fetch_array($result);
}
?> 	
            
  <tr>
    <td height="25" colspan="5" id = "title4"><a href="mainpage.php">返回首页</a></td>
  </tr>
</table>

</br>

</body>
</html>