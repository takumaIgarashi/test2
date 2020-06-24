<?php
// @codingStandardsIgnoreFile

ini_set('display_errors',"On");
class Db{

    protected $table_name ='blogs';

    function dbConnect(){
        try{
            $dbh = new PDO('mysql:host=localhost;dbname=sample;charset=utf8','takumaIga','6AVAkig2',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                ]);
        
            } catch(PDOException $e){
                echo '接続失敗' . $e->getMessage();
            exit();
        };

        return $dbh;
    }

    function getAllBlog() {
        
        $dbh = $this->dbConnect();
        
        $sql ='select * from blogs';
        $stmt = $dbh->query($sql);
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        return $result;
        $dbh = null;
        
    }

    function getBlogContent($id){

        $dbh = $this->dbConnect();

        $sql ='select * from blogs where id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result;

        if(!$result){
            exit('ブログがありません。');
        }

    }

    // $blogData = getAllBlog();


    function setCategoryName($category){
        if ($category === 1){
            return 'ブログ';
        }elseif ($category === 2){
            return 'プログラミング';
        }else{
            return 'その他';
        }
        
    }

    function createBlog($blog){
                
        $sql = "insert into 
                    $this->table_name(title,content,category, publish_status) 
                values    
                    (:title, :content, :category, :publish_status)";

        $dbh = $this->dbConnect();

        $dbh->beginTransaction();

        try{
            $stmt = $dbh->prepare($sql);

            $stmt->bindValue(':title',$blog['title'],PDO::PARAM_STR);
            $stmt->bindValue(':content',$blog['content'],PDO::PARAM_STR);
            $stmt->bindValue(':category',$blog['category'],PDO::PARAM_INT);
            $stmt->bindValue(':publish_status',$blog['publish_status'],PDO::PARAM_INT);

            $stmt->execute();
            $dbh->commit();

            echo '投稿完了しました！！';
        }catch(PDOException $e){

            $dbh->rollback();
            exit($e);
        }

    }

    function judge($blog){
        
        if (empty($blog['title'])){
            exit('タイトルを入力してください');
        }

        if (mb_strlen($blog['title']>191)){
            exit('タイトルは191文字以下です。');
        }

        if (empty($blog['content'])){
            exit('本文を入力してください');
        }

        if (empty($blog['category'])){
            exit('カテゴリーは必須です');
        }

    }


    function blog_Update($blog){
        $sql = "update $this->table_name set 
                    title = :title ,content = :content , category = :category, publish_status = :publish_status
                where    
                    id = :id ";

        $dbh = $this->dbConnect();

        $dbh->beginTransaction();

        try{
            $stmt = $dbh->prepare($sql);

            $stmt->bindValue(':title',$blog['title'],PDO::PARAM_STR);
            $stmt->bindValue(':content',$blog['content'],PDO::PARAM_STR);
            $stmt->bindValue(':category',$blog['category'],PDO::PARAM_INT);
            $stmt->bindValue(':publish_status',$blog['publish_status'],PDO::PARAM_INT);
            $stmt->bindValue(':id',$blog['id'],PDO::PARAM_INT);

            $stmt->execute();
            $dbh->commit();

            echo '投稿更新しました！！';
        }catch(PDOException $e){

            $dbh->rollback();
            exit($e);  
        }
    }

}

?>
<!-- 
    <!DOCTYPE html>
    <html lang="ja">
        <head>
            
            <link rel="stylesheet" href="css/stely.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ブログ一覧</title>
        </head>
        <body>
<h2>ブログ一覧</h2>

<table border="1" style="border-collapse: collapse">
    <tr>
        <th>NO</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
        <th></th>
    </tr>
    <?php foreach($blogData as $column): ?>

        <tr>
            <td><?php echo $column['id'] ?></td>
        <td><?php echo $column['title'] ?></td>
        <td><?php echo setCategoryName($column['category']) ?></td>
        <td><a href="/detail.php?id=<?php echo $column['id']?>">詳細</a></td>
    </tr>
    <?php endforeach;?>
</table>

</body>
</html> -->
