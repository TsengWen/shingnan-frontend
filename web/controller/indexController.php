<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/index.lib.php';

$index = new Index();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            case 'login':
                if ($index->isValidInput($_POST)) {
                    $index->login($_POST);
                } else {
                    $index->view();
                }
                break;
        }
        break;
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
            default:
                $index->view();
        }
        break;
}
