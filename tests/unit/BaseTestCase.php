<?php
namespace rvkulikov\yii2\pozvonimCom\tests\unit;

use yii\console\Application;

/**
 * Class BaseTestCase
 *
 * @package rvkulikov\yii2\pozvonimCom\tests\unit
 *
 * @author  Roman Kulikov <r.v.kulikov@yandex.ru>
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        new Application(require(__DIR__ . '/config.php'));
    }
}