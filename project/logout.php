<?php
session_start();
unset($_SESSION['user']);
session_destroy();

echo "<script language='javascript'>";
echo "alert('注销成功！');";
echo "window.location.href='mainpage.php';";
echo "</script>";

?>
