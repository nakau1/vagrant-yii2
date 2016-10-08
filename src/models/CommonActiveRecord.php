<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class CommonActiveRecord
 * @package app\models
 */
abstract class CommonActiveRecord extends ActiveRecord
{
    const COLUMN_SORT_NUMBER = 'sort_no';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }

    /**
     * @param array $andWhere
     * @param string $column
     * @return int
     */
    public function newSortNumber($andWhere = [], $column = self::COLUMN_SORT_NUMBER)
    {
        $ret = 1;
        $record = self::find()->andWhere($andWhere)
            ->orderBy([
                self::tableName() . '.'. $column => SORT_DESC,
            ])->one();

        if ($record && $record->$column) {
            $ret = (int)$record->$column + 1;
        }

        return $ret;
    }

    /**
     * @return string
     */
    public function makeIdentification()
    {
        return strtoupper(Yii::$app->security->generateRandomString(32). md5(time()));
    }
}