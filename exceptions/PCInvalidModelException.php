<?php
namespace bigland\base\exceptions;

use rvkulikov\yii2\pozvonimCom\exceptions\PCBaseException;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Class InvalidModelException
 *
 * @package bigland\base\exceptions
 *
 * @author  Roman Kulikov <flinnraider@yandex.ru>
 */
class PCInvalidModelException extends PCBaseException
{

    /** @var Model */
    public $model;

    /**
     * Constructor.
     *
     * @param Model      $model
     * @param string     $message  error message
     * @param integer    $code     error code
     * @param \Exception $previous The previous exception used for the exception chaining.
     */
    public function __construct(Model $model, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->model = $model;
        $message     = $message ?: $this->getDefaultMessage();
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getDefaultMessage()
    {
        return "Model {$this->model->className()} is invalid: " . VarDumper::dumpAsString($this->model->getErrors());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "Model is invalid";
    }

}