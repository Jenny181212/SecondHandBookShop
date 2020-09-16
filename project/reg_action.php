<?php
$lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('连接失败 : ' . mysql_error());
//设定当前的连接数据库为bookstore
mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
//获取表单数据
$username=$_POST['username'];
$password=$_POST['password1'];

//设定查询语句，使用用户提交的用户名查询该用户是否已经注册
$myquery="select * from users where username='".$username."'";
//执行查询sql语句
$result=mysql_query($myquery) or die("<br>操作失败: " . mysql_error());
$num_rows = mysql_num_rows($result);
if($num_rows!=0){
  echo "<script language='javascript'>";
  echo "alert('注册失败，用户名已存在，请重新注册！');";
  echo "window.location.href='reg.php';";
  echo "</script>";
}else{
  //设定插入语句
  $myquery="insert into users(username,password) values('".$username."','".$password."')";  
  //执行插入sql语句
  $result=mysql_query($myquery) or die("<br>操作失败: " . mysql_error());
  echo "<script language='javascript'>";
  echo "alert('注册成功！');";
  echo "window.location.href='login.php';";
  echo "</script>";
}
mysql_free_result($result);
mysql_close();
?>  
