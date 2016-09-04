<?php
namespace rvkulikov\yii2\pozvonimCom\tests\unit\modules;

use rvkulikov\yii2\pozvonimCom\modules\contacts\GetCallsOptions;
use rvkulikov\yii2\pozvonimCom\PCClient;
use rvkulikov\yii2\pozvonimCom\tests\unit\BaseTestCase;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class PCApiCallsTest
 *
 * @package rvkulikov\yii2\pozvonimCom\tests\unit\modules
 *
 * @author  Roman Kulikov <flinnraider@yandex.ru>
 */
class PCApiCallsTest extends BaseTestCase
{
    public function testGetCalls()
    {
        $pcClient = new PCClient([
            'userId' => \Yii::$app->params['pozvonimCom.userId'],
            'siteId' => \Yii::$app->params['pozvonimCom.siteId'],
            'apiKey' => \Yii::$app->params['pozvonimCom.apiKey'],
        ]);

        $callsApi = $pcClient->getCalls();
        $calls    = $callsApi->getCalls(new GetCallsOptions());

        VarDumper::dump($calls);
    }

    public function testGetCall()
    {
        $pcClient = new PCClient([
            'userId' => \Yii::$app->params['pozvonimCom.userId'],
            'siteId' => \Yii::$app->params['pozvonimCom.siteId'],
            'apiKey' => \Yii::$app->params['pozvonimCom.apiKey'],
        ]);

        $callsApi = $pcClient->getCalls();
        $calls    = $callsApi->getCalls(new GetCallsOptions());

        $call = $callsApi->getCall(ArrayHelper::getValue($calls, "0.id"));

        VarDumper::dump($call);
    }
}
