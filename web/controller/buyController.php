<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/buy.lib.php';

$buy = new Buy();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            case 'login':
                if ($buy->isValidInput($_POST)) {
                    $buy->login($_POST);
                } else {
                    $buy->view();
                }
                break;
            case 'clickRate':
                $buy->clickRate($_POST);
                break;
        }
        break;
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'viewDetail':
                $buy->viewDetail($_GET);
                break;
            case 'view':
            default:
                $buy->view();
        }
        break;
}
