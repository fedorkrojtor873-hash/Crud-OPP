<?php
require_once __DIR__ . '/DataBase/Foo.php';

use DataBase\Foo;

$foo = new Foo();

$name = $_POST["name"];
$email = $_POST["email"];
$id = (int)$_POST["id"];

if(isset($_POST["add"])){
    $foo->store($name, $email);
}

if(isset($_POST["edit"])){
    $foo->update($name, $email);
}

if(isset($_POST["delete"])){
    $foo->delete($name, $email);
}



$allUsers = $foo->getAll();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create">
                <i class="fa fa-plus"></i>
            </button>

            <!-- Таблица пользователей -->
            <table class="table table-striped table-hover">
                <thead class="th-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allUsers as $results): ?>
                    <tr>
                        <td><?= $results['id'] ?></td>
                        <td><?= $results['name'] ?></td>
                        <td><?= $results['email'] ?></td>
                        <td>
                            <a href="?id=<?php echo $results['id'] ?>" class="btn btn-success" data-bs-toggle="modal"
                               data-bs-target="#edit<?php echo $results['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger " data-bs-toggle="modal"
                               data-bs-target="#delete<?php echo $results['id'] ?>"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <!-- Модалки для редактирования и удаления -->

                    <?php
                    include 'frontend/edit.php';
                    include 'frontend/delete.php';
                    ?>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Модалка создания нового пользователя -->
<?php include 'frontend/create.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>
</html>
