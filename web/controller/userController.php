<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/user.lib.php';

$user = new User();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            default:
                break;
        }
        break;
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
                $user->view();
                break;
            case 'memberDetailView':
                $user->userDetailView();
                break;
            case 'orderRecordView':
                $user->orderRecordView();
                break;
            case 'pointRecordView':
                $user->pointRecordView();
                break;
            case 'couponView':
                $user->couponView();
                break;
            case 'infoView':
                $user->infoView();
                break;
            case 'cartView':
                $user->cartView();
                break;
            default:
                
                break;
        }
        break;
}
