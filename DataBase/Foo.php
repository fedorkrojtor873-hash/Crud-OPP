<?php

namespace DataBase;
require_once __DIR__ . '/Db.php';


class Foo extends db
{
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




