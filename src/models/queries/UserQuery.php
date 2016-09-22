<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * Class UserQuery
 * @package app\models
 * @see User
 */
class UserQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return PolletUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PolletUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
