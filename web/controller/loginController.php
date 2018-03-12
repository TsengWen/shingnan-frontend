<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/login.lib.php';

$login = new Login();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        break;
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
                $login->view();
                break;
            default:
        }
        break;
}
