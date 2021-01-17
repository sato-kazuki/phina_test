<?php
// form.phpから送信されてきた場合
if(isset($_FILES["image"])){
  //名前が空のとき
  if($_FILES["image"]["name"] == ''){
    $isimage = false;
  }else{
    $isimage = true;
  }
}
?>

<?php
// データベースに追加する
if(isset($isimage)){
  if($isimage){
    $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
    $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
      if (exif_imagetype($_FILES['image']['tmp_name'])) {
          move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);
          $message = '画像をアップロードしました';
          try{
            // トランザクション開始
            $pdo->beginTransaction();
            // SQL文を発行
            $sql = "INSERT INTO image_uploader(imagename) VALUES (:_image)";
            // ステートメントハンドラを取得
            $stmh = $pdo->prepare($sql);
            // 値を結びつける
            $stmh->bindValue(":_image", $image, PDO::PARAM_STR);
            // 実行
            $stmh->execute();
            // トランザクション終了
            $pdo->commit();
      
          }catch(PDOException $Exception){
            $pdo->rollBack;
            print "エラー".$Exception->getMessage();
          }
      } else {
          $message = '画像ファイルではありません';
      }
  }
}
?>