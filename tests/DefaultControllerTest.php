<?php
namespace graychen\yii2\apilist\tests;

use Yii;

class DefaultControllerTest extends BaseCase
{
    protected function setUp()
    {
        $textpath=dirname(__FILE__) . '/../src/config/rules.php';
        if (!file_exists($textpath)) {
            mkdir(dirname(__FILE__). '/../src/config');
            $file=fopen($textpath, 'a+');
            $content="<?php\r
                return [\r
                    [\r
                        'class' => 'yii\\rest\UrlRule',\r
                        'controller' => 'v1/default',\r
                        'only' => ['index']\r
                    ],\r
                ];";
            fwrite($file, $content);
            fclose($file);
        }
        parent::setUp();
    }

    protected function tearDown()
    {
        unlink(dirname(__FILE__) . '/../src/config/rules.php');
        rmdir(dirname(__FILE__). '/../src/config');
        parent::tearDown();
    }

    public function testIndex()
    {
        $param = [
                    'index' => []
        ];
        Yii::$app->request->queryParams = $param;
        $res=Yii::$app->runAction('api-list/default');
        $this->assertEquals("/v1/defaults", $res['Default']);
    }
}
