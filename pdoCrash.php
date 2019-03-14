<?php
$host = 'localhost';
$user = 'root';
$password = 'admin';
$dbname = 'pdoposts';

//set DSN (data source name)
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

//
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// PDO QUERY
// $stmt = $pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['title'] . '<br>';
// }
// while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//     echo $row->title . '<br>';
// }

//PREPARED STATEMENT(prepare&excute)

//UNSAFE
//$sql = "SELECT * FROM posts WHERE arthor = '$arthor'";

//FETCH MULTIPLE POSTS

//(pretend the following variable are from a form)
$arthor = 'bri';
$is_published = true;
$id = 1;
$limit = 1;
//positional params
$sql = 'SELECT * FROM posts WHERE arthor = ? && is_published = ? LIMIT ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$arthor, $is_published, $limit]);
$posts = $stmt->fetchAll();

//name params
// $sql = 'SELECT * FROM posts WHERE arthor = :arthor && is_published = :is_published';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['arthor' => $arthor, 'is_published' => $is_published]);
// $posts = $stmt->fetchAll();

// //var_dump($posts);
foreach ($posts as $post) {
    echo $post->title . '<br>';
}

//FETCH SINGLE POST(read)
// $sql = 'SELECT * FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $post = $stmt->fetch();

// echo $post->body;
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE  arthor = ?');
// $stmt->execute([$arthor]);
// $postCount = $stmt->rowCount();
// echo $postCount;

//INSERT DATA(create)
// $title = 'Post five';
// $body = 'this is post 5';
// $arthor = 'Kevin';

// $sql = 'INSERT INTO posts(title ,body, arthor) VALUE(:title, :body, :arthor)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'arthor' => $arthor]);
// echo 'Post Added';

//UPDATE DATA(update)
// $id = 1;
// $body = 'this is the updated post';

// $sql = 'UPDATE posts SET body = :body WHERE id= :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['body' => $body, 'id' => $id]);
// echo 'Post Update';

//DELETE DATA
// $id = 3;

// $sql = 'DELETE FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// echo 'Post Delete';

//SEARCH DATA
// $search = "%f%";
// $sql = 'SELECT * FROM posts WHERE title LIKE ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$search]);
// $posts = $stmt->fetchAll();

// foreach ($posts as $post) {
//     echo $post->title . '<br>';
// }
