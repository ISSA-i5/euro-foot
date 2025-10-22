<?php

$db_host = 'localhost';
$db_name = 'eurofoot';
$db_user = 'root';
$db_password = '';
$db_port = 3307;

$pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8", $db_user, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
