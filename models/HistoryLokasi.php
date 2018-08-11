<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history_lokasi".
 *
 * @property integer $id
 * @property integer $tanggal
 * @property integer $id_lokasi
 * @property integer $tipe
 */
class HistoryLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_lokasi', 'tipe'], 'required'],
            [['tanggal', 'id_lokasi', 'tipe'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'id_lokasi' => 'Lokasi',
            'tipe' => 'Tipe',
        ];
    }
}
