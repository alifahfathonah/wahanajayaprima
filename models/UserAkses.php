<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_akses".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_menu
 */
class UserAkses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_akses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_menu'], 'required'],
            [['id_user', 'id_menu'], 'integer']
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
            'id_menu' => 'Id Menu',
        ];
    }
}
