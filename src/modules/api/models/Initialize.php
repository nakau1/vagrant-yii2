<?php

namespace app\modules\api\models;

use app\models\AuthPolletUser;
use app\models\PolletUser;
use app\models\PushNotificationToken;
use Yii;
use yii\base\Model;

/**
 * Class Initialize
 * @package app\modules\api\v1\models
 **/
class Initialize extends Model
{
//    const TOKEN_LIFETIME = 2592000; // 3600*24*30
//
//    const PLATFORM_ANDROID = 'android';
//    const PLATFORM_IOS     = 'ios';
//
//    public $polletId;
//    public $uuid;
//    public $platform;
//    public $device_token;
//
//    private $_user = false;
//
//    /**
//     * @return array the validation rules.
//     */
//    public function rules()
//    {
//        return [
//            [
//                ['platform', 'uuid'],
//                'required',
//                'message' => '{attribute} は必須です',
//            ],
//            [['platform'], 'in', 'range' => [self::PLATFORM_ANDROID, self::PLATFORM_IOS]],
//            [['device_token'], 'string'],
//        ];
//    }
//
//
//    /**
//     * @inheritdoc
//     */
//    public function attributeLabels()
//    {
//        return [
//            'polletId'     => 'ユーザー識別ID',
//            'uuid'         => 'UUID',
//            'platform'     => 'プラットフォーム',
//            'device_token' => 'push通知用トークン',
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function formName()
//    {
//        return '';
//    }
//
//    /**
//     * 新規にPolletユーザーを作成してIDをを発行する
//     * @return PolletUser
//     * @throws \Exception
//     */
//    public function createPolletUser()
//    {
//        $transaction = Yii::$app->db->beginTransaction();
//
//        try {
//            // ユーザー作成
//            $user = new PolletUser();
//            $user->registration_status = PolletUser::STATUS_NEW_USER;
//            $user->user_code_secret = self::generateSecretToken();
//            if (!$user->save()) {
//                throw new \Exception('failed create user.');
//            }
//            // トークン等保存
//            if ($this->device_token) {
//                $token = new PushNotificationToken();
//                $token->pollet_user_id = $user->id;
//                $token->device_id = $this->uuid;
//                $token->token = $this->device_token;
//                $token->platform = $this->platform;
//                if (!$token->save()) {
//                    throw new \Exception('failed save token.');
//                }
//            }
//            $transaction->commit();
//
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            return false;
//
//        }
//
//        return $user;
//    }
//
//    /**
//     * 登録済みのトークンを更新する
//     * @return bool
//     */
//    public function updateDeviceToken()
//    {
//        $user = $this->getUser();
//        /** @var PushNotificationToken $token */
//        $token = PushNotificationToken::find()->where([
//            'pollet_user_id' => $user->id,
//            'device_id'      => $this->uuid,
//        ])->one();
//
//        if ($token) {
//            if ($token->token == $this->device_token) {
//                return true;
//            } else {
//                // 登録済みのトークンとは違う場合更新する
//                $token->token = $this->device_token;
//            }
//        } else {
//            // 未登録は追加
//            $token = new PushNotificationToken();
//            $token->pollet_user_id = $user->id;
//            $token->device_id = $this->uuid;
//            $token->token = $this->device_token;
//            $token->platform = $this->platform;
//        }
//
//        return $token->save();
//    }
//
//    /**
//     * Finds user by [[polletId]]
//     * @return PolletUser|null
//     */
//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = AuthPolletUser::findByCodeSecret($this->polletId);
//        }
//
//        return $this->_user;
//    }
//
//    /**
//     * アプリ内に保存用のトークンを生成する
//     * @return string
//     */
//    public static function generateSecretToken()
//    {
//        return Yii::$app->security->generateRandomString() . '_' . time();
//    }
}