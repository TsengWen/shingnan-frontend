<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/about.lib.php';

$about = new About();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case 'view':
            default:
                $about->view($_GET);
        }
        break;
}
