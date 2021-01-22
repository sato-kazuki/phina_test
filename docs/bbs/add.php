<?php
// form.phpから送信されてきた場合
if(isset($_POST["name"], $_POST["comment"])){

  //名前が空のとき
  if($_POST["name"] == ''){
    $isName = false;
  }else{
    $isName = true;
  }

  // 内容が空のとき
  if($_POST["comment"] == ''){
    $isComment = false;
  }else{
    $isComment = true;
  }
}
?>

<?php
// データベースに追加する
if(isset($isName, $isComment)){
  if($isName && $isComment){

    try{
      // トランザクション開始
      $pdo->beginTransaction();
      // SQL文を発行
      $sql = "INSERT INTO bbs(name, comment) VALUES (:_name, :_comment)";
      // ステートメントハンドラを取得
      $stmh = $pdo->prepare($sql);
      // 値を結びつける
      $stmh->bindValue(":_name", $_POST["name"], PDO::PARAM_STR);
      $stmh->bindValue(":_comment", $_POST["comment"], PDO::PARAM_STR);
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