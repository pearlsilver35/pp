<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pp = "sql303.epizy.com";
$database_pp = "epiz_21379804_pp";
$username_pp = "epiz_21379804";
$password_pp = "6uE6ZjjX6tff";
$pp = mysql_pconnect($hostname_pp, $username_pp, $password_pp) or trigger_error(mysql_error(),E_USER_ERROR); 
?>