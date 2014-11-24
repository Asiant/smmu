<?php
$connect_error='Sorry we\'re experiencing downtime';
mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('sommudatabase') or die($connect_error);
?>