<?php
namespace rvkulikov\yii2\pozvonimCom\traits;

use yii\base\Arrayable;
use yii\helpers\ArrayHelper;

/**
 * Trait ParamsSignerTrait
 *
 * @package rvkulikov\yii2\pozvonimCom\traits
 *
 * @author  Roman Kulikov <flinnraider@yandex.ru>
 */
trait ParamsSignerTrait
{
    /**
     * @param string               $userId
     * @param string               $token
     * @param array|Arrayable|null $params
     *
     * @return array
     */
    public function getSignedParams($userId, $token, $params = null)
    {
        $unsignedParams = $params instanceof Arrayable
            ? $params->toArray()
            : (array)$params;

        $unsignedParams['uid'] = $userId;

        ksort($unsignedParams);

        $signedParams = ArrayHelper::merge($unsignedParams, [
            'sign' => md5($token . http_build_query($unsignedParams))
        ]);

        return $signedParams;
    }
}