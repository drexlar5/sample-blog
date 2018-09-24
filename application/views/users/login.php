<div class="row">
  <div class="col-md-4 offset-4" >
    <h2 class="text-center"><?= $title ?></h2>

    <?php echo validation_errors(); ?>


    <?php echo form_open('users/login'); ?>

      <div class="form-group" >
        <label>User Name</label>
        <input type="text" name="username" placeholder="Enter Username" class="form-control" required autofocus >
      </div>
      <div class="form-group" >
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password"class="form-control">
      </div><br>
      <input type="submit" value="Login" class="btn btn-secondary btn-block">
    <?php echo form_close(); ?>
  </div>
</div>