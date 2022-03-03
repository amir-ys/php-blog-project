<?php require_once  '../../functions/helpers.php' ?>

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
                    <a href="create.php" class="btn btn-sm btn-success">Create</a>
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
                        <tbody>
                        <tr>
                            <td>2</td>
                            <td><img style="width: 90px;" src=""></td>
                            <td>title</td>
                            <td>cat name</td>
                            <td>body</td>
                            <td><span class="text-success">enable</span> <span class="text-danger">disable</span></td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Change status</a>
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
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