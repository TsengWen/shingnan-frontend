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
        $sql1 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $sql2 = "SELECT `brand`.`brandId`, `image`.`path` 
                 FROM `brand` LEFT JOIN `image` 
                 ON `brand`.`brandId` = `image`.`itemId` 
                 WHERE `brand`.`isDelete` = 0";
        $store_list = $this->getSQLResult($sql1);
        $brand_imgs = $this->getSQLResult($sql2);

        // footer info
        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }
        // brand images
        if (!is_null($brand_imgs)) {
            $images = array();
            $host = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
            $pieces = explode("/", $_SERVER['REQUEST_URI']);
            $host_url = "$host//$pieces[1]/$pieces[2]/";
            
            foreach ($brand_imgs as $img) {
                if (!is_null($img['path'])) {
                    $img['path'] = $host_url . substr($img['path'], 3);
                }
                array_push($images, $img);
            }
            $this->smarty->assign('brands', $images); 
        }

        $this->smarty->assign('title', '品牌介紹');
        $this->smarty->display('brand.html');
    }

    /**
     * 顯示品牌詳細資料
     */
    public function viewDetail() {
        $sql = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $store_list = $this->getSQLResult($sql);

        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }
        
        $this->smarty->assign('title', '品牌介紹');
        $this->smarty->display('brand_detail.html');
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
    public function setResultMsg($resultMsg = 'success', $errorMsg = '') {
        $this->msg = $resultMsg;
        $this->error = $errorMsg;
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('msg', $this->msg);
    }
}
