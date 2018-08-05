<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 興南首頁
 */
class Index
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
     * 顯示首頁
     */
    public function view()
    {
        $sql1 = "SELECT * FROM `image` WHERE `itemId` like 'index_%'";
        $sql2 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $img_list = $this->getSQLResult($sql1);   
        $store_list = $this->getSQLResult($sql2);

        if (!is_null($img_list)) {
            $images = array();
            $text = array();
            $host = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
            $pieces = explode("/", $_SERVER['REQUEST_URI']);
            $host_url = "$host//$pieces[1]/$pieces[2]/";

            foreach ($img_list as $img) {
                // 注意這個要改，目前是寫暫定的網址
                // 'http://140.116.82.48/shingnan/web/'
                $images[$img['imageName']] = $host_url . substr($img['path'], 3);
                $text[$img['imageName']] = $img['link'];
            }
            $this->smarty->assign('images', $images);
            $this->smarty->assign('text', $text);      
        }

        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }

        $this->smarty->assign('title', '興南眼鏡行');
        $this->smarty->display('index.html');
    }

    /**
     * SQL query
     */
    public function getSQLResult($sql = '')
    {
        // check $sql if is empty string
        if (empty($sql)) {
            return NULL;
        } else {
            $res = $this->db->prepare($sql);

            if ($res->execute()) {
                $data = $res->fetchAll();
                $this->setResultMsg();

                return $data;
            } else {
                $error = $res->errorInfo();
                $this->setResultMsg('failure', $error[0]);

                return NULL;
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
