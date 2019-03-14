<?php include __DIR__ . '/_connectDB.php' ?>

<?php
//render page number
$per_page = 5;


$page = isset($_GET['page']) ? intval($_GET['page']): 1;
$t_sql = "SELECT COUNT(1) FROM hotel";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


$total_pages = ceil($total_rows/$per_page);

if($page <1){
    $page = 1;
}
if($page > $total_pages){
    $page = $total_pages;
}
//fetch data
$sql = sprintf("SELECT * FROM hotel LIMIT %s, %s",($page-1)*$per_page,$per_page);
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>







<?php include __DIR__ . '/_header.php' ?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination">
                    <li class="page-item <?= $page<=1?'disable':''?>">
                        <a class="page-link" href="?page=<?= $page-1?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($i = 1;$i<=$total_pages;$i++): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $i ?>">
                            <?= $i?>
                        </a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page>$total_pages?'disable':''?>">
                        <a class="page-link" href="?page=<?= $page+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
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
                        <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?=$row['sid']?></td>
                            <td><?=$row['title']?></td>
                            <td><?=$row['discription']?></td>
                            <td><?=$row['type']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['fax']?></td>
                            <td><?=$row['avg']?></td>
                            <td><a href="<?=$row['site']?>"><?=$row['site']?></a></td>
                            <td><?=$row['address']?></td>

                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include __DIR__ . '/_header.php' ?>
