<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lain".
 *
 * @property integer $id_lain
 * @property integer $id_proyek
 * @property string $nama_barang
 * @property integer $jumlah
 * @property integer $harga_satuan
 * @property integer $harga_total
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class Lain extends \yii\db\ActiveRecord
{
	public $tahun, $bulan, $b;
	
	public function beforeSave($insert)
    {
		$this->harga_total = $this->jumlah * $this->harga_satuan;
		
		if (parent::beforeSave($insert)) {			
			if($insert)
			{
				$this->created_by = Yii::$app->user->identity->username;
				$this->created_date = date('Y-m-d h:i:s');
			}
			else{
				$this->edited_by = Yii::$app->user->identity->username;	
				$this->edited_date = date('Y-m-d h:i:s');
			}
			return true;
		} else {
			return false;
		}
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyek', 'nama_barang', 'jumlah', 'harga_satuan'], 'required'],
            [['id_proyek', 'jumlah', 'harga_satuan', 'harga_total'], 'integer'],
            [['created_date', 'edited_date'], 'safe'],
            [['nama_barang', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lain' => 'Id Lain',
            'id_proyek' => 'Id Proyek',
            'nama_barang' => 'Nama Barang',
            'jumlah' => 'Jumlah',
            'harga_satuan' => 'Harga Satuan',
            'harga_total' => 'Harga Total',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
