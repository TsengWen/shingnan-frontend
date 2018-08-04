<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/education.lib.php';

$education = new Education();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
                $education->view();
                break;
            case 'viewContent':
                $education->viewContent($_GET);
                break;
            default:
                break;
        }
        break;
}
