<?php

namespace app\models;


use Yii;
use yii\base\Model;
use app\models\traits\ValidateTrait;

/**
 * ログインフォーム用モデル
 * @package app\models
 */
class LoginForm extends Model
{
    use ValidateTrait;

    public $email;
    public $password;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'validateLaxEmail'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'email' => 'メールアドレス',
        ];
    }

    /***
     * required implementation of ValidateTrait
     * @return $this
     */
    protected function getModel()
    {
        return $this;
    }
}
