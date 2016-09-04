<?php
namespace rvkulikov\yii2\pozvonimCom\modules\contacts;

use yii\base\Model;

/**
 * Class GetCallsOptions
 *
 * @package rvkulikov\yii2\pozvonimCom\modules\contacts
 *
 * @author  Roman Kulikov <flinnraider@yandex.ru>
 */
class GetCallsOptions extends Model
{
    /**
     * @var string Y-m-d H:i:s format
     */
    public $startAt;

    /**
     * @var string Y-m-d H:i:s format
     */
    public $endAt;

    /**
     * @var integer[]
     */
    public $ids;

    /**
     * @var integer[]
     */
    public $statusIds;

    /**
     * @var integer[]
     */
    public $siteIds;

    /**
     * @var string
     */
    public $clientPhone;

    /**
     * @var string
     */
    public $managerPhone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //@formatter:off
        return [
            ['startAt', 'string'],
            [  'endAt', 'string'],

            [      'ids', 'each', 'rule' => ['integer']],
            ['statusIds', 'each', 'rule' => ['integer']],
            [  'siteIds', 'each', 'rule' => ['integer']],

            [ 'clientPhone', 'string'],
            ['managerPhone', 'string'],
        ];
        //@formatter:on
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'start_at'   => 'startAt',
            'end_at'     => 'endAt',
            'ids'        => 'ids',
            'status_ids' => 'statusIds',
            'sites_ids'  => 'siteIds',
            'client'     => 'clientPhone',
            'manager'    => 'managerPhone',
        ];
    }
}