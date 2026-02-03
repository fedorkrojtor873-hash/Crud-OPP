<?php

namespace DataBase;
require_once __DIR__ . '/Db.php';


class Foo extends db
{
    public function getId()
    {
        $get_id =$_POST['id'];
        return $get_id;
    }
    public function getAll(): array
    {
        $result = $this->getConnection()->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function store(): string
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        return mysqli_query($this->getConnection(), "INSERT INTO users (name, email) VALUES ('$name', '$email')");
    }
    public function update(): string
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        return mysqli_query($this->getConnection(),  'UPDATE users set name = "  ' . $name . '", email = "' . $email . '" WHERE id = ' . $this->getId());
    }

}




