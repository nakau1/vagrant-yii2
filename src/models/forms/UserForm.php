<?php

namespace app\models\forms;

use app\models\User;

/**
 *
 * @package app\models\forms
 */
class UserForm extends User
{
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [

        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'password' => 'パスワード',
        ]);
    }
}
