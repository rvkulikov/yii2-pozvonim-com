<?php
namespace rvkulikov\yii2\pozvonimCom;

use rvkulikov\yii2\pozvonimCom\modules\PCApiCalls;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

/**
 * Class PCClient
 *
 * @package rvkulikov\yii2\pozvonimCom
 *
 * @author  Roman Kulikov <r.v.kulikov@yandex.ru>
 */
class PCClient extends Component
{
    /**
     * @var integer
     */
    public $userId;

    /**
     * @var integer
     */
    public $siteId;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var string
     */
    public $baseUrl = 'http://api.pozvonim.com/v2u';

    /**
     * @var string
     */
    private $token;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var PCApiCalls
     */
    private $calls;

    /**
     * @return string
     */
    public function getToken()
    {
        if (!$this->token) {
            $request  = $this->getHttpClient()->get('auth/token', [
                'uid'  => $this->userId,
                'sign' => md5("{$this->apiKey}uid={$this->userId}"),
            ]);
            $response = $request->send();

            $this->token = ArrayHelper::getValue($response->data, 'token');
        }

        return $this->token;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client([
                'baseUrl' => $this->baseUrl
            ]);
        }

        return $this->httpClient;
    }

    /**
     * @return PCApiCalls
     */
    public function getCalls()
    {
        if (!$this->calls) {
            $this->calls = new PCApiCalls([
                'userId'     => $this->userId,
                'siteId'     => $this->siteId,
                'token'      => $this->getToken(),
                'httpClient' => $this->getHttpClient()
            ]);
        }

        return $this->calls;
    }
}