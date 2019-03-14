<?php include __DIR__ . '/_connectDB.php'; ?>

<?php

//$sql = "SELECT * FROM hotel2 ORDER BY sid";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([]);
//
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = [
    'success' => false,
    'data' => []
];

if(isset($_GET['searchWord'])){
    $searchWord = htmlentities($_GET['searchWord']);
  $sql = "SELECT * FROM hotel2 WHERE title LIKE :searchWord";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':searchWord', '%' . $searchWord . '%', PDO::PARAM_STR);

  $stmt->execute();

  $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $result['success'] = true;
//  print_r($rows);

}

echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>







































