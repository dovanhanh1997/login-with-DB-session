<?php


class DBUser
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($user){
        $query = $this->connection->prepare("INSERT INTO users (username,password,email) VALUES (:username,:password,:email)");
        $query->bindParam(':username',$user->username);
        $query->bindParam(':password',$user->password);
        $query->bindParam(':email',$user->email);
        return $query->execute();
    }

    public function getUsers(){
        $query = $this->connection->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll();
        $users = [];
        foreach ($result as $row){
            $user = new User($row['username'],$row['password'],$row['email']);
            $user->id = $row['id'];
            $users[]=$user;
        }
        return $users;
    }
}