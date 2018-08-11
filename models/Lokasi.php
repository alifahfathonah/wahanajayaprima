<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lokasi".
 *
 * @property integer $id
 * @property string $nama_lokasi
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class Lokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lokasi';
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
            [['nama_lokasi'], 'required'],
			[['nama_lokasi'], 'unique'],
            [['created_date', 'edited_date'], 'safe'],
            [['nama_lokasi', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lokasi' => 'Nama Lokasi',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
