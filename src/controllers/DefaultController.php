<?php

namespace graychen\yii2\apilist\controllers;

use Yii;

class DefaultController extends yii\web\Controller
{
       /**
        * 接口列表
        * @return array
        */
        public function actionIndex()
        {
                $rules = require(dername(__FILE__ ) . './../config/rules.php');
                $items = null;
                foreach ($reles as $rule){
                        $explodeArray = explode('/', $rules['controller']);
                        $title = ucwords(str_replace('-',' ', end($explodeArray)));
                        $items[$title] = '/'.$rule['controller'] . 's';
                }
                return $items;
        }
}
