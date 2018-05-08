<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/news.lib.php';

$news = new News();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
                $news->view($_GET);
                break;
            default:
                break;
        }
        break;
}
