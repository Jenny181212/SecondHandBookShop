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
<table width="965" height="503" border="0" align="center">
  <tr>
    <td width="955" height="23" colspan="5" id= "title1" style=" font-weight:bold;color:#FFF">
	<?php 
	if($_SESSION["username"]!=""){
	  echo "欢迎您：".$_SESSION["username"]."，<a href='logout.php'>注销</a>&nbsp;
<a href='upload.php'>卖书</a>";
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
    <td height="25" colspan="5" bgcolor="#FFFFFF" style=" font-weight:bold">特价促销书籍：</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="269" align="center"><p><a href="book.php?id=14" target=_self><img src="image/books/14.jpg" width="96" height="144"></a></p>
    <p>三体（12.5元）</p>
    </td>
    <td align="center"><p><a href="book.php?id=11" target=_self><img src="image/books/11.jpg" width="112" height="144"></a></p>
    <p>告白（17.66元）</p>
    </td>
    <td align="center"><p><a href="book.php?id=15" target=_self><img src="image/books/15.jpg" width="108" height="144"></a></p>
      <p>解忧杂货店（4元）</p>
      
    </td>
    <td align="center"><p><a href="book.php?id=17" target=_self><img src="image/books/17.jpg" width="170" height="130"></a></p>
    <p>围城（8元）</p>
    </td>
    <td align="center"><p><a href="book.php?id=12" target=_self><img src="image/books/12.jpg" width="180" height="135"></a></p>
    <p>时间简史（5元）</p>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="5" id = "title4"><a href="mainpage.php">返回首页</a>&nbsp;</td>
  </tr>
</table>

</br>

</body>
</html>