<?php session_start();
include ('db_fns.php'); 
header('content-type:text/html;charset=gb2312;')

?><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ﳵ</title>
<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>
</head>
<?php

$bookID=$_POST['bookID'];

  if($bookID) {
    //��һ����Ʒѡ��ʱ�������ﳵ
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array(); //����$_SESSION['cart']Ϊ���飬�����洢��ѡ��Ʒ
      $_SESSION['items'] = 0;  //$_SESSION['items']�����洢��Ʒ����
      $_SESSION['total_price'] ='0.00'; //$_SESSION['total_price']�����洢��Ʒ�ܼ�
    }
    //�������Ʒ��һ��ѡ������������Ϊ1��������������1
    if(isset($_SESSION['cart'][$bookID])) {
      $_SESSION['cart'][$bookID]++;
    } else {
      $_SESSION['cart'][$bookID] = 1;
    }
    //������Ʒ�ܼۺ��ܵ���Ʒ����
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }
  /*�������ˡ��޸Ĺ��ﳵ�������޸Ĺ��ﳵ����Ʒ���������¼��㹺�ﳵ����Ʒ�ܼۺ��ܵ���Ʒ����*/
  if(isset($_POST['save'])) {
    foreach ($_SESSION['cart'] as $bookID => $qty) {
	  /*�������Ʒ���������޸�Ϊ0�����ڹ��ﳵ��ɾ������Ʒ�����򽫸���Ʒ�������޸�Ϊָ��������*/
      if($_POST[$bookID] == '0') {
        unset($_SESSION['cart'][$bookID]);
      } else {
        $_SESSION['cart'][$bookID] = $_POST[$bookID];
      }
    }
    //���¼�����Ʒ�ܼۺ��ܵ���Ʒ����
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }
  //������ﳵ������Ʒ����ʾ��Щ��Ʒ
  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    ?>
	
<form action="shopCart.php" method="post">
	<table border="0" width="100%" cellspacing="0"  bgcolor="#FFFFFF">
         
         <tr><th bgcolor="#cccccc">ͼƬ</th>
		 <th bgcolor="#cccccc">����</th>
         <th bgcolor="#cccccc">�۸�</th>
		 <th bgcolor="#cccccc">����</th>
         <th bgcolor="#cccccc">С��</th>
         </tr>
	<?php
	foreach ($_SESSION['cart'] as $bookID => $qty)  { 
	?>
	
	<tr><td height="118" align="center">
  <img src="<?php echo get_book_Pic($bookID) ?>" style="border: 1px solid black" width="80" height="89"/></td>
<td align="left"><a href="book.php?id=<?php echo $bookID ?>"><?php echo get_book_Name($bookID) ?></a></td>
          <td align="center"><?php echo get_book_Price($bookID) ?></td>
          <td align="center"><input type="text" name="<?php echo $bookID ?>" value="<?php echo $qty ?>" size="3"></td>
		  <td align="center"><?php echo get_book_Price($bookID)*$qty ?>Ԫ</td></tr>
	
	<?php
	}
	?>
	<tr>
        <th colspan="3" bgcolor="#cccccc">&nbsp;</td>
        <th align="center" bgcolor="#cccccc"><?php echo calculate_items($_SESSION['cart']) ?></th>
        <th align="center" bgcolor="#cccccc">
            <?php echo calculate_price($_SESSION['cart']) ?>Ԫ
        </th>
        </tr>
	<tr>
	  <td height="30" colspan="5" align="center"><input name="save" type="submit" id="save" value="���/ɾ����Ʒ" /></td>
	</tr>
		</table></form>
	
	<?php
		
  } else {
    echo "<p align=center>���ﳵû����Ʒ������ѡ����Ʒ��</p><hr/>";
  }
?>
<p align="center">[<a href="mainpage.php">��������</a>]&nbsp;
[<a href="pay.php?price=<?php echo calculate_price($_SESSION['cart']) ?>">����</a>]
</p>