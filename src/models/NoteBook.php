<?php

namespace app\models;

use app\models\queries\NoteBookQuery;
use app\models\traits\IdentificationTrait;
use yii\db\ActiveQuery;

/**
 * Class NoteBook
 * @package app\models
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $parent_identification
 * @property string $identification
 * @property string $name
 * @property integer $sort_no
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property NoteBook $parentNoteBook
 * @property NoteBook[] $childNoteBooks
 * @property Note[] $notes
 */
class NoteBook extends CommonActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sort_no', 'created_at', 'updated_at'], 'integer'],
            [['identification', 'name'], 'string', 'max' => 256],
            [['identification'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                    => 'ID',
            'user_id'               => '所有ユーザID',
            'parent_identification' => '親ノートブックID',
            'identification'        => '識別文字列',
            'name'                  => 'ノートブック名',
            'sort_no'               => 'ソート番号',
            'created_at'            => '作成日時',
            'updated_at'            => '更新日時',
        ];
    }

    /**
     * @return NoteBookQuery
     */
    public static function find()
    {
        return new NoteBookQuery(get_called_class());
    }

    /**
     * @return ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['note_book_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getChildNoteBooks()
    {
        return $this->hasMany(NoteBook::className(), ['parent_identification' => 'identification']);
    }

    /**
     * @return ActiveQuery
     */
    public function getParentNoteBook()
    {
        return $this->hasOne(NoteBook::className(), ['identification' => 'parent_identification']);
    }

    /**
     * @param bool $runValidation
     * @param null $attributeNames
     * @return bool
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->isNewRecord) {
            $this->identification = $this->makeIdentification();
            $this->sort_no = $this->newSortNumber([
                NoteBook::tableName(). '.parent_identification' => $this->parent_identification,
            ]);
        }
        return parent::save($runValidation, $attributeNames);
    }
}