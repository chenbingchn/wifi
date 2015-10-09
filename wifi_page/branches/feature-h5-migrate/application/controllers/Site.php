<?php

    class Site extends CI_Controller{

        public function __construct(){
            parent::__construct();

        }
        public function index(){
            $this->load->view('site/index');
        }

        /**
         *
         * 赚取积分的页面
         *
         */

        public function earn_poins(){

            $this->load->Model('poins');
            $row = $this->poins->article();
            $display = $this->poins->event();

            if(isset($_GET['language'])){
                $ep = $_GET['language'];
            }else{
                $ep = '';
            }
            if(isset($_GET['id'])){
                $user=$_GET['id'];
            }else{
                $user = -1;
            }
            if(isset($_GET['imei'])){
                $imei=$_GET['imei'];
            }else{
                $imei = -1;
            }

            $str = $this->poins->runs($user,$imei);

            switch($ep){
                case 'zh_CN':
                    $langC="Contentzh";
                    $langT="titlezh";
                    $lang = "english";
                    break;
                case 'in_ID':
                    $langC="Contentyn";
                    $langT="titleyn";
                    $lang = "indonesian";
                    break;
                default:
                    $langC="Content";
                    $langT="title";
                    $lang = "english";
            }

            /**
             *
             * 需要写入头文件和脚文件的css、js和title内容
             *
             */

            $headers['js'][0] = ''.$this->config->base_url().'js/earn_poins/Earn.js';

            $headers['css'][0] = ''.$this->config->base_url().'css/lib/bootstrap.min.css';
            $headers['css'][1] = ''.$this->config->base_url().'css/earn_poins/idangerous.swiper.css';
            $headers['css'][2] = ''.$this->config->base_url().'css/earn_poins/wifi.css';

            $headers['title'] = 'Earn_poins';

            $footers['js'][0] = '';

            /**
             *
             * 向view层传递参数
             *
             */

            $this->load->language('all',$lang);
            $this->load->vars('langT',$langT);
            $this->load->vars('langC',$langC);
            $this->load->vars('str',$str);
            $this->load->vars('headers',$headers);
            $this->load->vars('footers',$footers);
            $this->load->vars('display',$display);
            $this->load->vars('row',$row);
            $this->load->view('header');
            $this->load->view('site/earn_poins');
            $this->load->view('footer');
        }

        /**
         *
         * 发现页面
         *
         */

        public function discovery(){

            $this->load->Model('discovery');
            $class = $this->discovery->mainclass();
            $cat = $this->discovery->categorys();
            $ban = $this->discovery->banner();

            if(isset($_GET['language'])){
                $ep = $_GET['language'];
            }else{
                $ep = '';
            }

            switch($ep){
                case 'zh_CN':
                    $lang ="zh";
                    break;
                case 'in_ID':
                    $lang ="yn";
                    break;
                default:
                    $lang ="";
            }

            /**
             *
             * 需要写入头文件和脚文件的css、js和title内容
             *
             */

            $headers['js'][0] = ''.$this->config->base_url().'js/lib/jquery.min.js';

            $headers['css'][0] = ''.$this->config->base_url().'css/lib/bootstrap.min.css';
            $headers['css'][1] = '';
            $headers['css'][2] = ''.$this->config->base_url().'css/discovery/style.css';
            $headers['css'][3] = 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.2/css/swiper.min.css';

            $headers['title'] = 'Find';

            $footers['js'][0] = ''.$this->config->base_url().'js/discovery/fold.js';
            $footers['js'][1] = ''.$this->config->base_url().'js/discovery/Navi.js';


            /**
             *
             * 向view层传递参数
             *
             */

            $this->load->vars('class',$class);
            $this->load->vars('lang',$lang);
            $this->load->vars('cat',$cat);
            $this->load->vars('ban',$ban);
            $this->load->vars('headers',$headers);
            $this->load->vars('footers',$footers);
            $this->load->view('header');
            $this->load->view('site/discovery');
            $this->load->view('footer');
        }
		
		/**
         *
         * 发现页面跳转页面
         *
         */

        public function control(){

            if(isset($_GET['new'])){
                $url = $_GET['new'];
            }else{
                $url = $this->config->base_url();
            }

            /**
             *
             * 需要写入头文件和脚文件的css、js和title内容
             *
             */

            $headers['js'][0] = '';

            $headers['css'][0] = '';

            $headers['title'] = 'Find';

            $footers['js'][0] = '';

            /**
             *
             * 向view层传递参数
             *
             */

            $this->load->vars('headers',$headers);
            $this->load->vars('footers',$footers);
            $this->load->vars('url',$url);
            $this->load->view('header');
            $this->load->view('site/control');
            $this->load->view('footer');
        }
		
		/**
         *
         * 美女图片
         *
         */

        public function eladies(){

            $this->load->Model('girls');
            $pic = $this->girls->image();

            /**
             *
             * 需要写入头文件和脚文件的css、js和title内容
             *
             */

            $headers['js'][0] = ''.$this->config->base_url().'js/lib/jquery.min.js';
            $headers['js'][1] = ''.$this->config->base_url().'js/lib/bootstrap.min.js';

            $headers['css'][0] = ''.$this->config->base_url().'css/lib/bootstrap.min.css';
            $headers['css'][0] = ''.$this->config->base_url().'css/eladies/eladies.css';

            $headers['title'] = 'Eladies';

            $footers['js'][0] = ''.$this->config->base_url().'js/eladies/down.js';

            /**
             *
             * 向view层传递参数
             *
             */

            $this->load->vars('pic',$pic);
            $this->load->vars('headers',$headers);
            $this->load->vars('footers',$footers);
            $this->load->view('header');
            $this->load->view('site/eladies');
            $this->load->view('footer');
        }

        public function show(){
            $this->load->view('site/show');
        }

    }
?>