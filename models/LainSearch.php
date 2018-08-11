<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lain;

/**
 * LainSearch represents the model behind the search form about `app\models\Lain`.
 */
class LainSearch extends Lain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lain', 'id_proyek', 'jumlah', 'harga_satuan', 'harga_total'], 'integer'],
            [['nama_barang', 'created_by', 'created_date', 'edited_by', 'edited_date'], 'safe'],
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
        $query = Lain::find();

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
            'id_lain' => $this->id_lain,
            'id_proyek' => $this->id_proyek,
            'jumlah' => $this->jumlah,
            'harga_satuan' => $this->harga_satuan,
            'harga_total' => $this->harga_total,
            'created_date' => $this->created_date,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
