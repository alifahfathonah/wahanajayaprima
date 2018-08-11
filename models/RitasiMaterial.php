<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ritasi_material".
 *
 * @property integer $id_ritasi
 * @property integer $id_kendaraan
 * @property integer $asal
 * @property integer $tujuan
 * @property string $tanggal
 * @property integer $jam_berangkat
 * @property integer $menit_berangkat
 * @property string $material
 * @property string $ukuran
 * @property string $satuan
 * @property string $keterangan_berangkat
 * @property integer $jam_tiba
 * @property integer $menit_tiba
 * @property integer $jarak
 * @property string $keterangan_tiba
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class RitasiMaterial extends \yii\db\ActiveRecord
{
	public $no_polisi, $nama_basecamp, $nama_proyek, $bulan, $b, $tahun;	
	
	public function beforeSave($insert)
    {
		
		if (parent::beforeSave($insert)) {			
			if($insert)
			{
				$this->tanggal = date('Y-m-d');
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
        return 'ritasi_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kendaraan', 'asal', 'tujuan', 'jam_berangkat', 'menit_berangkat', 'material', 'ukuran', 'satuan', 'keterangan_berangkat'], 'required'],
            [['id_kendaraan', 'asal', 'tujuan', 'jam_berangkat', 'menit_berangkat', 'jam_tiba', 'menit_tiba', 'jarak'], 'integer'],
            [['tanggal', 'created_date', 'edited_date'], 'safe'],
            [['keterangan_berangkat', 'keterangan_tiba'], 'string'],
            [['material', 'ukuran', 'satuan', 'created_by', 'edited_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ritasi' => 'Id Ritasi',
            'id_kendaraan' => 'Id Kendaraan',
            'asal' => 'Asal',
            'tujuan' => 'Tujuan',
            'tanggal' => 'Tanggal',
            'jam_berangkat' => 'Jam Berangkat',
            'menit_berangkat' => 'Menit Berangkat',
            'material' => 'Material',
            'ukuran' => 'Ukuran',
            'satuan' => 'Satuan',
            'keterangan_berangkat' => 'Keterangan Berangkat',
            'jam_tiba' => 'Jam Tiba',
            'menit_tiba' => 'Menit Tiba',
            'jarak' => 'Jarak',
            'keterangan_tiba' => 'Keterangan Tiba',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
}
