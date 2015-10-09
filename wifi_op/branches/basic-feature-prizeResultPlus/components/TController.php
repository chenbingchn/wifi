<?php

namespace app\components;

use yii\web\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TController extends Controller {

    public function behaviors() {
        return [

            [
                'class' => 'app\filters\Tfilter',
            ],
            [
                'class' => 'app\filters\Logfilter',
            ],
        ];
    }

}
