<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 興南首頁
 */
class Education
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
     * 顯示
     */
    public function view()
    {
        $sql = 'SELECT `article`.`title`, `article`.`articleId` , `article`.`preview`, `article`.`type`,`article`.`ctr` , `article`.`lastUpdateTime`, `article`.`createTime`,`image`.`path`
                FROM  `article`
                LEFT JOIN  `image` ON `article`.`articleId` = `image`.`itemId`
                WHERE `article`.`type` = 1
                ORDER BY `article`.`createTime` DESC';
        $res = $this->db->prepare($sql);
        $res->execute();
        $alleducationData = $res->fetchAll();

        $this->smarty->assign('alleducationData', $alleducationData);
        $this->setResultMsg();
        $this->smarty->assign('title', '衛教文章');
        $this->smarty->display('education.html');

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
