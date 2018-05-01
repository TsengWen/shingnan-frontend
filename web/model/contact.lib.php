<?php
// initialize
require_once HOME_DIR . 'configs/config.php';

/**
 * 聯絡我們
 */
class Contact
{
    public $db = null;
    public $smarty = null;
    public $msg = '';
    public $error = '';
    public $admin = null;

    /**
     * Contact constructor
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
     * 顯示連絡我們
     */
    public function view() {
        $sql = 'SELECT `store`.`storeId`, `store`.`storeName`, `store`.`phoneNumber`, `store`.`address`, `store`.`businessFrom`,`store`.`businessTo`, `store`.`description` 
            FROM  `store` 
            ORDER BY `store`.`storeId`';
        $res = $this->db->prepare($sql);
        if($res->execute()){
            $store = $res->fetchAll();
            $lat = array(); 
            $lng = array();           
            $fullAddress = array();
            foreach($store as $i){
                $set_address=$i['storeName'];
                $data_array = $this->geocode($set_address);
                array_push($lat,$data_array[0]);
                array_push($lng,$data_array[1]);
                array_push($fullAddress,$data_array[2]);
            }
        }
        // $set_address="台南市東區長榮路三段6號";
        // $data_array = $this->geocode($set_address);
        // $lat = $data_array[0];
        // $lng = $data_array[1];
        // $address = $data_array[2];
        // echo $lat." ".$lng." ".$address;

        $this->setResultMsg();
        $this->smarty->assign('title', '聯絡我們');
        $this->smarty->assign('lat',$lat);
        $this->smarty->assign('lng',$lng);
        $this->smarty->assign('fullAddress',$fullAddress);
        $this->smarty->assign('store',$store);
        $this->smarty->display('contact.html');
    }
    //ture chinese address to lat & lng
    private function geocode($address){
        /*用來將字串編碼，在資料傳遞的時候，如果直接傳遞中文會出問題，所以在傳遞資料時，通常會使用urlencode先編碼之後再傳遞*/
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $address = urlencode('興南眼鏡行'.$address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBEaxtJ4cXdEHXGNN83VPMSs0f0w1_rFCw";
        $response_json = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $response = json_decode($response_json, true);
        /*success status會回傳OK*/ 
        if($response['status']='OK'){
            $latitude_data = $response['results'][0]['geometry']['location']['lat']; //緯度
            $longitude_data = $response['results'][0]['geometry']['location']['lng']; //精度
            $data_address = $response['results'][0]['formatted_address'];
            //echo $latitude_data." ".$longitude_data." ".$data_address."<br>";
            if($latitude_data && $longitude_data && $data_address){
                $data_array = array();            
                array_push(
                    $data_array,
                    $latitude_data, //$data_array[0]
                    $longitude_data, //$data_array[1]
                    $data_address //$data_array[2]
                );
                return $data_array; //回傳$data_array

            }else{
                return false;
            }
        }else{
                return false;
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

