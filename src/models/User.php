<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * ユーザ
 *
 * @property integer $id
 * @property string $name
 * @property string $mail_address
 * @property string $password
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 */

class User extends ActiveRecord
{
    const STATUS_NEW     = 'new'; // 新規ユーザ
    const STATUS_REMOVED = 'removed'; // 削除済み

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
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'mail_address'], 'string', 'max' => 256],
        ];
    }

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
