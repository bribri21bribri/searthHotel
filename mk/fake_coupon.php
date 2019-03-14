<?php
require __DIR__ . './_connectDB.php';


$pdo->beginTransaction();
$sql = "INSERT INTO `coupon`(
         `c_name`, `code`,  `expire`, `c_valid`,`dis_type`,`c_rate`,`c_amount`,`restrict_id`
        ) VALUES (
          ?, ?, ?, ?, ?, ?,?,?
             )";
$stmt = $pdo->prepare($sql);
for ($i = 1; $i < 10; $i++) {
  $stmt->execute([
      "coupon$i",
      "code{$i}",
      time()+$i*86400,
      false,
      1,
      10,
      null,
      1
  ]);
}

$pdo->commit();