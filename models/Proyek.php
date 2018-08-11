<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyek".
 *
 * @property integer $id
 * @property integer $id_basecamp
 * @property string $nama_proyek
 * @property string $created_by
 * @property string $created_date
 * @property integer $edited_by
 * @property string $edited_date
 */
class Proyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyek';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['edited_by'], 'integer'],
            [['created_date', 'tipe', 'edited_date', 'tanggal_kontrak', 'paket', 'satker', 'provinsi', 'masa_pelaksanaan', 'sisa_hari', 'nomor_kontrak', 'penawar'], 'safe'],
            [['nama_proyek', 'created_by', 'kepala_basecamp', 'nama_basecamp', 'pemilik', 'nama_lokasi'], 'string', 'max' => 100]
        ];
    }
	
	public function beforeSave($insert)
    {
		if($this->tanggal_kontrak)
		{
			$this->tanggal_kontrak = date('Y-m-d', strtotime($this->tanggal_kontrak));
		}
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
          
			'basecamp_search'=>'Basecamp',
            'nama_proyek' => 'Nama Proyek',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
