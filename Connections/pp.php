<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pp = "localhost";
$database_pp = "pp";
$username_pp = "root";
$password_pp = "";
$pp = mysql_pconnect($hostname_pp, $username_pp, $password_pp) or trigger_error(mysql_error(),E_USER_ERROR); 
?>