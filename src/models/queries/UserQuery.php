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
     * @return UserQuery[]
     */
    public function all($db = null)
    {
        /** @var $ret UserQuery[] */
        $ret = parent::all($db);
        return $ret;
    }

    /**
     * @inheritdoc
     * @return UserQuery|null
     */
    public function one($db = null)
    {
        /** @var $ret UserQuery|null */
        $ret = parent::one($db);
        return $ret;
    }
}
