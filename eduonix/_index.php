<?php require  'classes/Database.php';

$database = new Database();
$database->query('SELECT * FROM posts WHERE  id = :id');
$database->bind(':id',1);
$rows = $database->resultset();
?>
<h1>Posts</h1>
<div>


<?php foreach ($rows as $row): ?>

  <div>
    <h3><?= $row['title'] ?></h3>
    <p><?= $row['body']?>/p>
  </div>
<?php endforeach; ?>

</div>