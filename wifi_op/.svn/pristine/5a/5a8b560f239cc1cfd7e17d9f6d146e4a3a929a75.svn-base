<?php

namespace app\commands;

use yii\console\Controller;
use ReflectionClass;
use Yii;
use app\components\TAuthManager;

class AuthController extends Controller {

    public function actionIndex() {
        $controllerDir = dirname(__FILE__) . "/../controllers";
        $controllerArray = array();
        if ($handle = opendir($controllerDir)) {
            while (($file = readdir($handle)) !== false) {
                if ($file != "." && $file != "..") {    //排除上级目录 和当前目录
//                    echo strrchr($file,'.');die;
                    if($file!= 'SiteController.php'&&strrchr($file,'.') == '.php'){
                        $controllerArray[] = $file;
                    }
                }
            }
        }
        $items = array();
        foreach ($controllerArray as $controller) {
            $pos = strpos($controller, '.');
            $controller = substr($controller, 0, $pos);
            $prefix = 'app\controllers\\';
            $class = new ReflectionClass($prefix . $controller);
            $methods = $class->getMethods();
            foreach ($methods as $v) {
                if (strpos($v->name, 'action') !== false && $v->name != 'actions') {
                    $result ="";
                    preg_match('/@desc +(?:([^\n]+)\n)/',$v->getDocComment(),$result);
                    $desc = array_pop($result);
//                    var_dump($desc);die;
//                    var_dump($v->getDocComment());
//                    $desc =  rtrim(substr($v->getDocComment(),  strrpos($v->getDocComment(), '@desc')+5),'*/');
                    $strContrller = substr($controller, 0, strpos($controller, 'Controller'));
//                     echo strtolower($strContrller).".".strtolower(substr($v->name,6));
                    $items[] = [
                        'item'=>strtolower($strContrller) . "." . strtolower(substr($v->name, 6)),
                        'desc'=>$desc,
                    ];
                }
            }
        }
        foreach ($items as $item) {
            if (!Yii::$app->TAuthManager->getPermission($item['item'])) {
                Yii::$app->db->createCommand()
                        ->insert('auth_item', [
                            'name' => $item['item'],
                            'type' => 2,
                            'description' => $item['desc'],
                            'rule_name' => null,
                            'data' => null,
                            'created_at' => time(),
                            'updated_at' => time(),
                        ])->execute();
            }
        }
        echo "ok";
    }

}
