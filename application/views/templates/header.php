<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agboola's Blog</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">

    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url();?>">Agboola's Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();  ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>posts">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>categories">Categories</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(!$this->session->userdata('logged_in')):  ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>users/login">Login</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>users/register">Register</a>
      </li>
    <?php endif;  ?>
    <?php if($this->session->userdata('logged_in')):  ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Create</a>
      <div class="dropdown-menu">
        <a class=" dropdown-item" href="<?php echo base_url();  ?>posts/create">Post</a>
        <a class="dropdown-item" href="<?php echo base_url();  ?>categories/create">Category</a>
      </div>
    </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<php echo base_url();  ?>posts/create">Create Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<php echo base_url();  ?>categories/create">Create category</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();  ?>users/logout">logout</a>
      </li>      
    </ul>
    <?php endif;  ?>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" placeholder="Search" type="text">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<div class="container">
<br>

<!-- Flash Messages  -->
<?php if($this->session->flashdata('user_registered')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('post_created')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('post_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('post_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('category_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_updated').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('user_loggedin')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('user_loggedout')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').
  '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('login_failed')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').
  '</p>'; ?>

<?php endif; ?>
