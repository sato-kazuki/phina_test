<?php
$ini = parse_ini_file('./db.ini', FALSE);
$dsn = 'mysql:host='.$ini['host'].';dbname='.$ini['dbname'].';charset=utf8mb4';
try{
  /* データベース接続 */
  $pdo = new PDO($dsn, $ini['dbusr'], $ini['dbpass']);
  /* エラーモード設定 */
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
}catch(PDOException $Exception){
  /* エラーメッセージ */
  die('接続エラー:'.$Exception->getMessage());
}
?>