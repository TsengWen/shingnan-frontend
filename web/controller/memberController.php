<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/member.lib.php';

$member = new Member();

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
                $member->view();
                break;
            case 'memberDetailView':
                $member->memberDetailView();
                break;
            case 'orderRecordView':
                $member->orderRecordView();
                break;
            case 'pointRecordView':
                $member->pointRecordView();
                break;
            case 'couponView':
                $member->couponView();
                break;
            case 'infoView':
                $member->infoView();
                break;
            case 'cartView':
                $member->cartView();
                break;
            default:
                
                break;
        }
        break;
}
