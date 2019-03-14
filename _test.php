<?php include __DIR__ . '/_connectDB.php'?>

<?php
$sql = 'SELECT * FROM hotel';
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
    echo '<br>';
}
?>