<?php

namespace app\models\searches;

use app\models\queries\NoteBookQuery;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NoteBook;

/**
 * NoteBookSearch represents the model behind the search form about `app\models\NoteBook`.
 */
class NoteBookSearch extends NoteBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'sort_no', 'created_at', 'updated_at'], 'integer'],
            [['identification', 'name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param $query NoteBookQuery
     * @param $params array $params
     * @return ActiveDataProvider
     */
    public function search($query, $params)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'parent_identification' => $this->parent_identification,
            'sort_no' => $this->sort_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'identification', $this->identification])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
