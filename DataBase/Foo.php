<?php

namespace DataBase;
require_once __DIR__ . '/Db.php';


class Foo extends db
{
    public function getUsersPaginated(int $limit, int $offset): array
    {
        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->getConnection(), $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function countUsers(): int
    {
        $result = mysqli_query($this->getConnection(), "SELECT COUNT(*) as total FROM users");
        $row = mysqli_fetch_assoc($result);
        return (int)$row['total']; // общее количество записей
    }

    protected function getId()
    {
        $get_id =(int)$_POST['id'];
        return $get_id;
    }

    public function getAll(): array
    {
        $result = $this->getConnection()->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function store(string $name,  string $email): string
    {
        return mysqli_query($this->getConnection(),
            "INSERT INTO users (name, email) VALUES ('$name', '$email')");
    }

    public function update(string $name, string $email): bool
    {
        $id = $this->getId();
        //var_dump('id:'.$id, 'name:'.$name, 'email:'.$email);
        return mysqli_query(
            $this->getConnection(),
            "UPDATE users SET name='$name', email='$email' WHERE id=$id"
        );
    }



    public function delete()
    {
        $id = $this->getId();
         mysqli_query($this->getConnection(), "DELETE FROM users WHERE id=$id");
    }

}




