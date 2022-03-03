<?php require_once  '../../functions/helpers.php' ?>
<?php require_once '../../functions/pdo_connection.php' ; ?>
<?php

global $pdo;

if ((isset($_GET['category_id']) && !empty($_GET['category_id']))) {
    $query = "select * from categories where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['category_id']]);
    $category = $stmt->fetch();
}else{
    redirect('panel/category');
}

if ((isset($_GET['category_id']) && !empty($_GET['category_id'])) &&
(isset($_POST['name']) && !empty($_POST['name'])) &&
(isset($_POST['status']) && $_POST['status'] != '' )){
    $query = "update categories set  name=? , status= ? , updated_at=now() where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['name'] , $_POST['status'] , $_GET['category_id']]);
    redirect('panel/category');
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

                <form action="<?= url('panel/category/edit.php?category_id=' . $category->id) ?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="<?= $category->name ?>">
                    </section>
                    <section class="form-group">
                        <label for="name">status</label>
                        <select name="status" class="form-control" >
                            <option value="1" <?php if ($category->status == 1) echo 'selected' ?> >enable</option>
                            <option value="0" <?php if ($category->status == 0) echo 'selected' ?>>disable</option>
                        </select>

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