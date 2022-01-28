<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserChannel;

/**
 * UserChannelSearch represents the model behind the search form of `common\models\UserChannel`.
 */
class UserChannelSearch extends UserChannel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel_id', 'user_id', 'channel_category', 'channel_sub_category'], 'integer'],
            [['channel_name', 'channel_bio'], 'safe'],
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
        $query = UserChannel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'channel_id' => $this->channel_id,
            'user_id' => $this->user_id,
            'channel_category' => $this->channel_category,
            'channel_sub_category' => $this->channel_sub_category,
        ]);

        $query->andFilterWhere(['like', 'channel_name', $this->channel_name])
            ->andFilterWhere(['like', 'channel_bio', $this->channel_bio]);

        return $dataProvider;
    }
}
