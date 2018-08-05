<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/brand.lib.php';

$brand = new Brand();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            case 'login':
                if ($brand->isValidInput($_POST)) {
                    $brand->login($_POST);
                } else {
                    $brand->view();
                }
                break;
        }
        break;
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'viewDetail':
                $brand->viewDetail($_GET);
                break;
            case 'view':
            default:
                $brand->view();
        }
        break;
}
