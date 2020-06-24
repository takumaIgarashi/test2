<?php
// @codingStandardsIgnoreFile
$blog = $_POST;
require_once('db.php');

$db = new Db();
$db->judge($blog);
$db->blog_Update($blog);




?>