<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 興南首頁
 */
class About
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    private $page; //page number
    private $limit; //per page
    private $total; //total data

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
    public function view($input)
    {
        $this->limit = 5; //show per page

        $this->page = (isset($input['page'])) ? $input['page'] : 1;

        //get total
        $sql = "SELECT `article`.`title`
                FROM  `article`
                WHERE `article`.`type` = 3 ";
        $totalData = $this->db->prepare($sql);
        $totalData->execute();
        $this->total = $totalData->rowCount();

        //get data to show
        $start_from = ($this->page - 1) * 5;

        $sql1 = "SELECT `article`.*,`image`.`imageId`,`image`.`path`
                FROM  `article`
                LEFT JOIN  `image` ON `article`.`articleId` = `image`.`itemId`
                WHERE `article`.`type` = 3
                ORDER BY `article`.`createTime` DESC LIMIT $start_from,$this->limit";
        $sql2 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";

        $allaboutData = $this->getSQLResult($sql1);
        $store_list = $this->getSQLResult($sql2);

        if (!is_null($allaboutData)) {

            $host = 'http://' . $_SERVER['SERVER_NAME'];
            $pieces = explode("/", $_SERVER['REQUEST_URI']);
            $host_url = "$host/c.42j0/$pieces[1]/";

            $imagePath = array();
            foreach ($allaboutData as $img) {
                if (!is_null($img['path'])) {
                    $img['path'] = $host_url . substr($img['path'], 3);
                }
                array_push($imagePath, $img);
            }

            $this->smarty->assign('allaboutData', $imagePath);
        }
        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list);
        }

        $pagination = $this->createLinks($this->page);
        //echo $pagination;
        $this->smarty->assign('pagination', $pagination);
        $this->smarty->assign('title', '關於我們');
        $this->smarty->display('about.html');

    }

    //pagination link
    public function createLinks($links)
    {
        if ($this->total == 0) {
            return '';
        }

        $last = ceil($this->total / $this->limit);
        $start = (($this->page - $links) > 0) ? $this->page - $links : 1;
        $end = (($this->page + $links) < $last) ? $this->page + $links : $last;

        $html = '<ul class = "pagination">';

        $class = ($this->page == 1) ? "disabled" : "";

        $previous_page = ($this->page == 1) ?
        '<li class="page-item ' . $class . '"><a href="">&laquo;</a></li>' : //remove link from previous button
        '<li class="page-item ' . $class . '"><a href="?action=view&page=' . ($this->page - 1) . '">&laquo;</a></li>';

        $html .= $previous_page;

        if ($start > 1) { //print ... before (previous <<< link)
            $html .= '<li class="page-item" ><a href="?action=view&page=1">1</a></li>'; //print first page link
            $html .= '<li class="page-item"><a href="">...</a></li>'; //print 3 dots if not on first page
        }

        //print all the numbered page links
        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->page == $i) ? "active" : ""; //highlight current page
            $html .= '<li class="page-item "><a class="' . $class . '" href="?action=view&page=' . $i . '">' . $i . '</a></li>';
        }

        if ($end < $last) { //print ... before next page (>>> link)
            $html .= '<li class="page-item"><a href="">...</a></li>'; //print 3 dots if not on last page
            $html .= '<li class="page-item"><a href="?action=view&page=' . $last . '">' . $last . '</a></li>'; //print last page link
        }

        $class = ($this->page == $last) ? "disabled" : ""; //disable (>>> next page link)

        //$this->_page + 1 = next page (>>> link)
        $next_page = ($this->page == $last) ?
        '<li class="page-item ' . $class . '"><a href="">&raquo;</a></li>' : //remove link from next button
        '<li class="page-item ' . $class . '"><a href="?action=view&page=' . ($this->page + 1) . '">&raquo;</a></li>';

        $html .= $next_page;
        $html .= '</ul>';

        return $html;

    }

    /**
     * 顯示文章內容
     */
    public function viewContent($input)
    {
        //$sql = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        //$store_list = $this->getSQLResult($sql);
        $sql = "SELECT `article`.`articleId`, `article`.`title`, `article`.`content`,`article`.`lastUpdateTime`
                FROM  `article`
                WHERE  `article`.`isDelete` = 0 and `article`.`type` = 3 and
                `article`.`articleId` = :aboutId";
        $res = $this->db->prepare($sql);
        $res->bindParam(':aboutId', $input['id'], PDO::PARAM_STR);
        $res->execute();
        $ContentData = $res->fetch();

        $sql2 = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $store_list = $this->getSQLResult($sql2);
        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list);
        }
        // if (!is_null($store_list)) {
        //     $this->smarty->assign('stores', $store_list);
        // }
        $this->smarty->assign('ContentData', $ContentData);
        $this->smarty->assign('title', '興南眼鏡');
        $this->smarty->display('article_content.html');
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
