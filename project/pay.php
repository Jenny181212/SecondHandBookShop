<?php  session_start();
header('content-type:text/html;charset=gb2312;')
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>支付</title>
<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>
</head>
<?php
$price = $_GET['price'];
?>

<table width="386" border="1" align="center"  bgcolor="#FFFFFF">
  <tr>
    <td width="162" height="72" align="center">总价：&nbsp;</td>
    <td width="208" align="center"><?php echo $price ?>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">请扫码支付：</td>
    <td align="center"><img src="image/收款码.jpg" width="170" height="170" /></td>
  </tr>
</table>
<p align="center"><a href="mainpage.php">返回首页</a>&nbsp;

</p>