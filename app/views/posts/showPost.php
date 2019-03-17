<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="pull-right">
        <a href="<?php echo URLROOT;?>/posts/addPost" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post</a>
    </div>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
 <br>
 <h1 class="text-center" style="margin:30px; margin-bottom:50px;"><?php echo $data['posts']->title;?></h1>

 <div class="bg-light p-2 mb-3 rounded "  style="color: #000; border-left: 1px #ccc solid; border-top: 1px #ccc solid">
    Written by <a href="<?php echo URLROOT;?>/profiles/<?php echo $data['posts']->postOwner?>"><?php echo $data['posts']->firstName;?> </a> ON <?php echo $data['posts']->created_at;?>
 </div>
 <div class= "jumbotron bg-light border border-dark">
 <p style="text-align:center;"><?php echo $data['posts']->body?></p>
 </div>

 <?php if(isLoggedIn()):?>

<?php if($data['posts']->user_id === $_SESSION['user_id']):?>
    <hr>
    <a href="<?php echo URLROOT;?>/posts/editPost/<?php echo $data['posts']->postId; ?>" class="btn btn-dark">Edit</a>
    <form class="pull-right" action="<?php echo URLROOT;?>/posts/deletePost/<?php echo $data['posts']->postId;?>" method="post">
        <input type='submit' value="Delete" class="btn btn-danger">
    </form>
<?php endif;?>


<?php endif;?>

<hr>
<br>


<div class="row mb-5">
  <div class="mx-auto" style="width:90%;">
    <form  action="<?php echo URLROOT;?>/posts/comments/<?php echo $data['posts']->postId;?>" method="post">
      <div class="from-group clearfix">
        <input type="text" placeholder="Comment..." name="comment" class="float-left form-control  w-75 d-inline form-control w-75" value="<?php echo $data['comment']?>">
        <input type="submit" name="submit" value="Comment" class="clearfix d-inline btn btn-dark ">
        <span class="d-block text-danger ml-2 "><?php echo $data['comment_err']?></span>
      </div>
    </form>
  </div>
</div>

<?php if($data['comments']): ?>
  <?php  foreach($data['comments'] as  $comment):?>
  <div class="card row mb-3">
      <h3 class="card-title display-5 p-3"><a href="<?php echo URLROOT?>/profiles/<?php echo $data['comments']->user_id?>"><?php echo $comment->firstName ?></a></h3>
      <div class="card-body text-center m-2">
      <p class="card-text text-justify"> <?php echo $comment->comment_text?></p>

      <?php if(isLoggedIn()):?>
        <?php if($_SESSION['user_id'] === $comment->user_id  || $_SESSION['user_id'] === $comment->postOwner ):?>
          <div class="float-right"> <a href="<?php echo URLROOT; ?>/posts/editComment/<?php echo $comment->commentId ?>" class="text-primary">Edit</a> | <a href="<?php echo URLROOT; ?>/posts/deleteComment/<?php echo $comment->commentId ?>" class="text-danger">Delete</a></div>
        <?php endif; ?>
      <?php endif; ?>
      </div>
      <div class="card-footer text-muted">
                  <?php echo $comment->created_at?>
              </div>
  </div>
  <?php endforeach;?>
<?php endif;?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
