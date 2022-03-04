<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>

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

                <section class="mb-2 d-flex justify-content-between align-items-center">
                    <h2 class="h4">Articles</h2>
                    <a href="<?= url('panel/post/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>title</th>
                            <th>cat_id</th>
                            <th>body</th>
                            <th>status</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <?php
                        global $pdo;
                        $query = 'select * from posts order by created_at desc';
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $posts =$stmt->fetchAll();

                        ?>
                        <tbody>
                        <?php  foreach ($posts  as $post) : ?>
                        <tr>
                            <td><?=  $post->id ?></td>
                            <td><img style="width: 90px;" src=""></td>
                            <td><?= $post->title ?></td>

                            <?php  $query = "select name from categories where id= ?";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$post->category_id]);
                            $postCategory = $stmt->fetch()->name ?>

                            <td><?= $postCategory ?></td>
                            <td><?= $post->body ?></td>
                            <td><span class="text-<?= $post->status == 1 ? 'success' : 'danger' ?>">
                                    <?= $post->status == 1 ? 'enable' : 'disable' ?></span> </td>
                            <td>
                                <a href="<?= url( "panel/post/change-status.php?post_id={$post->id}"   ) ?>" class="btn btn-warning btn-sm">Change status</a>
                                <a href="<?= url( "panel/post/edit.php?post_id={$post->id}"    ) ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="<?= url( "panel/post/delete.php?post_id={$post->id}"   ) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>


            </section>
        </section>
    </section>
</section>

<?php require_once '../layouts/scripts.php'?>

</body>
</html>