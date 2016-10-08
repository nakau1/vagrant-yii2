<?php

namespace app\models\traits;

use Yii;
use yii\base\Model;

trait IdentificationTrait
{
    public function makeIdentification()
    {
        return strtoupper(Yii::$app->security->generateRandomString(32). md5(time()));
    }
}
