<?php

namespace app\models;

/**
 * ユーザ認証
 *
 * @property integer $user_id
 * @property string $password
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserAuth extends CommonActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'string', 'max' => 20],
        ];
    }
}