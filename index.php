<?php
require_once __DIR__ . '/DataBase/Foo.php';

use DataBase\Foo;

$foo = new Foo();

$name = $_POST["name"];
$email = $_POST["email"];
$id = (int)$_POST["id"];

if (isset($_POST["add"])) {
    $foo->store($name, $email);
}

if (isset($_POST["edit"])) {
    $foo->update($name, $email);
}

if (isset($_POST["delete"])) {
    $foo->delete();
}


$allUsers = $foo->getAll();


//Пагинация

$limit = 5; // сколько записей показывать на одной странице

// Текущая страница из GET-параметра ?page=номер
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1; // защита от отрицательных страниц
}

// С какой записи начинать выборку
$offset = ($page - 1) * $limit;

$users = $foo->getUsersPaginated($limit, $offset);
$totalRecords = $foo->countUsers();       // сколько всего пользователей
$totalPages = ceil($totalRecords / $limit);

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
                <?php foreach ($users as $results): ?>
                    <tr>
                        <td><?= $results['id'] ?></td>
                        <td><?= $results['name'] ?></td>
                        <td><?= $results['email'] ?></td>
                        <td>
                            <a href="?id=<?php echo $results['id'] ?>" class="btn btn-success" data-bs-toggle="modal"
                               data-bs-target="#edit<?php echo $results['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a href="?id=<?php echo $results['id'] ?>" class="btn btn-danger " data-bs-toggle="modal"
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
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<!-- Модалка создания нового пользователя -->
<?php include 'frontend/create.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>
</html>
