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
            
            $this->smarty->assign('title', '品牌介紹');
            $this->smarty->display('brand.html');
        }
    }

    /**
     * 顯示品牌詳細資料
     */
    public function viewDetail() {
        if ($_SESSION['isLogin'] == true) {
            // member login
        } else {
            $this->smarty->assign('title', '品牌介紹');
            $this->smarty->display('brand_detail.html');
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
