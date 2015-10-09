<?php

function parse($str) {
    $pattern = '#<script(.*?)> *?window._sharedData *?=(.*?);?</script>#is';
    preg_match($pattern, $str, $matches);
    if (isset($matches)) {
        return $matches[2];        
    } else {
        return false;
    }
}

function extract_images($data) {
    $results = [];
    if (isset($data) && isset($data['entry_data']) && isset($data['entry_data']['ProfilePage'])
        && isset($data['entry_data']['ProfilePage']['0'])
        && isset($data['entry_data']['ProfilePage']['0']['user'])
        && isset($data['entry_data']['ProfilePage']['0']['user']['media'])
        && isset($data['entry_data']['ProfilePage']['0']['user']['media']['nodes'])) 
    {
        $images = $data['entry_data']['ProfilePage']['0']['user']['media']['nodes'];
    }

    foreach($images as $image) {
        if (isset($image['display_src'])) {
            $results[] = $image['display_src'];
        }
    }
    return $results;
}

function get_user_list() {
    global $config;

    $host = $config['db_input']['host'];
    $username = $config['db_input']['username'];
    $password = $config['db_input']['password'];
    $database = $config['db_input']['database'];
    $table = $config['db_input']['table'];
    $column = $config['db_input']['column'];

    $list = [];

    $link = mysqli_connect($host, $username, $password)
      or die('Could not connect: ' . mysqli_error($link));
    mysqli_select_db($link, $database) or die('Could not select database' . mysqli_error($link));

    $sql = sprintf("SELECT %s FROM %s",
                   $column,
                   $table);
    $result = mysqli_query($link, $sql) or die('SQL execution failed: ' . mysqli_error($link));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $list[] = $row[$column];
        }
    }
    return $list;
}

/**
   @param $data Array
 */
function save_to_db($data) {
    global $config;

    $host = $config['db_output']['host'];
    $username = $config['db_output']['username'];
    $password = $config['db_output']['password'];
    $database = $config['db_output']['database'];
    $table = $config['db_output']['table'];
    $column = $config['db_output']['column'];

    $link = mysqli_connect($host, $username, $password)
      or die('Could not connect: ' . mysqli_error($link));
    mysqli_select_db($link, $database) or die('Could not select database' . mysqli_error($link));
    $data = array_filter($data);
    $data = array_map('mysqli_real_escape_string', array_fill(0, count($data), $link), $data);

    foreach($data as $item) {
        $sql = sprintf("INSERT INTO %s (%s) VALUES ('%s')",
                       $table,
                       $column,
                       $item);
        @mysqli_query($link, $sql);
    }
}
