<?php include __DIR__ . '/_connectDB.php'; ?>
<?php include __DIR__ . '/_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<?php
//$sql = "SELECT * FROM hotel2 ORDER BY sid";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([]);
//
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['searchWord'])){
    $searchWord = htmlentities($_GET['searchWord']);
  $sql = "SELECT * FROM hotel2 WHERE title LIKE :searchWord";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':searchWord', '%' . $searchWord . '%', PDO::PARAM_STR);

  $stmt->execute();

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  print_r($rows);

}

?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form action="_searchbar.php" method="GET">
        <div class="form-group">
          <label for="exampleInputEmail1">Search</label>
          <input type="text" class="form-control" name="searchWord" aria-describedby="emailHelp" placeholder="Search for">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        <ul class="list-group">
      <?php if(isset($_GET['searchWord'])): ?>
      <?php foreach($rows as $row): ?>
        <li class="list-group-item">
            <?= $row['title'] ?>
        </li>
      <?php endforeach; ?>
      <?php endif;?>
       </ul>
    </div>
  </div>
</div>






<?php include __DIR__ . '/_footer.php'; ?>

































<?php include __DIR__ . '/_footer.php'; ?>
