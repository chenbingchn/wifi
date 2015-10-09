<?php

require 'helper.php';

$config = require(__DIR__ . '/config.php');
$filename = __DIR__ . DS . 'output' . DS . date("Ymd_His") . '.txt';

function my_curl($url) {
    global $config;
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_REFERER, $config['home_page']);
    // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $config['timeout']);
    curl_setopt($curl, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_FRESH_CONNECT, true); //强制获取一个新的连接，替代缓存中的连接。

    if ($config['use_proxy'] == true) {
        if ($config['proxy']['type'] == 'socks5') {
            // http://stackoverflow.com/questions/14944067/curl-request-using-socks5-proxy-fails-when-using-php-but-works-through-the-comma
            curl_setopt($curl, CURLOPT_PROXYTYPE, 7);
        }
        curl_setopt($curl, CURLOPT_PROXY, $config['proxy']['url']);
    }

    // curl_setopt($curl, CURLOPT_USERAGENT, "User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36");
    curl_setopt($curl, CURLOPT_USERAGENT, "Baiduspider+(+http://www.baidu.com/search/spider.htm)");

    $contents = curl_exec($curl);
    $headers = curl_getinfo($curl);
    $error_msg = curl_error($curl);

    curl_close($curl);

    if (intval($headers['http_code']) == 200) {
        return $contents;
    } else {
        echo "HTTP response code as " . $headers['http_code'] . " when requesting " . $url . "\n";
        return false;
    }
}


$user_list = get_user_list();
foreach($user_list as $user) {
    if (!empty(trim($user))) {
        $page_contents = my_curl($config['home_page'] . $user);
        if (!empty($page_contents)) {
            $raw_data = parse($page_contents);
            if (!empty($raw_data)) {
                $data = @json_decode($raw_data, true);
                $images = extract_images($data);
                save_to_db($images);
            }
        }
    }
}
