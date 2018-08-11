<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengumuman".
 *
 * @property integer $id_pengumuman
 * @property string $tgl_pengumuman
 * @property string $judul_pengumuman
 * @property string $isi_pengumuman
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class Pengumuman extends \yii\db\ActiveRecord
{
	public $prev;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengumuman';
    }
	
	public function beforeSave($insert)
    {
		if (parent::beforeSave($insert)) {						
			if($insert)
			{	
				$this->tgl_pengumuman = date('Y-m-d h:i:s');		
				$this->created_by = Yii::$app->user->identity->username;
				$this->created_date = date('Y-m-d h:i:s');
				$this->edited_by = Yii::$app->user->identity->username;														
				$this->edited_date = date('Y-m-d h:i:s');
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
            [['judul_pengumuman'], 'required'],
            [['tgl_pengumuman', 'created_date', 'edited_date'], 'safe'],
            [['isi_pengumuman'], 'string'],
            [['judul_pengumuman', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengumuman' => 'Id Pemberitahuan',
			'prev'=>'Pemberitahuan Saat Ini',
            'tgl_pengumuman' => 'Tgl Pemberitahuan',
            'judul_pengumuman' => 'Isi Pemberitahuan',
            'isi_pengumuman' => 'Isi Pemberitahuan',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
