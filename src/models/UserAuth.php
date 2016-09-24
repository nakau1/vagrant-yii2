<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * ユーザ認証
 *
 * @property integer $user_id
 * @property string $password
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserAuth extends ActiveRecord
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

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