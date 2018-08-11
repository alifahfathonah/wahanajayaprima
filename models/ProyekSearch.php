<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyek;

/**
 * ProyekSearch represents the model behind the search form about `app\models\Proyek`.
 */
class ProyekSearch extends Proyek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'edited_by'], 'integer'],
            [['nama_proyek', 'created_by', 'basecamp_search', 'created_date', 'edited_date'], 'safe'],
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
        $query = Proyek::find();
		

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		
        $query->andFilterWhere([
            'id' => $this->id,
           
            'created_date' => $this->created_date,
            'edited_by' => $this->edited_by,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'nama_proyek', $this->nama_proyek])
		
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
