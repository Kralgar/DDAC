<?php

$dbServerName = 'maerskddactp039167-mysqldbserver.mysql.database.azure.com';
$dbUserName = 'mysqldbuser@maerskddactp039167-mysqldbserver';
$dbPassword = 'pass@123';
$dbName = 'cms_database';

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
