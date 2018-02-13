<?php

namespace graychen\yii2\apilist;

use yii;
use yii\base\module as BaseModule;

class Module extends BaseModule
{
        public $controllerNamespace = 'graychen\yii2\apilist\controllers';

        public $sourceLanguate = 'en-US';

        public function init()
        {
            parent::init();
        }

}
