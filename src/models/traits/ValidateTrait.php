<?php

namespace app\models\traits;

use yii\base\Model;

trait ValidateTrait
{
    /**
     * @return Model
     */
    abstract protected function getModel();

    /**
     * メールアドレスのバリデーション(RFC非準拠な緩いチェック)
     * @param $attribute
     * @return bool
     */
    public function validateLaxEmail($attribute)
    {
        $model = $this->getModel();

        // ここでは必須チェックは行わない
        if (!isset($model->email) || $model->email == '') {
            return true;
        }

        if (!preg_match("/^[\w\.\-]+@[\w\.\-]+\.\w+$/", $model->email)) {
            $model->addError($attribute, '無効なメールアドレスです');
            return false;
        }
        return true;
    }
}
