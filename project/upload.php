<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<?php
  if (isset($_POST['set'])) {
    $upload_slots = $_POST['slots'];
  } else {
    $upload_slots = 1;    // Ĭ���ļ��ϴ�����
  }
  $max_size = 1000000;    // �ļ�����ϴ��ֽ���
  $location = "image/books/";  // �ļ����ϴ����Ŀ¼ 
                  
?>
<html><title>�����鼮��Ϣ</title>

<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>

<center>
  <?php if (! isset($_POST['upload'])){ ?>
  <form method="POST" enctype="multipart/form-data" action="upload.php">
  <table width="635"  bgcolor="#FFFFFF">
    <td width="100%"> 
        <p align="center"><b>������Ϣ</b></td>
    </tr>
    <tr> 
      <td width="100%"> 
        <table border="0" width="100%" cellpadding="4">
          <tr>
            <td width="30%" align="right" valign="top"><b>��ţ�</b></td>
            <td><input type="text" name="bookID" id="bookID"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>������</b></td>
            <td><input type="text" name="bookName" id="bookName"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>���ߣ�</b></td>
            <td><input type="text" name="author" id="author"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>�۸�</b></td>
            <td><input type="text" name="price" id="price"></td>
          </tr>
          <tr> 
            <td width="30%" align="right" valign="top"><b>ѡ��Ҫ�ϴ���ͼƬ:</b></td>
            <td width="70%"> 
              <input type="hidden" name="MAX_FILE_SIZE" size="5200000">
<?php
  //��̬����ļ��ϴ����ؼ�
  for($count = 1; $count < $upload_slots+1; $count++) {
    echo '<input type="file" name="upload'.$count.'" size="29"><br>';
  }
?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <p align="center"> 
    <input type="hidden" name="slots" value="<?php echo $upload_slots; ?>">
    <input type="submit" value="��ʼ�ϴ�" name="upload">
  </p>
  </form>
  <? } 
  
  /*��ʾ�ϴ���Ϣ*/
  else { ?>

    <table width="674" border="0"  bgcolor="#FFFFFF">
      <tr> 
        <td width="100%"> 
          <p align="center"><b>�ļ��ϴ���Ϣ</b></td>
      </tr>
      <tr> 
        <td width="100%"> 
          <table border="1" width="100%" cellspacing="3" cellpadding="6">
            <tr> 
              <td width="25%" align="center"><b>ͼƬ</b></td>
              <td width="15%" align="center"><b>���</b></td>
              <td width="19%" align="center"><b>����</b></td>
              <td width="19%" align="center"><b>����</b></td>
              <td width="22%" align="center"><b>�۸�</b></td>
            </tr>
<?php

$bookID = $_POST['bookID'];
$bookName = $_POST['bookName'];
$price = $_POST['price'];
$author = $_POST['author'];

  // ѭ�����ÿ���ύ���ļ�
  for ($num = 1; $num < $_POST['slots']+1; $num++){
    $event = "Success";
	// ����Ƿ����ļ��ϴ�
    if (! $_FILES['upload'.$num]['name'] == ""){
      if ($_FILES['upload'.$num]['size'] < $max_size) {		
        move_uploaded_file($_FILES['upload'.$num]['tmp_name'],$location.$_FILES['upload'.$num]['name']) or $event = "Failure";		
		
	   } else {
	    $event = "File too large!";
	   }
    // ��pic���洢·��
	$pic = $location.$_FILES['upload'.$num]['name'];    
  $lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('����ʧ�� : ' . mysql_error());
//�趨��ǰ���������ݿ�Ϊbookstore
mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
//��ȡ������
$bookID=$_POST['bookID'];

//�趨��ѯ��䣬ʹ���û��ύ���û�����ѯ���û��Ƿ��Ѿ�ע��
$myquery="select * from books where bookID='".$bookID."'";
//ִ�в�ѯsql���
$result=mysql_query($myquery) or die("<br>����ʧ��: " . mysql_error());
$num_rows = mysql_num_rows($result);
if($num_rows!=0){
  echo "<script language='javascript'>";
  echo "alert('����ظ�����������д��');";
  echo "window.location.href='upload.php';";
  echo "</script>";
}else{
  //�趨�������
  $myquery="insert into books(bookID,bookName,price,pic,author) values('".$bookID."','".$bookName."','".$price."','".$pic."','".$author."')";  
  //ִ�в���sql���
  $result=mysql_query($myquery) or die("<br>����ʧ��: " . mysql_error());
  echo "<script language='javascript'>";
  echo "alert('�ϴ��ɹ���');";
  echo "</script>";
}

	   // ��ʾ�����ļ�����Ϣ
       echo "<tr>";
	   echo "  <td width='25%' align='center'><font face='Tahoma' size='2'><img src=".$pic." style='border: 1px solid black' width='80' height='89'/></td>";
	   echo "  <td width='15%' align='center'><font face='Tahoma' size='2'>".$bookID."</td>";
	   echo "  <td width='19%' align='center'><font face='Tahoma' size='2'>".$bookName."</td>";
	   echo "  <td width='19%' align='center'><font face='Tahoma' size='2'>".$author."</td>";
	    echo "  <td width='22%' align='center'><font face='Tahoma' size='2'>".$price."</td>";
	   echo "</tr>";
	}
  }
 // mysql_free_result($result);
mysql_close();  
?>
          </table>
        </td>
      </tr>
    </table>
    <p>[ <a href="upload.php">���ظ����ļ�</a> ]&nbsp;
    [ <a href="mainpage.php">������ҳ</a> ]
    </p>
   
</center>
 </div>
<? } ?>
</html>