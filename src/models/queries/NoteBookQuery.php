<?php

namespace app\models\queries;

use Yii;
use app\models\NoteBook;
use app\models\User;
use yii\db\ActiveQuery;

/**
 * Class NoteBookQuery
 * @package app\models\queries
 */
class NoteBookQuery extends ActiveQuery
{
    public function mine()
    {
        return $this->andWhere([
            NoteBook::tableName() . '.user_id' => Yii::$app->user->id,
        ]);
    }

    /**
     * @param $parentNoteBookID integer|null
     * @return $this
     */
    public function childOf($parentNoteBookID)
    {
        return $this->andWhere([
            NoteBook::tableName() . '.parent_identification' => $parentNoteBookID,
        ]);
    }

    /**
     * @inheritdoc
     * @return NoteBook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NoteBook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
