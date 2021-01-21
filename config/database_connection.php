<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$dbConn = new mysqli("localhost", "root", "", "bantaypresyo");
if ($dbConn->connect_error) {
  die("Connection failed: " . $dbConn->connect_error);
} 
?>

