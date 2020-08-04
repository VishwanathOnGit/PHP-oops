<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-5">
    <div class="col-6">
        <h1>Posts</h1>
    </div>
    <div class="col-6">
        <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary float-right">
            <i class="fas fa-pencil-alt"></i> Add Post
        </a>
    </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-4">
        <h4 class="card-title"><?= $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">Written by <?= $post->name; ?> on <?= $post->postedAt; ?></div>
        <p class="card-text"><?= $post->body; ?></p>
        <a href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>