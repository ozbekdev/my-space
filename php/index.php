<?php
declare(strict_types=1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Tashkent');

try {
    $dsn = 'mysql:dbname=blog;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $pdo = new PDO($dsn, $user, $password);

    if (isset($_POST["title"], $_POST['author'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $createdAt = date('Y-m-d H:i:s');

        $pdoStatement = $pdo->prepare("
            INSERT INTO blogs
            (title, author, content, createdAt)
            VALUES
            (:title, :author, :content, :createdAt)
        ");

        $pdoStatement->bindParam(":title", $title);
        $pdoStatement->bindParam(":author", $author);
        $pdoStatement->bindParam(":content", $content);
        $pdoStatement->bindParam(":createdAt", $createdAt);
        $pdoStatement->execute();
        echo "Post yaratildi";
    } else {
        echo "Xatolik bor";
    }

} catch (PDOException $e) {
    echo 'Xatolik' . $e->getMessage();
}