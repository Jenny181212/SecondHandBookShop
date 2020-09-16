<?php session_start(); 
header('content-type:text/html;charset=gb2312;')?>

<?php
  if (isset($_POST['set'])) {
    $upload_slots = $_POST['slots'];
  } else {
    $upload_slots = 1;    // 默认文件上传数量
  }
  $max_size = 1000000;    // 文件最大上传字节数
  $location = "image/books/";  // 文件被上传后的目录 
                  
?>
<html><title>输入书籍信息</title>

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
        <p align="center"><b>输入信息</b></td>
    </tr>
    <tr> 
      <td width="100%"> 
        <table border="0" width="100%" cellpadding="4">
          <tr>
            <td width="30%" align="right" valign="top"><b>书号：</b></td>
            <td><input type="text" name="bookID" id="bookID"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>书名：</b></td>
            <td><input type="text" name="bookName" id="bookName"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>作者：</b></td>
            <td><input type="text" name="author" id="author"></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top"><b>价格：</b></td>
            <td><input type="text" name="price" id="price"></td>
          </tr>
          <tr> 
            <td width="30%" align="right" valign="top"><b>选择要上传的图片:</b></td>
            <td width="70%"> 
              <input type="hidden" name="MAX_FILE_SIZE" size="5200000">
<?php
  //动态输出文件上传表单控件
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
    <input type="submit" value="开始上传" name="upload">
  </p>
  </form>
  <? } 
  
  /*显示上传信息*/
  else { ?>

    <table width="674" border="0"  bgcolor="#FFFFFF">
      <tr> 
        <td width="100%"> 
          <p align="center"><b>文件上传信息</b></td>
      </tr>
      <tr> 
        <td width="100%"> 
          <table border="1" width="100%" cellspacing="3" cellpadding="6">
            <tr> 
              <td width="25%" align="center"><b>图片</b></td>
              <td width="15%" align="center"><b>书号</b></td>
              <td width="19%" align="center"><b>书名</b></td>
              <td width="19%" align="center"><b>作者</b></td>
              <td width="22%" align="center"><b>价格</b></td>
            </tr>
<?php

$bookID = $_POST['bookID'];
$bookName = $_POST['bookName'];
$price = $_POST['price'];
$author = $_POST['author'];

  // 循环检查每个提交的文件
  for ($num = 1; $num < $_POST['slots']+1; $num++){
    $event = "Success";
	// 检查是否有文件上传
    if (! $_FILES['upload'.$num]['name'] == ""){
      if ($_FILES['upload'.$num]['size'] < $max_size) {		
        move_uploaded_file($_FILES['upload'.$num]['tmp_name'],$location.$_FILES['upload'.$num]['name']) or $event = "Failure";		
		
	   } else {
	    $event = "File too large!";
	   }
    // 用pic来存储路径
	$pic = $location.$_FILES['upload'.$num]['name'];    
  $lnk = mysql_connect('localhost', 'root', 'xianyang') or die ('连接失败 : ' . mysql_error());
//设定当前的连接数据库为bookstore
mysql_select_db('bookstore', $lnk);
mysql_query("set names gb2312");
//获取表单数据
$bookID=$_POST['bookID'];

//设定查询语句，使用用户提交的用户名查询该用户是否已经注册
$myquery="select * from books where bookID='".$bookID."'";
//执行查询sql语句
$result=mysql_query($myquery) or die("<br>操作失败: " . mysql_error());
$num_rows = mysql_num_rows($result);
if($num_rows!=0){
  echo "<script language='javascript'>";
  echo "alert('书号重复，请重新填写！');";
  echo "window.location.href='upload.php';";
  echo "</script>";
}else{
  //设定插入语句
  $myquery="insert into books(bookID,bookName,price,pic,author) values('".$bookID."','".$bookName."','".$price."','".$pic."','".$author."')";  
  //执行插入sql语句
  $result=mysql_query($myquery) or die("<br>操作失败: " . mysql_error());
  echo "<script language='javascript'>";
  echo "alert('上传成功！');";
  echo "</script>";
}

	   // 显示上载文件的信息
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
    <p>[ <a href="upload.php">上载更多文件</a> ]&nbsp;
    [ <a href="mainpage.php">返回首页</a> ]
    </p>
   
</center>
 </div>
<? } ?>
</html>