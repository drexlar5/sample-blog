<div class="row">
  <div class="col-md-4 offset-4" >
    <h2 class="text-center"><?= $title ?></h2>

    <?php echo validation_errors(); ?>


    <?php echo form_open('users/register'); ?>

      <div class="form-group" >
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control">
      </div>
      <div class="form-group" >
        <label>Zipcode</label>
        <input type="text" name="zipcode" placeholder="Zipcode" class="form-control">
      </div>
      <div class="form-group" >
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control">
      </div>
      <div class="form-group" >
        <label>Username</label>
        <input type="text" name="username" placeholder="Username" class="form-control">
      </div>
      <div class="form-group" >
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"class="form-control">
      </div>
      <div class="form-group" >
        <label>Confirm Password</label>
        <input type="password" name="password2" placeholder="Confirm Password" class="form-control">
      </div><br>
      <input type="submit" value="Register" class="btn btn-secondary btn-block">
      <br>
    <?php echo form_close(); ?>
  </div>
</div>