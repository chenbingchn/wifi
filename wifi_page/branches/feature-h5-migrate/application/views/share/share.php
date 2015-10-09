<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
        <link rel="stylesheet" type="text/css" href="<?=$this->config->base_url()?>css/common/base.css" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?=$this->lang->line('find_share_css')?>" charset="utf-8">
        <title><?=$this->lang->line('share_title')?></title>
    </head>
    <body>
        <div class="content">
            <p><?=$this->lang->line('share_p1')?></p>
            <img src="<?=$this->lang->line('share_img1')?>">
            <p><?=$this->lang->line('share_p2')?></p>
            <img src="<?=$this->lang->line('share_img2')?>">
            <p><?=$this->lang->line('share_p3')?></p>
            <img src="<?=$this->lang->line('share_img3')?>">
            <p><?=$this->lang->line('share_p4')?></p>
            <img src="<?=$this->lang->line('share_img4')?>">
            <p><?=$this->lang->line('share_p5')?></p>
        </div>
        <div class="share_button" onclick="window.intent.shareIntent()"><?=$this->lang->line('share_button')?></div>
    </body>
</html>
