<?php
session_start();
$_SESSION['number'] = 100;
$_SESSION['languages'] = ['JAVA', 'PHP', 'Ruby'];  // 正しいスペル

var_dump($_SESSION['number']);
var_dump($_SESSION['languages']);  // 正しいスペル
echo $_SESSION['languages'][0];    // 正しいスペル
echo $_SESSION['languages'][1];
echo $_SESSION['languages'][2];
exit();
