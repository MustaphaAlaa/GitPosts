<?php require_once APPROOT.'/views/inc/header.php'; ?>
<?php echo flash('post_message');?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>

    <div class="col-md-6">
        <a href="<?php echo URLROOT;?>/posts/addPost" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post</a>
    </div>
</div>
<?php foreach($data['posts'] as $post): ?>
    <div class="card card-body mb-3 text-center">
        <h4 class="card-title" ><?php echo $post->title;?></h4>
        <div class="bg-light p-2 mb-3">
        <p class="card-text"><?php echo $post->body;?></p>
        </div>

        <p class="text-left">Written by <a href="<?php echo URLROOT;?>/profiles/<?php echo $post->postOwner?>"><?php echo ucwords($post->firstName);?> </a>ON <?php echo $post->postCreated; ?></p>
        <a href="<?php echo URLROOT;?>/posts/showPost/<?php echo $post->postId;?>" class="btn btn-primary">More</a>
    </div> 
<?php endforeach;?>
<?php require_once  APPROOT.'/views/inc/footer.php'; ?>