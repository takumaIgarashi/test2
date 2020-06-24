<?php
// @codingStandardsIgnoreFile

$blog = $_POST;
require_once('db.php');

// $dbh = $db->dbConnect();


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




$db = new Db();
$db->judge($blog);
$db->createBlog($blog);


// if (empty($blog['title'])){
//     exit('タイトルを入力してください');
// }

// if (mb_strlen($blogs['title']>191)){
//     exit('タイトルは191文字以下です。');
// }

// if (empty($blog['content'])){
//     exit('本文を入力してください');
// }

// if (empty($blog['category'])){
//     exit('カテゴリーは必須です');
// }



// $sql = 'insert into 
//             blogs(title,content,category, publish_status) 
//         values    
//             (:title, :content, :category, :publish_status)';

// $dbh = dbConnect();

// $dbh->beginTransaction();

// try{
//     $stmt = $dbh->prepare($sql);

//     $stmt->bindValue(':title',$blog['title'],PDO::PARAM_STR);
//     $stmt->bindValue(':content',$blog['content'],PDO::PARAM_STR);
//     $stmt->bindValue(':category',$blog['category'],PDO::PARAM_STR);
//     $stmt->bindValue(':publish_status',$blog['publish_status'],PDO::PARAM_STR);

//     $stmt->execute();
//     $dbh->commit();

//     echo '投稿完了しました！！';
// }catch(PDOException $e){
    
//     $dbh->rollback();
//     exit($e);
// }

// if (empty($blog['publish_status'])){
//     exit('公開ステータスを選択してください');
// }


?>

