<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;
use app\models\traits\ValidateTrait;

/**
 * サインインフォーム用モデル
 * @package app\models\forms
 */
class SignInForm extends Model
{
    use ValidateTrait;

    public $email;
    public $password;
    public $remember = true;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'validateLaxEmail'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'remember' => 'サインインを持続する',
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

    public function signIn()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::find()->andWhere([
            'mail_address' => $this->email,
        ])->one();
        if (!$user) {
            $this->addError('email', 'ユーザが見つかりません');
            return false;
        }



        return true;
    }
}
