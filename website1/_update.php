<?php include __DIR__ . '/_connectDB.php'; ?>
<?php include __DIR__ . '/_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<?php
$title = $phone = $site =$address ="";



$c_sql = "INSERT INTO hotel2 (`title`,`phone`,`site`,`address`) 
          VALUE (:title, :phone,:site,:address)";
if(isset($_POST['title'])) {




  try {
    $c_stmt = $pdo->prepare($c_sql);
    $c_stmt->execute([
        'title'=>$_POST['title'],
        'phone'=>$_POST['phone'],
        'site'=>$_POST['site'],
        'address'=>$_POST['address'],
    ]);


    if($c_stmt->rowCount()==1){
      $msg = [
          'msgClass'=>'success',
          'info'=>'新增成功'
      ];

    }else{
      $msg = [
          'msgClass'=>'danger',
          'info'=>'新增錯誤'
      ];
    }




  }catch (PDOException $ex){
    $msg = [
        'msgClass'=>'danger',
        'info'=>'重複: '.$ex->getMessage()
    ];
  }


}
?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <?php if(isset($msg)): ?>
        <div class="alert alert-<?= $msg['msgClass'] ?>" role="alert">
          <?= $msg['info'] ?>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-body">
          <form method="POST" name="insert_form" onsubmit="return checkForm()">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title"
                     aria-describedby="emailHelp" placeholder="Hotel" value="<?= $title ?>">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Phone number" value="<?= $phone ?>">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Site</label>
              <input type="text" class="form-control" name="site"  placeholder="Enter Web address" value="<?= $site ?>">
              <small id="siteHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Address" ><?= $address ?></textarea>
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/_footer.php'; ?>
<script>
    const field = [
        'title',
        'phone',
        'site',
        'address'
    ];

    const fieldsReference ={};
    for(let val of field){
        fieldsReference[val] = document.insert_form[val];
    }
    console.log(fieldsReference);

    function checkForm(){
        let isPassed = true;
        const fieldValues= {};
        for(let val of field){
            fieldValues[val] = fieldsReference[val].value;
        }
        console.log(fieldValues);
        let site_pattern = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi;
        //
        if(! site_pattern.test(fieldValues.site)){
            fieldsReference.site.style.borderColor = 'red';
            document.querySelector('#siteHelp').innerHTML = '請填寫正確的 URL!';
            isPassed = false;
        }

        return isPassed;

    }































</script>