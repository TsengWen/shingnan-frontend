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
        $sql1 = "SELECT `brand`.`brandId`, `image`.`path` 
                 FROM `brand` LEFT JOIN `image` 
                 ON `brand`.`brandId` = `image`.`itemId` 
                 WHERE `brand`.`isDelete` = 0
                 ORDER BY `brand`.`lastUpdateTime`
                 DESC LIMIT 0, 8";
        $sql2 = "SELECT * FROM `style` WHERE `isDelete` = 0";
        $sql3 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";

        $brand_list = $this->getSQLResult($sql1);
        $style_list = $this->getSQLResult($sql2);
        $store_list = $this->getSQLResult($sql3);

        if (!is_null($brand_list)) {
            $brand_imgs = array();
            foreach ($brand_list as $img) {
                if (!is_null($img['path'])) {
                    $host = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
                    $pieces = explode("/", $_SERVER['REQUEST_URI']);
                    $host_url = "$host//$pieces[1]/$pieces[2]/";
                    $img['path'] = $host_url . substr($img['path'], 3);
                }
                array_push($brand_imgs, $img);
            }
            $this->smarty->assign('brand_imgs', $brand_imgs);
        }

        if (!is_null($style_list)) {
            $frames = array();
            $host = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
            $pieces = explode("/", $_SERVER['REQUEST_URI']);
            $host_url = "$host//$pieces[1]/$pieces[2]/";
            foreach($style_list as $style) {
                $sytleId = $style['styleId'];
                $sql = "SELECT f.`frameId`, i.`path` 
                        FROM `frameStyle` as f LEFT JOIN `image` as i
                        ON f.`frameId` = i.`itemId`
                        WHERE f.`styleId` = '$sytleId'
                        ORDER BY f.`createTime`
                        DESC LIMIT 0, 8";

                $frame_imgs = $this->getSQLResult($sql);
                $temp_list = array();
                if (!is_null($frame_imgs)) {
                    foreach($frame_imgs as $img) {
                        if (!is_null($img['path'])) {
                            $img['path'] = $host_url . substr($img['path'], 3);
                        }
                        array_push($temp_list, $img);
                    }
                }
                $frames[$style['styleName']] = $temp_list;
            }
            $this->smarty->assign('styles', $frames);
        }
        // footer info
        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }

        $this->smarty->assign('title', '眼鏡選購');
        $this->smarty->display('buy.html');
    }

    /**
     * 顯示眼鏡詳細資料
     */
    public function viewDetail($inputs)
    {
        $style = $inputs['style'];
        $sql1 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $sql2 = "SELECT * FROM `style` WHERE `isDelete` = 0";
        $store_list = $this->getSQLResult($sql1);
        $style_list = $this->getSQLResult($sql2);

        if (!is_null($style_list)) {
            $this->smarty->assign('styles', $style_list);
        }
        // footer info
        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }

        $this->smarty->assign('title', '眼鏡選購');
        $this->smarty->display('buy_detail.html');
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
