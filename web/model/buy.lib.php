<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 眼鏡選購
 */
class Buy
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    /**
     * Statistic constructor
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
     * 顯示眼鏡第一頁
     */
    public function view()
    {
        if ($_SESSION['isLogin'] == true) {
            // member login
        } else {

            $sql = "SELECT * FROM `brand`
                    WHERE `isDelete` = 0
                    ORDER BY `lastUpdateTime`
                    DESC LIMIT 0, 8";
            $res = $this->db->prepare($sql);

            if ($res->execute()) {
                $brands = $res->fetchAll();

                $this->setResultMsg();
                $this->smarty->assign('brands', $brands);
            } else {
                $error = $res->errorInfo();
                $this->setResultMsg('failure', $error[0]);
            }

            $sql = "SELECT * FROM `style` WHERE `isDelete` = 0";
            $res = $this->db->prepare($sql);

            if ($res->execute()) {
                $styles = $res->fetchAll();

                $this->setResultMsg();
                $this->smarty->assign('styles', $styles);
            } else {
                $error = $res->errorInfo();
                $this->setResultMsg('failure', $error[0]);
            }

            $this->smarty->assign('title', '眼鏡選購');
            $this->smarty->display('buy.html');
        }
    }

    /**
     * 顯示眼鏡詳細資料
     */
    public function viewDetail()
    {
        if ($_SESSION['isLogin'] == true) {
            // member login
        } else {

            $this->smarty->assign('title', '眼鏡選購');
            $this->smarty->display('buy_detail.html');
        }
    }

    /**
     * SQL query
     */
    public function getSQLResult($sql = '')
    {
        // check $sql if is empty string
        if (empty($sql)) {
            return null;
        } else {
            $res = $this->db->prepare($sql);

            if ($res->execute()) {
                $data = $res->fetchAll();
                $this->setResultMsg();

                return $data;
            } else {
                $error = $res->errorInfo();
                $this->setResultMsg('failure', $error[0]);

                return null;
            }
        }
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
}
