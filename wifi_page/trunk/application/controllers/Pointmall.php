<?php

class Pointmall extends CI_Controller {

    public function Index() {
//        $user_id = '643614411621273600';
//        $imei = '353347060351374';
//        $access_token = 'V1wCr0PioNoOMz0x7PT_WQ==';
        $this->load->model('Integralcategory');
        $this->load->model('Banner');
        $this->load->model('Account');
        $this->load->model('Integral');
        $this->load->model('Useridscore');
        $this->load->helper('url');
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : -1;
        $imei = isset($_GET['imei']) ? $_GET['imei'] : -1;
        $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : null;
        $language = isset($_GET['language']) ? $_GET['language'] : 'en_US';
        if($language =='yn'||$language =='in_ID' || $language =='in'){
            $language="indonesian";
        }elseif($language=='zh'||$language=="zh_CN"){
            $language="chinese";
        }else{
            $language="english";
        }
        $this->config->set_item('language',$language);
        $this->load->helper('language');
        $this->lang->load('pointMall');
        $integral_cate = $this->Integralcategory->getCatecory();
        $user = null;
        $banner = $this->Banner->getPoinBanner();
        $score ='0';
        if ($user_id && $user_id != -1) {
            $user = $this->Account->getUser($user_id);
            $score = $this->Useridscore->getScoreByUserId($user_id);
        }
        $data = array(
            'user' => $user,
            'integral_cate' => $integral_cate,
            'user_id' => $user_id,
            'imei' => $imei,
            'access_token' => $access_token,
            'banner' => $banner,
            'language' => $language,
            'score'=>$score
        );
        $this->load->view('pointmall/index', $data);
    }

    public function History() {
        $this->load->model('Integralrecord');
        $this->load->helper('url');
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : -1;
        $imei = isset($_GET['imei']) ? $_GET['imei'] : -1;
        $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : null;
        $language = isset($_GET['language']) ? $_GET['language'] : 'english';
        $this->config->set_item('language',$language);
        $this->load->helper('language');
        $this->lang->load('pointMall');
        $record = $this->Integralrecord->getHistoryByUserId($user_id);
        $data = array(
            'record' => $record,
            'user_id' => $user_id,
            'imei' => $imei,
            'access_token' => $access_token,
            'language' => $language,
        );
        $this->load->view('pointmall/history', $data);
    }

    public function Detail() {
        $this->load->model('Integral');
        $this->load->helper('url');
        $id = $_GET['id'];
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
        $imei = isset($_GET['imei']) ? $_GET['imei'] : null;
        $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : null;
        $language = isset($_GET['language']) ? $_GET['language'] : 'english';
        $this->config->set_item('language',$language);
        $this->load->helper('language');
        $this->lang->load('pointMall');
        $Integral = $this->Integral->getByPk($id);
        $data = array(
            'Integral' => $Integral,
            'user_id' => $user_id,
            'imei' => $imei,
            'access_token' => $access_token,
            'id' => $id,
            'language' => $language,
        );
        $this->load->view('pointmall/detail', $data);
    }

    public function Exchange() {
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
        $imei = isset($_GET['imei']) ? $_GET['imei'] : null;
        $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : null;
        $giftId = isset($_GET['giftId']) ? $_GET['giftId'] : null;
        $jsonArray = array('user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token, 'giftId' => $giftId);
        $url = $this->config->item('pointmall');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonArray);
        $result = curl_exec($ch);
        echo  $result;
    }

}
