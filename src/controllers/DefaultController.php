<?php

namespace graychen\yii2\apilist\controllers;

use yii;

class DefaultController extends yii\web\Controller
{
    /**
        * 接口列表
        * @return array
        */
        public function actionIndex()
        {
            $rules = require(dirname(__FILE__) . './../config/rules.php');
            $items = null;
            foreach ($rules as $rule) {
                $explodeArray = explode('/', $rule['controller']);
                $title = ucwords(str_replace('-', ' ', end($explodeArray)));
                $items[$title] = '/'.$rule['controller'] . 's';
            }
            return $items;
        }
}
