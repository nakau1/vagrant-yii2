<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\traits\ValidateTrait;

/**
 * サインインフォーム用モデル
 * @package app\models\forms
 */
class SignInForm extends Model

{
    const REMEMBER_DURATION = 2592000; // 30日間

    use ValidateTrait;

    public $email;
    public $password;
    public $remember = true;

    /** @var User */
    private $user = null;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'validateLaxEmail'],
            ['password', 'validatePassword'],
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
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->remember ? self::REMEMBER_DURATION : 0);
        }
        return false;
    }

    public function getUser()
    {
        if (is_null($this->user)) {
            $this->user = User::find()->andWhere([
                User::tableName() . '.email' => $this->email,
            ])->one();
        }
        return $this->user;
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'メールアドレスとパスワードが一致しません');
            }
        }
    }
}
