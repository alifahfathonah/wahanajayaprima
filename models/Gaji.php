<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gaji".
 *
 * @property integer $id_gaji
 * @property integer $id_proyek
 * @property string $nama
 * @property integer $jam_lembur
 * @property integer $uang_lembur
 * @property integer $gaji_lembur
 * @property integer $uang_makan
 * @property integer $gaji_harian
 * @property integer $total_gaji
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class Gaji extends \yii\db\ActiveRecord
{
	public $tahun, $bulan, $b;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gaji';
    }
	
	public function beforeSave($insert)
    {
		$this->gaji_lembur = $this->jam_lembur * $this->uang_lembur;
		$this->total_gaji = $this->gaji_lembur + $this->uang_makan + $this->gaji_harian;
		
		if (parent::beforeSave($insert)) {			
			if($insert)
			{
				$this->status = 0;
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
            [['id_proyek', 'nama', 'jam_lembur', 'uang_lembur',  'uang_makan', 'gaji_harian'], 'required'],
            [['id_proyek', 'jam_lembur', 'uang_lembur', 'gaji_lembur', 'uang_makan', 'gaji_harian', 'total_gaji', 'status'], 'integer'],
            [['created_date', 'edited_date'], 'safe'],
            [['nama', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gaji' => 'Id Gaji',
            'id_proyek' => 'Id Proyek',
            'nama' => 'Nama',
            'jam_lembur' => 'Jam Lembur',
            'uang_lembur' => 'Uang Lembur',
            'gaji_lembur' => 'Gaji Lembur',
            'uang_makan' => 'Uang Makan',
            'gaji_harian' => 'Gaji Harian',
            'total_gaji' => 'Total Gaji',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
