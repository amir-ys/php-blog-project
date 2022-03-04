<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>
<?php

//get categories
global $pdo;
$query = "select * from categories";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();


//store posts
if ((isset($_POST['title']) && !empty($_POST['title'])) &&
isset($_POST['category_id']) && !empty($_POST['category_id']) &&
isset($_POST['body']) && !empty($_POST['body']) &&
isset($_FILES['image']) && !empty($_FILES['image']) ) {
    global $pdo;
    $query = "insert into posts(title,category_id , body , image , created_at) values( ? , ? ,? ,?, now())";
    $stmt = $pdo->prepare($query);


//upload image
    $image = $_FILES['image'];
    $imageFileType = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
    if ($image['error'] == 0 && $image['size'] <= 5000000 && in_array($imageFileType , ["png" , "jpg" , "jpeg"])){
        $path = '/assets/images/' . uniqid() . '.' . $imageFileType;
        if (move_uploaded_file($image['tmp_name'] ,  dirname(dirname(__DIR__)) . $path)){
            $image = $path;
        }else{
            redirect('panel/post');
        }
    }
    //end upload file


    $stmt->execute([$_POST['title'], $_POST['category_id'], $_POST['body'], $image]);
    redirect('panel/post');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include_once '../layouts/header.php'?>

</head>
<body>
<section id="app">
    <?php require_once '../layouts/top-nav.php' ?>
    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once '../layouts/sidebar.php' ?>

            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/post/create.php') ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" > <?= $category->name ?> </option>
                            <?php endforeach ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<?php require_once '../layouts/scripts.php'?>
</body>
</html>