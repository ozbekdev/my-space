<?php

date_default_timezone_set('Asia/Tashkent');
$lastView = date('d-m-Y H:i') . ' ' . date_default_timezone_get();
setcookie('lastView', $lastView);


try {
    $pdo = new PDO('mysql:dbname=blog;host=127.0.0.1', 'root', '');
    $pdoStatement = $pdo->prepare('
        SELECT * FROM blogs;
    ');
    if ($pdoStatement->execute()) {
        for ($i = 0; $i < 2; $i++) {
            $row = $pdoStatement->fetch();
            echo $row['title'] . '<br/>' . $row['author'] . ' - ' . $row['createdAt'] . '<br/>' . $row['content'] . '<br/><br/>';
        }
    }
} catch (PDOException $e) {
    echo '' . $e->getMessage() . '';
}