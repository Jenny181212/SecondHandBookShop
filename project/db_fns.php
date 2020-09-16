<?php
//连接数据库的函数
function db_connect() {
   $result = new mysqli('localhost', 'root', 'xianyang', 'bookstore');
   mysqli_query($result,"SET NAMES gb2312");
   if (!$result) {
      return false;
   }
   $result->autocommit(TRUE);
   return $result;
}
//计算购物车中所有商品的价格
function calculate_price($cart) {
  // sum total price for all items in shopping cart
  $price = 0.0;
  if(is_array($cart)) {
    $conn = db_connect();
    foreach($cart as $bookID => $qty) {
      $query = "select price from books where bookID=".$bookID."";
      $result = $conn->query($query);
      if ($result) {
        $item = $result->fetch_object();
        $item_Price = $item->price;
        $price +=$item_Price*$qty;
      }
    }
  }
  return $price;
}
//计算购物车中所有商品的总数
function calculate_items($cart) {
  // sum total items in shopping cart
  $items = 0;
  if(is_array($cart))   {
    foreach($cart as $bookID => $qty) {
      $items += $qty;
    }
  }
  return $items;
}
//将数据集转换为数组
function db_result_to_array($result) {
   $res_array = array();
   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }
   return $res_array;
}
//获取商品价格
function get_book_Price($bookID) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select price from books
             where bookID = ".$bookID."";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->price;
}
//获得商品名称
function get_book_Name($bookID) {
   $conn = db_connect();
   $query = "select bookName from books
             where bookID = ".$bookID."";   
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->bookName;
}
//获得商品图片路径
function get_book_Pic($bookID) {
   $conn = db_connect();
   $query = "select pic from books
             where bookID = ".$bookID."";
   //mysql_query("set names gb2312");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->pic;
}
?>
