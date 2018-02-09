<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 品牌介紹
 */
class Brand
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    /**
     * Statistic constructor
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
     * 顯示首頁
     */
    public function view() {
        if ($_SESSION['isLogin'] == true) {
            // member login
        } else {
            // $sql = "SELECT * FROM `image` WHERE `itemId` like 'index_%'";
            // $res = $this->db->prepare($sql);
            
            // if ($res->execute()) {
            //     $rows = $res->fetchAll();
            //     $images = array();
            //     foreach($rows as $img) {
            //         $images[$img['imageName']] = 'http://192.168.65.3/shingnan/web/controller/' . $img['path'];
            //     }
            //     $this->setResultMsg();
            //     $this->smarty->assign('images', $images);             
            // } else {
            //     $error = $res->errorInfo();
            //     $this->setResultMsg('failure', $error[0]);
            // }
            
            $this->smarty->assign('title', '品牌介紹');
            $this->smarty->display('brand.html');
        }
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
