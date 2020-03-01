<?php
include("includes/header.php");
include("includes/navigatie.php");

$photos = Photo::find_all();


?>
    <div class="row">
        <?php foreach($photos as $photo): ?>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= "admin" . DS. $photo->picture_path(); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$photo->title;?></h5>
                        <p class="card-text"><?= $photo->description; ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        <?php if($session->is_signed_in()):?>
                            <td><a class="btn btn-danger rounded-0" href="admin/edit_photo.php?id=<?php echo $photo->id;
                                ?>"><i class="fas fa-edit"></i></a></td>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

<?php include("includes/footer.php"); ?>