<?php
include_once 'controller/C_User.php';
$controller = new C_User();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
switch ($page) {
    case 'add':
        $controller->addUser();
        break;
    default:
        $controller->checkLogin();
        break;
}
