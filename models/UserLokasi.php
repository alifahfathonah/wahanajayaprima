<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_lokasi".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_lokasi
 * @property string $tipe_lokasi
 */
class UserLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_lokasi', 'tipe_lokasi'], 'required'],
            [['id_user', 'id_lokasi'], 'integer'],
            [['tipe_lokasi'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_lokasi' => 'Id Lokasi',
            'tipe_lokasi' => 'Tipe Lokasi',
        ];
    }
}
