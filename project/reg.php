<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户注册</title>
<script language="javascript">
<!--
function isEmpty(text)//判断字符串是否为空
{
	if(text=="")
		return true;
	else
		return false;
}
function isEqual(text1,text2)//判断两字符串是否相同
{	
	if(text1==text2)
		return true;
	else
		return false;
}
function check()
{
	var f=document.getElementById("form1");//获取表单对象
	if(isEmpty(f.username.value))//验证用户名是否为空
	{
		alert("用户名必须填写！！");
		f.username.focus();
		return false;
	}
	if(isEmpty(f.password1.value))//验证密码是否为空
	{
		alert("密码不能为空！！");
		f.password1.focus();
		return false;
	}
	if(isEmpty(f.password2.value))//验证重复密码是否为空
	{
		alert("重复密码不能为空！！");
		f.password2.focus();
		return false;
	}
	if(!isEqual(f.password1.value,f.password2.value))//验证两次密码是否相同
	{
		alert("密码与重复密码必须相同！！");
		f.password1.focus();
		return false;
	}
	
	return true;
}
-->
</script>
<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>
</head>

<body>


<!-- 表单开始 -->
  <form name="form1" id="form1" method="post" action="reg_action.php" onSubmit="return check()">
<table width="374" height="145" border="1" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
    <tr>
      <td height="32" colspan="2" align="center">用户注册</td>
    </tr>
    <tr>
      <td width="114" height="28" align="center">用户名：</td>
      <td width="260"><label>
        <input name="username" type="text" id="username" />
      </label></td>
    </tr>
    <tr>
      <td height="25" align="center">密码：</td>
      <td><label>
        <input name="password1" type="password" id="password1" />
      </label></td>
    </tr>
    <tr>
      <td height="33" align="center">确认密码：</td>
      <td><input name="password2" type="password" id="password2">
	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="reg" type="submit" id="reg" value="注册" />&nbsp;&nbsp;
      <label>
      <input name="reset" type="reset" id="reset" value="重置" />
      </label></td>
    </tr>
  </table>
</form>

</body>
</html>
