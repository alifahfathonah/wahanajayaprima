<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RitasiMaterial;

/**
 * RitasiMaterialSearch represents the model behind the search form about `app\models\RitasiMaterial`.
 */
class RitasiMaterialSearch extends RitasiMaterial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ritasi', 'id_kendaraan', 'asal', 'tujuan', 'jam_berangkat', 'menit_berangkat', 'jam_tiba', 'menit_tiba', 'jarak'], 'integer'],
            [['tanggal', 'material', 'ukuran', 'satuan', 'keterangan_berangkat', 'keterangan_tiba', 'created_by', 'created_date', 'edited_by', 'edited_date'], 'safe'],
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
        $query = RitasiMaterial::find();

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
            'id_ritasi' => $this->id_ritasi,
            'id_kendaraan' => $this->id_kendaraan,
            'asal' => $this->asal,
            'tujuan' => $this->tujuan,
            'tanggal' => $this->tanggal,
            'jam_berangkat' => $this->jam_berangkat,
            'menit_berangkat' => $this->menit_berangkat,
            'jam_tiba' => $this->jam_tiba,
            'menit_tiba' => $this->menit_tiba,
            'jarak' => $this->jarak,
            'created_date' => $this->created_date,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'ukuran', $this->ukuran])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'keterangan_berangkat', $this->keterangan_berangkat])
            ->andFilterWhere(['like', 'keterangan_tiba', $this->keterangan_tiba])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
