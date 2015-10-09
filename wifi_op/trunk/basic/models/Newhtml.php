<?php
namespace app\models;

use Yii;

class Newhtml{
    public function News($id,$down,$image){
        $file='html/push'.$id.'.php';
        if (!is_dir('html/')) mkdir('html/');
        $myfile = fopen("html/push$id.php", "w+") or die("Unable to open file!");
        $html='<!DOCTYPE>
                <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                </head>
                <body style="text-align:center; margin:0 auto;">
                    <a href="'.$down.'">
                    <div align="center" style=" z-index:1;">
                    <img src="'.$image.'" width="100%" />
                    </div>
                    </a>
                </body>
                </html>';
        fwrite($myfile, $html);
        fclose($myfile);
        return $file;
    }
}
?>