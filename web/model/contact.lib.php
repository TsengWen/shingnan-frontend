<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 聯絡我們
 */
class Contact
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    /**
     * Contact constructor
     */
    public function __construct() {
        session_start();
        // instantiate the pdo object
        $this->db = dbSetup::getDbConn();
        // instantiate the template object
        $this->smarty = new SmartyConfig();

        if (PHP_VERSION_ID < 50400) {
            // 登記 Session 變數名稱
            session_register('isLogin');
            session_register('user');
            session_register('error');
            session_register('msg');
        }
    }

       /**
     * 顯示連絡我們
     */
    public function view() {
        $sql = 'SELECT `store`.`storeId`, `store`.`storeName`, `store`.`phoneNumber`, `store`.`address`, `store`.`businessFrom`,`store`.`businessTo`, `store`.`description` 
            FROM  `store` 
            ORDER BY `store`.`storeId`';
        $res = $this->db->prepare($sql);
        if($res->execute()){
            $store = $res->fetchAll();
            $this->smarty->assign('store',$store);
        }


        $sql2 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $res = $this->db->prepare($sql);
        if($res->execute()){
            $store_list = $res->fetchAll();
            $this->smarty->assign('stores', $store_list);
        }

        $this->setResultMsg();
        $this->smarty->assign('title', '聯絡我們');
        $this->smarty->display('contact.html');
    }
    

    /**
     * 設定訊息
     */
    public function setResultMsg($resultMsg = 'success', $errorMsg = '') {
        $this->msg = $resultMsg;
        $this->error = $errorMsg;
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('msg', $this->msg);
    }
}

