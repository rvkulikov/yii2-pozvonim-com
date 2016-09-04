<?php
namespace rvkulikov\yii2\pozvonimCom\modules;

use bigland\base\exceptions\PCInvalidModelException;
use rvkulikov\yii2\pozvonimCom\modules\contacts\GetCallsOptions;

/**
 * Class PCApiCalls
 *
 * @package rvkulikov\yii2\pozvonimCom\modules
 *
 * @author  Roman Kulikov <flinnraider@yandex.ru>
 */
class PCApiCalls extends PCApiBase
{
    /**
     * @param GetCallsOptions|null $options
     *
     * @return mixed
     * @throws PCInvalidModelException
     */
    public function getCalls(GetCallsOptions $options = null)
    {
        if($this->siteId){
            $options->siteIds = $options->siteIds ?: [$this->siteId];
        }

        if(!$options->validate()){
            throw new PCInvalidModelException($options);
        }

        $params   = $this->getSignedParams($this->userId, $this->token, $options);
        $request  = $this->httpClient->get('calls', $params);
        $response = $request->send();

        if (!$response->isOk) {
            $this->handleError($response);
        }

        return $response->data;
    }

    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function getCall($id)
    {
        $params   = $this->getSignedParams($this->userId, $this->token);
        $request  = $this->httpClient->get("calls/{$id}", $params);
        $response = $request->send();

        if (!$response->isOk) {
            $this->handleError($response);
        }

        return $response->data;
    }
}