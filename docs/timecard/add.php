<?php
// form.phpから送信されてきた場合
if(isset($_POST["name"], $_POST["category"])){

  //名前が空のとき
  if($_POST["name"] == ''){
    $isName = false;
  }else{
    $isName = true;
  }

  // 内容が空のとき
  if($_POST["category"] == ''){
    $isCategory = false;
  }else{
    $isCategory = true;
  }
}
?>

<?php
// データベースに追加する
if(isset($isName, $isCategory)){
  if($isName && $isCategory){

    try{
      // トランザクション開始
      $pdo->beginTransaction();
      // SQL文を発行
      $sql = "INSERT INTO timecard(name, category) VALUES (:_name, :_category)";
      // ステートメントハンドラを取得
      $stmh = $pdo->prepare($sql);
      // 値を結びつける
      $stmh->bindValue(":_name", $_POST["name"], PDO::PARAM_STR);
      $stmh->bindValue(":_category", $_POST["category"], PDO::PARAM_STR);
      // 実行
      $stmh->execute();
      // トランザクション終了
      $pdo->commit();

    }catch(PDOException $Exception){
      $pdo->rollBack;
      print "エラー".$Exception->getMessage();
    }
  }
}
?>