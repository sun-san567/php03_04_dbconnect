<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

function connect_to_db()
{
  // 問題なし
  $env = parse_ini_file('.env');

  $db_name = $env['DB_NAME'];
  $db_host = $env['DB_HOST'];
  $db_id = $env['DB_USER'];
  $db_pw = $env['DB_PASSWORD'];

  try {
    // データベース接続文字列の構築
    $server_info = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    // PDOの設定オプション
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // エラーモードを例外モードに設定
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 連想配列形式でデータを取得
      PDO::ATTR_EMULATE_PREPARES => false               // プリペアドステートメントを有効化
    ];

    // PDOインスタンスを作成してデータベースに接続
    $pdo = new PDO($server_info, $db_id, $db_pw, $options);

    // PDOインスタンスを返す
    return $pdo;
  } catch (PDOException $e) {
    // データベース接続エラー時のエラーメッセージを表示して終了
    exit('DB Connection Error: ' . $e->getMessage());
  }
}

function check_session_id()
{
  if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] !== session_id()) {
    header('Location:todo_login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}
