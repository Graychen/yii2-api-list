<?php
namespace graychen\yii2\apilist\tests;

use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use PHPUnit\Framework\TestCase;

/**
 * This is the base class for all yii framework unit tests.
 */
class BaseCase extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();
    }
    protected function tearDown()
    {
        parent::tearDown();
        $this->destroyWebApplication();
    }
    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application')
    {
        return new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'i18n' => [
                    'translations' => [
                        '*' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                        ]
                    ]
                ],
            ],
            'modules' => [
                'api-list' => [
                    'class' => 'graychen\yii2\apilist\Module',
                    'controllerNamespace' => 'graychen\yii2\apilist\controllers'
                ]
            ]
        ], $config));
    }
    /**
     * @return string vendor path
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }
    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyWebApplication()
    {
        if (\Yii::$app && \Yii::$app->has('session', true)) {
            \Yii::$app->session->close();
        }
        \Yii::$app = null;
    }
}
