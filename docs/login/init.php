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


// class DB {
//   //
//   protected function __construct() {
//   }
//   //
//   static public function getHandle() {
//       static $obj = null;
//       if (null === $obj) {
//           // XXX 本来はconfigファイルとかに書いてある
//           $dsn  = 'mysql:dbname=game_2018;host=localhost;charset=utf8mb4';
//           $user = 'game_2018';
//           $pass = 'game_2018';

//           // MySQL固有の設定
//           $opt = [
//               // 静的プレースホルダを指定
//               PDO::ATTR_EMULATE_PREPARES => false,
//           ];
//           //
//           try {
//               $obj = new PDO($dsn, $user, $pass, $opt);
//           } catch (PDOException $e) {
//               echo 'DB Connect error: ', $e->getMessage();
//               exit;
//           }
//       }
//       return $obj;
//   }
// }


?>