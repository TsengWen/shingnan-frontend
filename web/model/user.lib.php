<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 聯絡我們
 */
class User
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
        $this->smarty->display('user/userDashboard.html');
    }

    public function forgetPassowrd()
    {
        return;
    }

    /**
     * 會員資料修改頁面
     */
    public function userDetailView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $userId = $input['userId'];
        $sql = "SELECT `user`.`userId`, `user`.`userName`,
                       `user`.`account`, `user`.`phone`, 
                       `user`.`address`, `user`.`email`
                FROM  `user`
                WHERE  `user`.`userId` = :userId AND `user`.`isDelete` = 0";

        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        $res->execute();
        $userDetailData = $res->fetch();


        $this->smarty->assign('userDetailData', $userDetailData);
        $this->smarty->assign('userId', $_SESSION['userId']);
        $this->smarty->display('user/userDetail.html');
    }

    public function orderRecordView() 
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('user/orderRecord.html');
    }

    public function pointRecordView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('user/pointRecord.html');
    }

    public function couponView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('user/coupon.html');
        
    }

    public function infoView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('user/info.html');
        
    }

    public function cartView()
    {
        if(!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return ;
        }
        $this->smarty->display('user/cart.html');
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
