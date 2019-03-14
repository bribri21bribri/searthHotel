<?php include __DIR__ . '/_connectDB.php' ?>
<?php
$perPage = 5;


if (isset($_POST['submit']) ) {

    $title = $_POST['title'];

    $region = $_POST['region'];
    $query = "SELECT * FROM hotel WHERE title LIKE :title";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':title', '%' . $title . '%', PDO::PARAM_STR);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

}




?>







<?php include __DIR__ . '/_header.php' ?>
<?php include __DIR__ . '/_searchBar.php' ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">sid</th>
                    <th scope="col">title</th>
                    <th scope="col">discription</th>
                    <th scope="col">type</th>
                    <th scope="col">phone</th>
                    <th scope="col">fax</th>
                    <th scope="col">avg</th>
                    <th scope="col">site</th>
                    <th scope="col">img</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($title)): ?>
                    <?php foreach($rows as $row):?>
                        <tr>
                            <td><?=$row['sid']?></td>
                            <td><?=$row['title']?></td>
                            <td><?=$row['discription']?></td>
                            <td><?=$row['type']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['fax']?></td>
                            <td><?=$row['avg']?></td>
                            <td><?=$row['title']?></td>
                            <td><?=$row['img']?></td>

                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include __DIR__ . '/_footer.php' ?>
