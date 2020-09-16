<?php session_start();
include ('db_fns.php'); 
header('content-type:text/html;charset=gb2312;')

?><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>购物车</title>
<style type="text/css">
body {
	background-image: url(image/%E8%83%8C%E6%99%AF%E5%9B%BE.jpg);
}
</style>
</head>
<?php

$bookID=$_POST['bookID'];

  if($bookID) {
    //第一个商品选择时创建购物车
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array(); //定义$_SESSION['cart']为数组，用来存储所选商品
      $_SESSION['items'] = 0;  //$_SESSION['items']用来存储商品总数
      $_SESSION['total_price'] ='0.00'; //$_SESSION['total_price']用来存储商品总价
    }
    //如果该商品第一次选择，则数量设置为1，否则数量增加1
    if(isset($_SESSION['cart'][$bookID])) {
      $_SESSION['cart'][$bookID]++;
    } else {
      $_SESSION['cart'][$bookID] = 1;
    }
    //计算商品总价和总的商品数量
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }
  /*如果点击了“修改购物车”，则修改购物车中商品数量并重新计算购物车中商品总价和总的商品数量*/
  if(isset($_POST['save'])) {
    foreach ($_SESSION['cart'] as $bookID => $qty) {
	  /*如果该商品的数量被修改为0，则在购物车中删除该商品，否则将该商品的数量修改为指定的数量*/
      if($_POST[$bookID] == '0') {
        unset($_SESSION['cart'][$bookID]);
      } else {
        $_SESSION['cart'][$bookID] = $_POST[$bookID];
      }
    }
    //重新计算商品总价和总的商品数量
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }
  //如果购物车中有商品就显示这些商品
  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    ?>
	
<form action="shopCart.php" method="post">
	<table border="0" width="100%" cellspacing="0"  bgcolor="#FFFFFF">
         
         <tr><th bgcolor="#cccccc">图片</th>
		 <th bgcolor="#cccccc">书名</th>
         <th bgcolor="#cccccc">价格</th>
		 <th bgcolor="#cccccc">数量</th>
         <th bgcolor="#cccccc">小计</th>
         </tr>
	<?php
	foreach ($_SESSION['cart'] as $bookID => $qty)  { 
	?>
	
	<tr><td height="118" align="center">
  <img src="<?php echo get_book_Pic($bookID) ?>" style="border: 1px solid black" width="80" height="89"/></td>
<td align="left"><a href="book.php?id=<?php echo $bookID ?>"><?php echo get_book_Name($bookID) ?></a></td>
          <td align="center"><?php echo get_book_Price($bookID) ?></td>
          <td align="center"><input type="text" name="<?php echo $bookID ?>" value="<?php echo $qty ?>" size="3"></td>
		  <td align="center"><?php echo get_book_Price($bookID)*$qty ?>元</td></tr>
	
	<?php
	}
	?>
	<tr>
        <th colspan="3" bgcolor="#cccccc">&nbsp;</td>
        <th align="center" bgcolor="#cccccc"><?php echo calculate_items($_SESSION['cart']) ?></th>
        <th align="center" bgcolor="#cccccc">
            <?php echo calculate_price($_SESSION['cart']) ?>元
        </th>
        </tr>
	<tr>
	  <td height="30" colspan="5" align="center"><input name="save" type="submit" id="save" value="添加/删减商品" /></td>
	</tr>
		</table></form>
	
	<?php
		
  } else {
    echo "<p align=center>购物车没有商品，请先选择商品。</p><hr/>";
  }
?>
<p align="center">[<a href="mainpage.php">继续购物</a>]&nbsp;
[<a href="pay.php?price=<?php echo calculate_price($_SESSION['cart']) ?>">结账</a>]
</p>