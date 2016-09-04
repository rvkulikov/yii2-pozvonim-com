<?php
namespace rvkulikov\yii2\pozvonimCom\modules;

use rvkulikov\yii2\pozvonimCom\exceptions\PCBaseException;
use rvkulikov\yii2\pozvonimCom\traits\ParamsSignerTrait;
use yii\base\Component;
use yii\httpclient\Client;
use yii\httpclient\Response;

/**
 * Class PCApiBase
 *
 * @package rvkulikov\yii2\pozvonimCom\modules
 *
 * @author  Roman Kulikov <r.v.kulikov@yandex.ru>
 */
class PCApiBase extends Component
{
    use ParamsSignerTrait;

    /**
     * @var string
     */
    public $userId;
    /**
     * @var string
     */
    public $siteId;
    /**
     * @var string
     */
    public $token;
    /**
     * @var Client
     */
    public $httpClient;

    /**
     * @param Response $response
     *
     * @throws PCBaseException
     */
    protected function handleError(Response $response)
    {
        $exception = new PCBaseException(); // todo
        throw $exception;
    }
}