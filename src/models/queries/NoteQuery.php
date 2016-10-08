<?php

namespace app\models\queries;

use app\models\Note;
use yii\db\ActiveQuery;

/**
 * Class NoteQuery
 * @package app\models\queries
 */
class NoteQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Note[]
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Note|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
