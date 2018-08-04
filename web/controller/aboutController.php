<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/about.lib.php';

$about = new About();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
                $about->view();
                break;
            case 'viewContent':
                $about->viewContent($_GET);
                break;
            default:
                break;
        }
        break;
}
