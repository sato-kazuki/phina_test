<?php
require 'init.php';
/* ステートメントハンドラを取得 */
try{
    // トランザクション開始
    $pdo->beginTransaction();
    // SQL文を発行
    $sql = "SELECT name, category, datetime FROM timecard";
    // ステートメントハンドラを取得
    $stmh = $pdo->prepare($sql);
    // 実行
    $stmh->execute();
    // トランザクション終了
    $pdo->commit();
  
  }catch(PDOException $Exception){
    print "エラー：".$Exception->getMessage();
}

$outputdata = $stmh->fetchAll();


// CSVファイル出力
export($outputdata);

return;

?>
<?php
//csv出力処理関数
function export($data)
{


    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=data.csv');

    $csv_header = array(
      'name',
      'datetime',
      'category'
    );

    $stream = fopen('php://output', 'w');
    fputcsv($stream, $csv_header);

    foreach($data as $key => $assoc_row){
        $numeric_row = array();
        foreach ($csv_header as $header_name) {
            mb_convert_variables('SJIS-win', 'UTF-8', $assoc_row[$header_name]);
            $numeric_row[] = $assoc_row[$header_name];
        }
        fputcsv($stream, $numeric_row);
    }
}
?>