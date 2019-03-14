<?php include __DIR__.'./_connectDB.php' ?>

<?php include __DIR__ . '/_header.php'?>

<?php include __DIR__ . '/_navbar.php'?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form>
        <div class="form-group">
          <label>Coupon Name</label>
          <input type="email" class="form-control" name="c_name"  placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <label>Discount type</label>
        <select class="form-control">
          <option>Discount by rate</option>
          <option>Discount by amount</option>
        </select>
        <label>Restrict type</label>
        <select class="form-control">
          <?php //iterate restrict type?>
          <option>Discount by rate</option>
          <option>Discount by amount</option>
          <?php ?>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php include __DIR__ . '/_footer.php'?>
