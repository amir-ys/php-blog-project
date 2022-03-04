<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>
<?php
global $pdo;

//get categories
global $pdo;
$query = "select * from categories";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();

// get post
if ((isset($_GET['post_id']) && !empty($_GET['post_id']))) {
    $query = "select * from posts where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    $post = $stmt->fetch();
}else{
    redirect('panel/post');
}



//update posts
if ((isset($_POST['title']) && !empty($_POST['title']))
    && isset($_GET['post_id']) && !empty($_GET['post_id'])
    && isset($_POST['category_id']) && !empty($_POST['category_id'])
    && isset($_POST['body']) && !empty($_POST['body'])
     ) {

    global $pdo;
    $query = "update posts set title = ?,category_id = ? , body =?  , image = ? , updated_at =now() where id = ?";
    $stmt = $pdo->prepare($query);

//upload image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 ) {
        //delete old image
        unlink(dirname(dirname(__DIR__)) . $post->image);

        //upload new image
        $image = $_FILES['image'];
        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if ($image['error'] == 0 && $image['size'] <= 5000000 && in_array($imageFileType, ["png", "jpg", "jpeg"])) {
            $path = '/assets/images/' . uniqid() . '.' . $imageFileType;
            if (move_uploaded_file($image['tmp_name'], dirname(dirname(__DIR__)) . $path)) {
                $image = $path;
            } else {
                redirect('panel/post');
            }
        }
    }else{
        $image = $post->image;
    }
    //end upload file


    $stmt->execute([$_POST['title'], $_POST['category_id'], $_POST['body'], $image , $_GET['post_id']]);
    redirect('panel/post');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once '../layouts/header.php'?>

<body>
<section id="app">
    <?php require_once '../layouts/top-nav.php' ?>
    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once '../layouts/sidebar.php' ?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/post/edit.php?post_id=' . $post->id) ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ..." value="<?= $post->title ?>">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="title" placeholder="image ...">
                        <div class="mt-3 mb-3">
                            <span> current image: </span>
                            <img width="200px" height="150px" src="<?= url($post->image) ?>" alt="">
                        </div>
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?php if ($category->id == $post->category_id){ echo 'selected' ; } ?> > <?= $category->name ?> </option>
                            <?php endforeach ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."><?= $post->body ?></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<?php require_once '../layouts/scripts.php'?>

</body>

</html>