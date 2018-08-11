<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kendaraan_ritasi_material".
 *
 * @property integer $id_kendaraan
 * @property string $no_polisi
 * @property integer $id_basecamp
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class KendaraanRitasiMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kendaraan_ritasi_material';
    }

	public function beforeSave($insert)
    {
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
    public function rules()
    {
        return [
            [['no_polisi', 'id_proyek'], 'required'],
            [['id_basecamp'], 'integer'],
            [['created_date', 'edited_date'], 'safe'],
            [['no_polisi', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kendaraan' => 'Id Kendaraan',
            'no_polisi' => 'No Polisi',
            'id_basecamp' => 'Lokasi',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
