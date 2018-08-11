<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengumuman;

/**
 * PengumumanSearch represents the model behind the search form about `app\models\Pengumuman`.
 */
class PengumumanSearch extends Pengumuman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengumuman'], 'integer'],
            [['tgl_pengumuman', 'judul_pengumuman', 'isi_pengumuman', 'created_by', 'created_date', 'edited_by', 'edited_date'], 'safe'],
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
        $query = Pengumuman::find();

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
            'id_pengumuman' => $this->id_pengumuman,
            'tgl_pengumuman' => $this->tgl_pengumuman,
            'created_date' => $this->created_date,
            'edited_date' => $this->edited_date,
        ]);

        $query->andFilterWhere(['like', 'judul_pengumuman', $this->judul_pengumuman])
            ->andFilterWhere(['like', 'isi_pengumuman', $this->isi_pengumuman])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
