<?php
/*
ここはあとで表形式の表示に書き換え
*/


/* ステートメントハンドラを取得 */
try{
  // トランザクション開始
  $pdo->beginTransaction();
  // SQL文を発行
  $sql = "SELECT * FROM timecard";
  // ステートメントハンドラを取得
  $stmh = $pdo->prepare($sql);
  // 実行
  $stmh->execute();
  // 書き込み件数を取得
  $count = $stmh->rowCount();
  // トランザクション終了
  $pdo->commit();

}catch(PDOException $Exception){
  print "エラー：".$Exception->getMessage();
}

/* 書き込み件数を表示 */
if($count == 0){
  // 書き込みがないとき
  print "データがありません。<br>";
}
?>

<?php
/* 書き込みを表示する */
while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
?>

名前：<?php print $row['name']; ?><br>
時間：<?php print $row['datetime']; ?><br>
区分：<?php print $row['category']; ?><br>

<br>
<br>

<?php
}
?>