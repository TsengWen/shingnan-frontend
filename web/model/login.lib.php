<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 聯絡我們
 */
class Login
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

    public function isValidInput($input)
    {
        $input['account']  = trim($input['account']);
        $input['password'] = trim($input['password']);
        // 測試是否為空值
        if (strlen($input['account']) == 0) {
            $this->error = '帳號不得為空值';
            return false;
        }
        if (strlen($input['password']) == 0) {
            $this->error = '密碼不得為空值';
            return false;
        }
        $this->error = '';
        return true;
    }

    /**
     * 登入動作 
     */
    public function login($input)
    {
        try {
            // use SQL get password
            $sql = "SELECT `user`.`userId`, `user`.`account`, `user`.`password` 
                    FROM `user` 
                    WHERE `user`.`account` = :account;";
            $res = $this->db->prepare($sql);
            $res->bindParam(':account', $input['account'], PDO::PARAM_STR);
            if(!$res->execute()){
                $this->error = '帳號輸入錯誤';
                $this->viewLogin();
                return ;
            }

            $result = $res->fetch();

            if (password_verify($input['password'], $result['password'])) {
                // set the session
                $_SESSION['isLogin'] = true;
                $_SESSION['userId']  = $result['userId'];
                $_SESSION['account'] = $input['account'];

                // clear the error message
                $this->error = '';

                // TODO: go to member page (header location)
                echo("hello world");

            } else {
                $this->error = '密碼輸入錯誤';
                $this->viewLogin();
            }

        } catch (Exception $e) {
            print 'Exception : ' . $e->getMessage();
        }

    }
    /**
     * 登入頁面
     */
    public function view()
    {
        $this->setResultMsg();
        $this->smarty->display('login.html');
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
