<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sharedwifipage;

/**
 * SharedwifipageSearch represents the model behind the search form about `app\models\Sharedwifipage`.
 */
class SharedwifipageSearch extends Sharedwifipage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['create_user', 'header_EN', 'header_Ind', 'title_EN', 'title_Ind', 'content_EN', 'content_Ind', 'pic_url'], 'safe'],
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
        $query = Sharedwifipage::find();

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
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'create_user', $this->create_user])
            ->andFilterWhere(['like', 'header_EN', $this->header_EN])
            ->andFilterWhere(['like', 'header_Ind', $this->header_Ind])
            ->andFilterWhere(['like', 'title_EN', $this->title_EN])
            ->andFilterWhere(['like', 'title_Ind', $this->title_Ind])
            ->andFilterWhere(['like', 'content_EN', $this->content_EN])
            ->andFilterWhere(['like', 'content_Ind', $this->content_Ind])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url]);

        return $dataProvider;
    }
}
