<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户登录</title>
<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="login_process.php">
  <table width="500" border="1" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="center">请输入登录信息</td>
    </tr>
    <tr>
      <td width="199" align="right">用户名</td>
      <td width="295"><label>
        <input name="username" type="text" id="username" />
      </label></td>
    </tr>
   
    <tr>
      <td align="right">密&nbsp;&nbsp;码</td>
      <td><label>
        <input name="pwd" type="password" id="pwd" />
      </label></td>
    </tr>
	
	<tr>
      <td align="right">验证码</td>
      <td>
	  <input name="yzm_code" type="text" id="yzm_code" value="" size="10" maxlength="4">
		<img id="yanzhengma" src="getcode.php" alt="登录验证码" border="0" style="cursor:hand;margin-bottom:-7px;" title="看不清，点这里换一张"/></td>
    </tr>
	
	
	<tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="Submit" value="登录" />
        &nbsp;<input type="reset" name="Submit2" value="重置" />
        &nbsp;<input type="button" name="Submit3" id="zhuce" value="注册" />
      </label></td>
    </tr>
  </table>
</form>
<script type="text/javascript">  
document.getElementById("yanzhengma").onclick = function() {  
   this.src = "getcode.php?t=" + Math.random();  
}  
document.getElementById("zhuce").onclick = function() {  
   window.location.href = "reg.php";  
}  
</script>  
</body>
</html>
