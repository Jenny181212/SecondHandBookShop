<?php
$lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('����ʧ�� : ' . mysql_error());
//�趨��ǰ���������ݿ�Ϊbookstore
mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
//��ȡ������
$username=$_POST['username'];
$password=$_POST['password1'];

//�趨��ѯ��䣬ʹ���û��ύ���û�����ѯ���û��Ƿ��Ѿ�ע��
$myquery="select * from users where username='".$username."'";
//ִ�в�ѯsql���
$result=mysql_query($myquery) or die("<br>����ʧ��: " . mysql_error());
$num_rows = mysql_num_rows($result);
if($num_rows!=0){
  echo "<script language='javascript'>";
  echo "alert('ע��ʧ�ܣ��û����Ѵ��ڣ�������ע�ᣡ');";
  echo "window.location.href='reg.php';";
  echo "</script>";
}else{
  //�趨�������
  $myquery="insert into users(username,password) values('".$username."','".$password."')";  
  //ִ�в���sql���
  $result=mysql_query($myquery) or die("<br>����ʧ��: " . mysql_error());
  echo "<script language='javascript'>";
  echo "alert('ע��ɹ���');";
  echo "window.location.href='login.php';";
  echo "</script>";
}
mysql_free_result($result);
mysql_close();
?>  
