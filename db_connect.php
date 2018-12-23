<?php 

// To protect MySQL injection for Security purpose

$dbhost='127.0.0.1';
$dbuser='root';
$dbpass='';
$dbname='admisson';
$db_connect=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname")or die('sorry ,dont conncet');