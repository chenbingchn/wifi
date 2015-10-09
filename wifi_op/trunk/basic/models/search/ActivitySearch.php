<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `app\Models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'namezh', 'nameyn', 'title', 'titlezh', 'titleyn', 'content', 'contentzh', 'contentyn'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Activity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'namezh', $this->namezh])
            ->andFilterWhere(['like', 'nameyn', $this->nameyn])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titlezh', $this->titlezh])
            ->andFilterWhere(['like', 'titleyn', $this->titleyn])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'contentzh', $this->contentzh])
            ->andFilterWhere(['like', 'contentyn', $this->contentyn]);

        return $dataProvider;
    }
}
