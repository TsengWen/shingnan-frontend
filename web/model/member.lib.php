<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 聯絡我們
 */
class Member
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    /**
     * Contact constructor
     */
    public function __construct()
    {
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
     * 會員頁面
     */
    public function view()
    {   
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('member.html');
    }

    public function forgetPassowrd()
    {
        return;
    }

    /**
     * 會員資料修改頁面
     */
    public function memberDetailView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        
        $this->smarty->assign('userId', $_SESSION['userId']);
        $this->smarty->display('memberDetail.html');
    }

    public function orderRecordView() 
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('orderRecord.html');
    }

    public function pointRecordView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('pointRecord.html');
    }

    public function couponView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('coupon.html');
        
    }

    public function infoView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('info.html');
        
    }

    public function cartView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('cart.html');
    }
    /**
     * 設定訊息
     */
    public function setResultMsg($resultMsg = 'success', $errorMsg = '')
    {
        $this->msg = $resultMsg;
        $this->error = $errorMsg;
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('msg', $this->msg);
    }

    public function viewLogin()
    {
        $_SESSION['isLogin'] = false;
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('homePath', APP_ROOT_DIR);
        $this->smarty->display('login.html');
    }
}
