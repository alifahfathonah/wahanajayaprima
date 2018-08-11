<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basecamp".
 *
 * @property integer $id
 * @property string $nama_basecamp
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class Basecamp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basecamp';
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
            [['nama_basecamp'], 'required'],
			[['nama_basecamp'], 'unique'],
            [['created_date', 'pemilik', 'nama_lokasi', 'kepala_basecamp', 'provinsi', 'edited_date'], 'safe'],
            [['nama_basecamp', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_basecamp' => 'Nama Basecamp',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
