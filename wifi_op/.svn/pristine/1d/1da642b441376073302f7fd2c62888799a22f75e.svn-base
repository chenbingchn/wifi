<?php
namespace app\models;

use Yii;

class Newuser{
    public function User_id(){
        $url = 'http://localhost:8888/api/snowflake';
        $beginToday=file_get_contents($url);
//        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        return $beginToday;
    }
    public function User(){
        $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 's','#');

        $length = 4;
        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);

        $user = '';
        for($i = 0; $i < $length; $i++)
        {
            // 将 $length 个数组元素连接成字符串
            $user .= $chars[$keys[$i]];
        }
        $user='user'.$user;
        return $user;
    }

    public function Password(){
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
            'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $length = 8;
        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);

        $password = '';
        for($i = 0; $i < $length; $i++)
        {
            // 将 $length 个数组元素连接成字符串
            $password .= $chars[$keys[$i]];
        }
        $password=$password;
        return $password;
    }
}
?>