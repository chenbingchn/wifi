<?php
    class Poins extends CI_Model {

        /**
         * 表连接
         */

        public function __construct(){

            parent::__construct();
            $this->load->database();

        }

        /**
         * 页面加载首先启动的
         */

        public function runs($user,$imei){
            if($user != -1){
                $str = $this->userlogin($user,$imei);
            }elseif($imei != -1){
                $str = $this->imeilogin($user,$imei);
            }else{
                $str['user'] = $user;
                $str['imei'] = $imei;
                $str['sharewifi'] = '';
                $str['sharefrd'] = '';
                $str['type'] = 3;
                $str['name'] = '';
                $str['integral'] = '';
            }
            return $str;
        }

        /**
         * 页面中列表内容信息显示
         */

        public function article(){
            $query = $this->db->get('article');
            return $query->result();
        }

        /**
         * 查看是否有活动生成并且显示到页面中
         * 只有flag为0的时候才能说明这个活动正在进行中
         */

        public function event(){
            $this->db->where('flag','0');
            $this->db->select('');
            $query = $this->db->get('activity');
            return $query->row();
        }

        /**
         *
         * 用手机账号登陆的时候需要验证的所有条件
         * $query->获取积分配置表中的内容信息
         * $sharewifi->wifi分享时所得到的积分是否超过上限
         * $sharefrd->分享给朋友的所得到的积分是否超过上限
         * $master->获取这个登陆用户有哪些附属账号
         * $str->向页面传递内容信息的多维数组
         *
         */

        public function userlogin($user,$imei){

            $datenow = date('Y-m-d');

            $query = $this->db->get('score_limit_config');
            $max = $query->result();

            $this->db->where('id',$user)->where('date',$datenow)->where('type',2)->where('count',$max[2]->limits);
            $sq = $this->db->get('userid_score_limit');
            $sharewifi = $sq->result();

            $this->db->where('id',$user)->where('date',$datenow)->where('type',5)->where('count',$max[5]->limits);
            $row = $this->db->get('userid_score_limit');
            $sharefrd = $row->result();

            $this->db->where('master_uid',$user);
            $uid = $this->db->get('account');
            $master = $uid->result();

            if($master == null){
                $this->db->where('user_id',$user);
                $this->db->select('third_type');
                $type = $this->db->get('account');
                $third = $type->result();
                if($third == null){
                    $type = 3;
                }else{
                    switch($third[0]->third_type){
                        case 0 :
                            $type = 0;
                            break;
                        case 2 :
                            $type = 2;
                            break;
                    }
                }
            }else{
                $type = 1;
            }

            $this->db->where('user_id',$user);
            $users = $this->db->get('account');
            $name = $users->result();

            $str['user'] = $user;
            $str['imei'] = $imei;
            $str['sharewifi'] = $sharewifi;
            $str['sharefrd'] = $sharefrd;
            $str['type'] = $type;
            $str['name'] = $name;
            $str['integral'] = '';

            return $str;

        }

        /**
         *
         * 用imei账号登陆的时候需要验证的所有条件
         * $query->获取积分配置表中的内容信息
         * $sharewifi->wifi分享时所得到的积分是否超过上限
         * $sharefrd->分享给朋友的所得到的积分是否超过上限
         * $str->向页面传递内容信息的多维数组
         *
         */

        public function imeilogin($user,$imei){

            $datenow = date('Y-m-d');

            $this->db->where('id',$imei);
            $limit = $this->db->get('imei_score');
            $integral = $limit->result();

            $query = $this->db->get('score_limit_config');
            $max = $query->result();

            $this->db->where('id',$imei)->where('date',$datenow)->where('type',2)->where('count',$max[2]->limits);
            $sq = $this->db->get('imei_score_limit');
            $sharewifi = $sq->result();

            $this->db->where('id',$imei)->where('date',$datenow)->where('type',5)->where('count',$max[5]->limits);
            $row = $this->db->get('imei_score_limit');
            $sharefrd = $row->result();

            $str['user'] = $user;
            $str['imei'] = $imei;
            $str['sharewifi'] = $sharewifi;
            $str['sharefrd'] = $sharefrd;
            $str['type'] = '';
            $str['name'] = '';
            $str['integral'] = $integral;

            return $str;
        }

    }
?>