<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>

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

                <section class="mb-2 d-flex justify-content-between align-items-center">
                    <h2 class="h4">Categories</h2>
                    <a href="<?= url('panel/category/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>status</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <?php global $pdo;
                        $query = "select * from categories";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $categories = $stmt->fetchAll();
                        ?>
                        <?php foreach ($categories as $category) : ?>
                        <tbody>

                        <tr>
                            <td><?= $category->id ?></td>
                            <td><?= $category->name ?></td>
                            <td class="text-<?= $category->status == 1 ? 'success' : 'danger' ?>">
                                <?= $category->status == 1 ? 'enable' : 'disable' ?></td>
                          <td><a class="btn btn-<?= $category->status == 1 ? 'success' : 'danger' ?>" href="<?= url('panel/category/change-status.php?category_id='
                                  . $category->id ) ?>">
                                  <?= $category->status == 1 ? 'enable' : 'disable' ?>
                              </a> </td>
                            <td>
                                <a href="<?= url('panel/category/edit.php?category_id=' . $category->id) ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="<?= url('panel/category/delete.php?category_id=' . $category->id) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>


                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </section>


            </section>
        </section>
    </section>





</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>