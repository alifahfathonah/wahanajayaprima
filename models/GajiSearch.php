<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gaji;

/**
 * GajiSearch represents the model behind the search form about `app\models\Gaji`.
 */
class GajiSearch extends Gaji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gaji', 'id_proyek', 'jam_lembur', 'uang_lembur', 'gaji_lembur', 'uang_makan', 'gaji_harian', 'total_gaji'], 'integer'],
            [['nama', 'created_by', 'created_date', 'edited_by', 'edited_date'], 'safe'],
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
        $query = Gaji::find();

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
            'id_gaji' => $this->id_gaji,
            'id_proyek' => $this->id_proyek,
            'jam_lembur' => $this->jam_lembur,
            'uang_lembur' => $this->uang_lembur,
            'gaji_lembur' => $this->gaji_lembur,
            'uang_makan' => $this->uang_makan,
            'gaji_harian' => $this->gaji_harian,
            'total_gaji' => $this->total_gaji,
            'created_date' => $this->created_date,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
