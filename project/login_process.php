<?php
session_start();  
if ($_SESSION['code'] == $_POST['yzm_code']) {  
    //echo "验证码输入正确";  
} else {  
    echo "<script LANGUAGE='javascript'>alert('请输入正确的验证码！');history.go(-1);</script>";
}  
//获取表单数据
$username=$_POST["username"];
$pwd=$_POST["pwd"];

$lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('连接失败 : ' . mysql_error());
//设定当前的连接数据库为bookstore
mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
//根据用户输入的用户名和密码设置查询语句
$myquery="Select * from users  where username='". $username ."' and password='".$pwd."'";
$result=mysql_query($myquery) or die("<br>更新失败: " . mysql_error()); //执行插入sql语句
$recordCount=mysql_num_rows($result); //获取记录数
//如果记录数为0，说明登录用户不存在
if($recordCount==0) 
echo "<script LANGUAGE='javascript'>alert('你输入的用户不存在！');history.go(-1);</script>";

$row=mysql_fetch_array($result);
$_SESSION['username']=$row["username"];

echo "<script language='javascript'>";
echo "alert('登录成功！');";
echo "window.location.href='mainpage.php';";
echo "</script>";
mysql_free_result($result);
mysql_close();
?>