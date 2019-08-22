<?php
include './model/database/DBConnect.php';
include_once './model/database/DBUser.php';
include_once './model/class/User.php';

class C_User
{
    public $DBUser;

    public function __construct()
    {
        $connection = new DBConnect();
        $this->DBUser = new DBUser($connection->connect());
    }

    public function addUser()
    {

        include 'view/register.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user = new User($username, $password, $email);
            $this->DBUser->create($user);

        }
    }

    public function checkLogin()
    {
        session_start();
        include 'view/login.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            $users = $this->DBUser->getUsers();
            foreach ($users as $user) {
                if ($_SESSION['username'] == $user->username) {
                    if ($_SESSION['password'] == $user->password) {
                        $_SESSION['status_login'] = true;
                    } else {
                        $_SESSION['status_login'] = false;
                    }
                }
            }
            $this->login();
        }
    }

    public function login()
    {
        if ($_SESSION['status_login']) {
            header("location: view/login-success.php");
        } else {
            $this->checkLogin();
        }
    }


}

