<?php

namespace app\models\queries;

use yii\db\ActiveQuery;

/**
 * Class UserQuery
 * @package app\models\queries
 * @see User
 */
class UserQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return array|UserQuery[]
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserQuery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
