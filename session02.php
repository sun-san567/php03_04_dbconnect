<?php
// sessionに保存されている変数を取り出して表示しよう
session_start();
var_dump($_SESSION['number']);
var_dump($_SESSION['langueges']);
echo $_SESSION['languages'][0];    // 正しいスペル
echo $_SESSION['languages'][1];
echo $_SESSION['languages'][2];
exit();
