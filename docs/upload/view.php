<?php

/* ステートメントハンドラを取得 */
try{
  // トランザクション開始
  $pdo->beginTransaction();
  // SQL文を発行
  $sql = "SELECT * FROM image_uploader";
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
?>

<?php
/* 書き込みを表示する */
while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
?>

番号：<?php print $row['id']; ?><br>
時間：<?php print $row['timestamp']; ?><br>
<img src="images/<?php echo $row['imagename']; ?>" width="300" height="auto"><br>

<br>
<br>

<?php
}
?>