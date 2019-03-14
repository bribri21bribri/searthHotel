<?php include __DIR__.'./_connectDB.php' ?>

<?php include __DIR__.'./_header.php' ?>
<?php include __DIR__.'./_navbar.php' ?>
<?php
$sql = "SELECT * FROM coupon";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC)

?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
        <tr>
          <th scope="col"><i class="fas fa-edit"></i></th>
          <th scope="col">c_id</th>
          <th scope="col">c_name</th>
          <th scope="col">code</th>
          <th scope="col">c_valid</th>
          <th scope="col">dis_type</th>
          <th scope="col">c_rate</th>
          <th scope="col">c_amount</th>
          <th scope="col">restrict_id</th>

          <th scope="col"><i class="fas fa-trash-alt"></i></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
          <tr>
            <td>
              <a href="_coupon_edit.php?sid=<?= $row['c_id'] ?>">
                <i class="fas fa-edit"></i>
              </a>
            </td>
            <td><?= $row['c_id'] ?></td>
            <td><?= $row['c_name'] ?></td>
            <td><?= $row['code'] ?></td>
            <td><?= $row['c_valid'] ?></td>
            <td><?= htmlentities($row['dis_type']) ?></td>
            <td><?= $row['c_rate'] ?></td>
            <td><?= $row['c_amount'] ?></td>
            <td><?= $row['restrict_id'] ?></td>
            <td>
              <a href="#">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>


          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>





















<?php include __DIR__.'./_footer.php' ?>
