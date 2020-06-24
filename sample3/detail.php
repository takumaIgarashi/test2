<?php
// @codingStandardsIgnoreFile

// $id = $_GET['id'];
require_once('db.php');
$db = new Db();



if (!$_GET){
    exit('IDが不正です');    
}


$result = $db->getBlogContent($_GET['id']);
// function dbConnect(){
//     try{
//         $dbh = new PDO('mysql:host=localhost;dbname=sample;charset=utf8','takumaIga','6AVAkig2',[
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//             PDO::ATTR_EMULATE_PREPARES => false,
//         ]);
       
//     } catch(PDOException $e){
//         echo '接続失敗' . $e->getMessage();
//         exit();
//     };

//     return $dbh;
// }




// var_dump($result);

// $sql ='select * from blogs where id = :id';
// $stmt = $dbh->prepare($sql);
// $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);

// $stmt->execute();
// $result = $stmt->fetch(PDO::FETCH_ASSOC);

// if(!$result){
//     exit('ブログがありません。');
// }

// var_dump('result');



// function setCategoryName($category){
//     if ($category === 1){
//         return 'ブログ';
//     }elseif ($category === 2){
//         return '日常';
//     }else{
//         return 'その他';
//     }
// }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
</head>
<body>
    <h1>ブログ詳細</h1>
    <h2>タイトル：<?php echo $result['title'] ?></h2>
    <p>投稿日：<?php echo $result['post_At'] ?></p>
    <p>カテゴリ：<?php echo $db->setCategoryName($result['category']) ?></p>
    <hr>
    <p>本文：<?php echo ($result['content']);?></p>
</body>
</html>
