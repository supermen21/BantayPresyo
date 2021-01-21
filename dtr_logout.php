<?php
echo "Logged out successfully";
session_start();
session_destroy();
header("location:/mindex.php");
exit();
?>