<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�ע��</title>
<script language="javascript">
<!--
function isEmpty(text)//�ж��ַ����Ƿ�Ϊ��
{
	if(text=="")
		return true;
	else
		return false;
}
function isEqual(text1,text2)//�ж����ַ����Ƿ���ͬ
{	
	if(text1==text2)
		return true;
	else
		return false;
}
function check()
{
	var f=document.getElementById("form1");//��ȡ������
	if(isEmpty(f.username.value))//��֤�û����Ƿ�Ϊ��
	{
		alert("�û���������д����");
		f.username.focus();
		return false;
	}
	if(isEmpty(f.password1.value))//��֤�����Ƿ�Ϊ��
	{
		alert("���벻��Ϊ�գ���");
		f.password1.focus();
		return false;
	}
	if(isEmpty(f.password2.value))//��֤�ظ������Ƿ�Ϊ��
	{
		alert("�ظ����벻��Ϊ�գ���");
		f.password2.focus();
		return false;
	}
	if(!isEqual(f.password1.value,f.password2.value))//��֤���������Ƿ���ͬ
	{
		alert("�������ظ����������ͬ����");
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


<!-- ����ʼ -->
  <form name="form1" id="form1" method="post" action="reg_action.php" onSubmit="return check()">
<table width="374" height="145" border="1" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
    <tr>
      <td height="32" colspan="2" align="center">�û�ע��</td>
    </tr>
    <tr>
      <td width="114" height="28" align="center">�û�����</td>
      <td width="260"><label>
        <input name="username" type="text" id="username" />
      </label></td>
    </tr>
    <tr>
      <td height="25" align="center">���룺</td>
      <td><label>
        <input name="password1" type="password" id="password1" />
      </label></td>
    </tr>
    <tr>
      <td height="33" align="center">ȷ�����룺</td>
      <td><input name="password2" type="password" id="password2">
	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="reg" type="submit" id="reg" value="ע��" />&nbsp;&nbsp;
      <label>
      <input name="reset" type="reset" id="reset" value="����" />
      </label></td>
    </tr>
  </table>
</form>

</body>
</html>
