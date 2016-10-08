<?php

namespace app\models;

use app\models\queries\NoteQuery;

/**
 * Class Note
 * @package app\models
 *
 * @property integer $id
 * @property integer $note_book_id
 * @property string $identification
 * @property string $title
 * @property integer $sort_no
 * @property integer $created_at
 * @property integer $updated_at
 */
class Note extends CommonActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['note_book_id'], 'required'],
            [['note_book_id', 'sort_no', 'created_at', 'updated_at'], 'integer'],
            [['identification', 'title'], 'string', 'max' => 256],
            [['identification'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'note_book_id'   => 'ノートブックID',
            'identification' => '識別文字列',
            'title'          => 'タイトル',
            'sort_no'        => 'ソート番号',
            'created_at'     => '作成日時',
            'updated_at'     => '更新日時',
        ];
    }

    /**
     * @return NoteQuery
     */
    public static function find()
    {
        return new NoteQuery(get_called_class());
    }
}
