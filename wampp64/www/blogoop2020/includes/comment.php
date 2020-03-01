<?php
$comments = Comment::find_the_comments($_GET['id']);
$user_id = $session->user_id;
$user = User::find_by_id($user_id);
$comment = new Comment();

if (isset($_POST["verzenden"])){
    $comment->photo_id = $_GET['id'];
    $comment->author = $user->first_name;
    $comment->body = trim($_POST['body']);
    $comment->save();
}
?>

<!-- Comments Form -->
<?php if($session->is_signed_in()): ?>

<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
        <form method="post" action="photo.php?id=<?php echo $_GET['id']?>">
            <div class="form-group">
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="verzenden">Submit</button>
        </form>
    </div>
</div>
<?php endif; ?>
<!-- Single Comment -->
<?php foreach ($comments as $comment): ?>
<div class="media mb-4">
<!-- <img class="d-flex mr-3 rounded-circle" src=" $user->user_image" alt="">
-->    <div class="media-body">
        <h5 class="mt-0"><?= $comment->author ?></h5>
        <?= $comment->body ?>
    </div>
</div>
<?php endforeach ?>
<!-- Comment with nested comments -->
<!--<div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

        <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

    </div>
</div>-->
