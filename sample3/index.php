<?php
// @codingStandardsIgnoreFile
require_once('db.php');
$db = new Db();

$blogData = $db->getAllBlog();


?>

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
<p><a href="form.html">新規投稿＿作成</a></p>

<table border="1" style="border-collapse: collapse">
    <tr>
        <th>NO</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($blogData as $column): ?>

    <tr>
        <td><?php echo $column['id'] ?></td>
        <td><?php echo $column['title'] ?></td>
        <td><?php echo $db->setCategoryName($column['category']) ?></td>
        <td><a href="/detail.php?id=<?php echo $column['id']?>">詳細</a></td>
        <td><a href="/edit.php?id=<?php echo $column['id']?>">編集</a></td>
    </tr>
    <?php endforeach;?>
</table>

</body>
</html>
