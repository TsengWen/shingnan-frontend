<?php
//initialize
require_once '../configs/source.php';
require_once HOME_DIR . 'model/contact.lib.php';

$contact = new Contact();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = isset($_GET['action']) ? $_GET['action'] : 'view';
        switch ($action) {
            case 'view':
            default:
                $contact->view();
        }
        break;
}
