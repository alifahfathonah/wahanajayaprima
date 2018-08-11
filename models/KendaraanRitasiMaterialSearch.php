<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KendaraanRitasiMaterial;

/**
 * KendaraanRitasiMaterialSearch represents the model behind the search form about `app\models\KendaraanRitasiMaterial`.
 */
class KendaraanRitasiMaterialSearch extends KendaraanRitasiMaterial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kendaraan', 'id_basecamp'], 'integer'],
            [['no_polisi', 'created_by', 'created_date', 'edited_by', 'edited_date'], 'safe'],
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
        $query = KendaraanRitasiMaterial::find();

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
            'id_kendaraan' => $this->id_kendaraan,
            'id_basecamp' => $this->id_basecamp,
            'created_date' => $this->created_date,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'no_polisi', $this->no_polisi])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
