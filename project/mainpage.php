<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������</title>
<style type="text/css">

.pa {
	text-align: center;
}


/*������*/
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

/*������*/
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
	  echo "��ӭ����".$_SESSION["username"]."��<a href='logout.php'>ע��</a>&nbsp;
<a href='upload.php'>����</a>";
	}
	else{
	  echo "<a href='login.php'> ��¼</a>&nbsp;
	  <a href='reg.php'>ע��</a>&nbsp;
	  <a href='logout.php'>ע��</a>";
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
          <option value="bookID" selected>���</option>
               <option value="bookName">����</option>
        </select>
    <input name="searchvalue" type="text" />
    <input name="search" type="submit" class="btn1" value="��ѯ"/>
    </form></td>
  </tr>
  <tr>
    <td height="25" colspan="5" bgcolor="#FFFFFF" style=" font-weight:bold">�ؼ۴����鼮��</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="269" align="center"><p><a href="book.php?id=14" target=_self><img src="image/books/14.jpg" width="96" height="144"></a></p>
    <p>���壨12.5Ԫ��</p>
    </td>
    <td align="center"><p><a href="book.php?id=11" target=_self><img src="image/books/11.jpg" width="112" height="144"></a></p>
    <p>��ף�17.66Ԫ��</p>
    </td>
    <td align="center"><p><a href="book.php?id=15" target=_self><img src="image/books/15.jpg" width="108" height="144"></a></p>
      <p>�����ӻ��꣨4Ԫ��</p>
      
    </td>
    <td align="center"><p><a href="book.php?id=17" target=_self><img src="image/books/17.jpg" width="170" height="130"></a></p>
    <p>Χ�ǣ�8Ԫ��</p>
    </td>
    <td align="center"><p><a href="book.php?id=12" target=_self><img src="image/books/12.jpg" width="180" height="135"></a></p>
    <p>ʱ���ʷ��5Ԫ��</p>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="5" id = "title4"><a href="mainpage.php">������ҳ</a>&nbsp;</td>
  </tr>
</table>

</br>

</body>
</html>