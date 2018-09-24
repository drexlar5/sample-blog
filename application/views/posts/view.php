<!-- view each post -->
<h2><?php echo $post['title'] ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at'];?> </small>
<img class="thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'] ?>" alt="<?php echo $post['post_image'] ?>">
<div class="post-body">
  <?php echo $post['body']; ?>
</div>


<?php if($this->session->userdata('user_id') === $post['user_id']): ?>
<hr>
<!-- edit each post -->
<a href="edit/<?php echo $post['slug'] ?>" class="btn btn-secondary float-left mr-1" >Edit</a>

 <!-- delete each post -->
<?php echo form_open('/posts/delete/'.$post['id']) ?>
  <input type="submit" value="Delete" class="btn btn-danger" >
</form>

<?php endif; ?>

<hr>

<h3>Comments</h3>

<?php if($comments): ?>
  <?php foreach($comments as $comment): ?>
    <div class="card card-body bg-light">
      <h5><?php echo $comment['body']; ?>[ by <strong> <?php echo $comment['name']; ?></strong> ]</h5>
    </div><br>
  <?php endforeach; ?>
<?php else: ?>
  <p>No Comments</p>
<?php endif; ?>
<hr>

 <!-- Add comments comment -->
 <h3>Add Comment</h3>

  <?php echo validation_errors(); ?>

 <?php echo form_open('/comments/create/'.$post['id']) ?>
  <div class="form-group" >
    <label>Name</label>
    <input type="text" name="name" class="form-control" >
  </div>
  <div class="form-group" >
    <label>Email</label>
    <input type="email" name="email" class="form-control" >
  </div>
  <div class="form-group" >
    <label>Body</label>
    <textarea name=body class="form-control" ></textarea>
  </div>
  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
  <input type="submit" value="Submit" class="btn btn-secondary" >
</form>
