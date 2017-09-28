<?php

namespace graychen\yii2\api;

use yii;
use yii\base\module as BaseModule;

class Module extends BaseModule
{
        public $controllerNamespace = 'graychen\yii2\api\controllers';

        public $sourceLanguate = 'en-US';

        public function init()
        {
                parent::init();
                $this->registerTranslations();
        }

        protected function registerTranslations()
        {
                Yii::$app->i18n->translations['graychen/yii2/api/*'] = [
                     'class' => 'yii\i18n\PhpMessageSource',
                     'sourceLanguage' => $this->sourceLanguage,
                     'basePath' => '@graychen/yii2/api/messages',
                     'fileMap' => [
                            'graychen/yii2/api/api' => 'api.php',
                    ],
                ];
        }

         /**
         * Translates a message. This is just a wrapper of Yii::t
         *
         * @see Yii::t
         *
         * @param $category
         * @param $message
         * @param array $params
         * @param null $language
         * @return string
         */
         public static function t($category, $message, $params = [], $language = null)
         {
                return Yii::t('zacksleo/yii2/api/' . $category, $message, $params, $language);
         }
}
