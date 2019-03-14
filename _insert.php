<?php include __DIR__ . '/_connectDB.php' ?>
<?php include __DIR__ . '/_header.php' ?>
<?php

$title=$discription=$phone=$fax=$site=$address="";
if(isset($_POST['checkme'])) {
  $title=htmlentities($_POST['title']);
  $discription=htmlentities($_POST['discription']);
  $phone=htmlentities($_POST['phone']);
  $fax=htmlentities($_POST['fax']);
  $site=htmlentities($_POST['site']);
  $address=htmlentities($_POST['address']);


  $sql = "INSERT INTO `hotel`(`title`,`discription`,`phone`,`fax`,`site`,`address`) VALUE (:title,:discription,:phone,:fax,:site,:address)";

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
            'title'=>$title,
            'discription'=>$discription,
            'phone'=>$phone,
            'fax'=>$fax,
            'site'=>$site,
            'address'=>$address
    ]);
    if($stmt->rowCount()==1){
        $success = true;
        $msg = [
          'msgClass'=>'success',
          'info'=>'Data inserted'
        ];
    }else{
      $msg = [
          'msgClass'=>'danger',
          'info'=>'Data was not inserted'
      ];
    }
  }catch (PDOException $ex){
    $msg = [
        'msgClass'=>'danger',
        'info'=>$ex
    ];
  }

}
?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($msg)): ?>
            <div class="alert alert-<?= $msg['msgClass'] ?>" role="alert">
                <?= $msg['info']?>
            </div>
            <?php endif ?>
            <div class="card">
                <div class="card-body">
                    <form method="POST" name="form1">
                        <input type="hidden" name="checkme" value="checkme">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="<?= $title ?>">
                            <small id="titleHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Discription</label>
                            <input type="text" class="form-control" name="discription" placeholder="Enter Discription" value="<?= $discription ?>">
                            <small id="discriptionHelp" class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone" value="<?= $phone ?>">
                            <small id="phoneHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" class="form-control" name="fax" placeholder="Enter Fax" value="<?= $fax ?>">
                            <small id="faxHelp" class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label>Site</label>
                            <input type="text" class="form-control" name="site" placeholder="Enter web Address" value="<?= $site ?>">
                            <small id="siteHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" class="form-control" name="address" placeholder="Enter address" value="<?= $address ?>"></textarea>
                            <small id="addressHelp" class="form-text text-muted"></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


























<?php include __DIR__ . '/_header.php' ?>
