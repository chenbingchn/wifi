<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <title><?=$this->lang->line('html_title')?></title>
    <link rel="stylesheet" type="text/css" href="<?=config_item('base_url')?>css/common/base.css">
    <link rel="stylesheet" type="text/css" href="<?=config_item('base_url')?>css/award/style.css">
</head>
<body>
<div id="page_top">
    <img src="<?=$this->lang->line('bg_top')?>">
    <div id="back_left" onclick="rePage()">
        <img src="<?=config_item('base_url')?>images/award/back_left.png">
    </div>
</div>
<div id="page_center">
    <div id="center_content">
        <div id="prize_list">
            <p id="title"><?=$this->lang->line('title')?></p>
            <?php
                foreach($award as $key=>$value) {
                    $type = $this->lang->line('award_type');
                    echo "<p class='prize_title'>".++$key.".&nbsp;&nbsp;&nbsp;".$value[$type]."</p>";
                    foreach(explode(',',$value['mobile']) as $k=>$v) {
                        echo "<li>".substr_replace($v, '****', 3, 4)."</li>";
                    }
                }
            ?>

        </div>
    </div>
</div>

<div id="page_bottom">
    <img src="<?=config_item('base_url')?>images/award/bg_bottom.jpg">
    <div id="bottom_content">
        <div id="left_text">
            <p><?=$this->lang->line('description1')?></p>
            <p><?=$this->lang->line('description2')?></p>
        </div>
        <div id="right_pic">
            <img src="<?=config_item('base_url')?>/images/award/qr.jpg">
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>
    function rePage(){
        window.location.href="backapp://back";
    }
</script>
</body>
</html>