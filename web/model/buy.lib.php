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
     * 顯示眼鏡第一頁
     */
    public function view() {
        if ($_SESSION['isLogin'] == true) {
            // member login
        } else {
            $sql = "SELECT `image`.`path` FROM `brand`
                    INNER JOIN `image`
                    ON `brand`.`isDelete` = 0
                    AND `brand`.`brandId` = `image`.`itemId`
                    ORDER BY `lastUpdateTime`
                    DESC LIMIT 0, 8";
            $brands = $this->getSQLResult($sql);
            $this->smarty->assign('brands', $brands);

            $sql = "SELECT `im`.`path`, `tmp`.`styleName`
                    FROM `image` AS `im` INNER JOIN 
                    (SELECT `fs`.`frameId`, `s`.`styleName`,`s`.`lastUpdateTime`
                    FROM `style` AS `s` LEFT JOIN `frameStyle` AS `fs`
                    ON `s`.`isDelete` = 0 
                    AND `s`.`styleId` = `fs`.`styleId`) AS `tmp`
                    ON `im`.`itemId` = `tmp`.`frameId`
                    ORDER BY `tmp`.`lastUpdateTime` DESC";
            $frameStyles = $this->getSQLResult($sql);
            $frames = array();
            if(isset($frameStyles)) {
                $key = '';
                foreach($frameStyles as $item) {
                    if ($key != $item['styleName']){
                        $key = $item['styleName'];
                        $frames[$key] = array();
                    }
                    array_push($frames[$key], 'http://192.168.65.3/shingnan/web/controller/' . $item['path']);
                }
            }
            $this->smarty->assign('frames', $frames);

            $this->smarty->assign('title', '眼鏡選購');
            $this->smarty->display('buy.html');
        }
    }

    /**
     * 顯示眼鏡詳細資料
     */
    public function viewDetail() {
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
    public function getSQLResult($sql='') {
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
    public function setResultMsg($resultMsg='success', $errorMsg='') {
        $this->msg = $resultMsg;
        $this->error = $errorMsg;
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('msg', $this->msg);
    }
}
