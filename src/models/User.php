<?php

namespace app\models;

use app\models\queries\UserQuery;
use yii\base\NotSupportedException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * ユーザ
 *
 * @property integer $id
 * @property string $user_token ユーザ識別文字列
 * @property string $screen_name スクリーン名
 * @property string $name 名前
 * @property string $email メールアドレス
 * @property string $status ステータス
 * @property string $role 権限
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserAuth $auth
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_ACTIVE  = 'active';
    const STATUS_REMOVED = 'removed'; // 削除済み

    const ROLE_MEMBER = 'member';        // 一般会員
    const ROLE_ADMIN  = 'administrator'; // 管理者

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
            [['password', 'email'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        $ret = new UserQuery(get_called_class());
        $ret->where([
            '!=',
            self::tableName() . '.status',
            self::STATUS_REMOVED,
        ]);
        return $ret;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find()->andWhere([
            self::tableName() . '.id' => $id,
        ])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->id == $authKey;
    }

    /**
     * パスワードのバリデーション
     * @param $password string パスワード
     * @return bool 現在のユーザと一致するかどうか
     */
    public function validatePassword($password)
    {
        return $this->auth->password === $password;
    }

    /**
     * @return ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(UserAuth::className(), ['user_id' => 'id']);
    }
}