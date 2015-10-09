<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="--><?//=$this->config->base_url()?><!--css/bootstrap.min.css" rel="stylesheet">-->
<!--            <link href="../../css/bootstrap.min.css" rel="stylesheet">-->
            <?php foreach($headers['css'] as $k=>$css):?>
                <?php if($css != ''):?>
                    <link href="<?=$css?>" rel="stylesheet">
                <?php endif?>
            <?php endforeach?>
            <?php foreach($headers['js'] as $k=>$js):?>
                <?php if($js != ''):?>
                    <script src="<?=$js?>"></script>
                <?php endif?>
            <?php endforeach?>
        <title>
            <?=$headers['title']?>
        </title>
    </head>
    <body>
