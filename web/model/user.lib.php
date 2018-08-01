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
        $this->getStoreList();
    }

    /**
     * 取得店舖資料
     */
    private function getStoreList()
    {
        $sql = "SELECT `storeName`, `phoneNumber`, `address` FROM `store`";
        $store_list = NULL;
        $res = $this->db->prepare($sql);

        if ($res->execute()) {
            $store_list = $res->fetchAll();
            $this->setResultMsg();
        } else {
            $error = $res->errorInfo();
            $this->setResultMsg('failure', $error[0]);
        }

        if (!is_null($store_list)) {
            $this->smarty->assign('stores', $store_list); 
        }
    }

    /**
     * 會員頁面
     */
    public function view()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $this->smarty->assign('title', '會員專區');
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
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $userId = $_SESSION['userId'];
        $sql = "SELECT `user`.`userId`, `user`.`userName`,
                       `user`.`account`, `user`.`phone`, 
                       `user`.`address`, `user`.`birthday`
                FROM  `user`
                WHERE  `user`.`userId` = :userId AND `user`.`isDelete` = 0";

        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        if (!$res->execute()) {
            $error = $res->errorInfo();
            $this->setResultMsg('failure', $error[0]);
        }        
        $userDetailData = $res->fetch();


        $this->smarty->assign('userDetailData', $userDetailData);
        $this->smarty->assign('userId', $userId);
        $this->smarty->assign('title', '會員資料');
        $this->smarty->display('user/userDetail.html');
    }

    public function editUserDetail($input)
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }

        $userId = $_SESSION["userId"];
        $sql = "UPDATE `user`
                SET  `lastUpdateTime` = :lastUpdateTime,
                     `userName` = :userName, 
                     `userId` = :userId, `phone` = :phone,
                     `address` = :address
                WHERE `userId` = :userId;";

        $now = date('Y-m-d H:i:s');
        $res = $this->db->prepare($sql);

        $res->bindParam(':lastUpdateTime', $now, PDO::PARAM_STR);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        $res->bindParam(':phone', $input['phone'], PDO::PARAM_STR);
        $res->bindParam(':userName', $input['userName'], PDO::PARAM_STR);
        $res->bindParam(':address', $input['address'], PDO::PARAM_STR);
        if (!$res->execute()) {
            $error = $res->errorInfo();
            $this->setResultMsg('failure', $error[0]);
        }


        header("Location:../controller/userController.php?action=userDetailView");

    }

    public function orderRecordView()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $userId = $_SESSION["userId"];


        $sql = "SELECT `tran`.`tranId`, `tran`.`createTime`, `tran`.`checkState`, `tran`.`price`
        FROM `tran` 
        WHERE `userID` = '{$userId}' AND `tran`.`isDelete` = 0 AND `tran`.`createTime` >= DATE_SUB(NOW(),INTERVAL 1 YEAR);";
        $res = $this->db->prepare($sql);
        if(!$res->execute()) {
            goto failed;
        }
        $allTrans = $res->fetchAll();

        foreach ($allTrans as &$singleTran) {
            $sql = "SELECT `tranDetail`.`itemId`, `tranDetail`.`itemNum`
            FROM `tranDetail` 
            WHERE `tranDetail`.`tranId` = '{$singleTran["tranId"]}' AND `tranDetail`.`isDelete` = 0;";
            $res = $this->db->prepare($sql);
            if(!$res->execute()){
                goto failed;
            }
            $tranDetail = $res->fetchAll();
            $singleTran["tranDetail"] = $tranDetail;
            

            // get item name
            foreach ($singleTran["tranDetail"] as &$singleItem) {
                $whichItem = explode("_", $singleItem["itemId"])[0]; // exmaple: frame_1234 will return frame
                $sql = "SELECT `{$whichItem}`.`{$whichItem}Name`
                FROM `{$whichItem}` 
                WHERE `{$whichItem}`.`{$whichItem}Id` = '{$singleItem["itemId"]}';";
                $res = $this->db->prepare($sql);

                if(!$res->execute()){
                    goto failed;
                }
                $resItem = $res->fetch();
                $itemName = $resItem["{$whichItem}Name"];
                $singleItem["itemName"] = $itemName;
            }
        }
        $this->smarty->assign('allTrans', $allTrans);
        $this->smarty->assign('title', '訂單查詢');
        $this->smarty->display('user/orderRecord.html');
        return;

        failed :
        $error = $res->errorInfo();
        $this->setResultMsg('failure', $error[0]);
    }

    public function pointRecordView()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $userId = $_SESSION['userId'];
        $sql = "SELECT `user`.`point`
                FROM `user` 
                WHERE `user`.`userId`=:userId;";
        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        if(!$res->execute()) {
            goto failed;
        }
        $result = $res->fetch();
        $this->smarty->assign('remainPoint', $result["point"]);


        $sql = "SELECT `tranId`, `createTime`, `price`, `point`
                FROM `tran`
                WHERE `userId`=:userId AND `isDelete`=0 AND `point`>0;";
        
        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        if(!$res->execute()) {
            goto failed;
        }
        $allTrans = $res->fetchAll();
        $this->smarty->assign('allTrans', $allTrans);


        $sql = "SELECT `user`.`userName`
                FROM `user` 
                WHERE `user`.`introducerId`=:userId;";
        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        if(!$res->execute()) {
            goto failed;
        }
        $allintroducees = $res->fetchAll();
        $this->smarty->assign('allintroducees', $allintroducees);
        $this->smarty->assign('title', '點數查詢');
        $this->smarty->display('user/pointRecord.html');
        

        failed :
        $error = $res->errorInfo();
        $this->setResultMsg('failure', $error[0]);
    }

    public function couponView()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $userId = $_SESSION['userId'];
        $sql = "SELECT `pushCoupon`.`couponId`, `coupon`.`price`, `coupon`.`content`, `coupon`.`title`, `pushCoupon`.`isUsed`, `coupon`.`startTime`, `coupon`. `endTime`
                FROM `pushCoupon`
                LEFT JOIN `coupon` ON `coupon`.`couponId`=`pushCoupon`.`couponId`
                WHERE `pushCoupon`.`userId`=:userId AND `coupon`.`type`=2 AND `coupon`.`isDelete`=0 AND `coupon`.`endTime` >= Now();";

        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        $res->execute();
        $allCoupons = $res->fetchAll();
        $this->smarty->assign('allCoupons', $allCoupons);
        $this->smarty->assign('title', '專屬折價卷');
        $this->smarty->display('user/coupon.html');

    }

    public function infoView()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
        }
        $userId = $_SESSION['userId'];
        $sql = "SELECT `pushCoupon`.`couponId`, `coupon`.`price`, `coupon`.`content`, `coupon`.`title`, `coupon`.`startTime`, `coupon`.`endTime`
                FROM `pushCoupon`
                LEFT JOIN `coupon` ON `coupon`.`couponId`=`pushCoupon`.`couponId`
                WHERE `pushCoupon`.`userId`=:userId AND `coupon`.`type`=1 AND `coupon`.`isDelete`=0 AND `coupon`.`endTime` >= Now();";

        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_STR);
        $res->execute();
        $allInfos = $res->fetchAll();
        $this->smarty->assign('allInfos', $allInfos);
        $this->smarty->assign('title', '消息通知 ＆ 通告');
        $this->smarty->display('user/info.html');

    }

    public function cartView()
    {
        if (!isset($_SESSION['isLogin'])) {
            $this->viewLogin();
            return;
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
        session_unset();
        session_destroy();
        $this->smarty->assign('error', $this->error);
        $this->smarty->assign('homePath', APP_ROOT_DIR);
        $this->smarty->assign('title', '登入頁面');
        $this->smarty->display('login.html');
        
    }
}
