<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $created_by
 * @property string $created_date
 * @property string $edited_by
 * @property string $edited_date
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
	public $auth_key;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
	
	public function beforeSave($insert)
    {
		$this->status = 'Aktif';
		
		if (parent::beforeSave($insert)) {			
			if($insert)
			{				
				$this->created_by = Yii::$app->user->identity->username;
				$this->password = md5($this->password);
				$this->created_date = date('Y-m-d h:i:s');
			}
			else{
				$this->edited_by = Yii::$app->user->identity->username;				
				
				if(!empty($this->password))
				{
					$this->password = md5($this->password);
				}
				else
				{
					$model = Users::findOne($this->id);
					if($model)
					{
						$this->password=$model->password;
					}
				}
				
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
            [['username', 'nama', 'role'], 'required'],			
            [['id'], 'integer'],
			[['password'], 'required', 'on' => 'insert'],
			[['username'], 'unique'],
            [['created_date', 'edited_date'], 'safe'],
            [['username', 'password', 'created_by', 'edited_by', 'status', 'hp'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
			'nama'=>'Nama',
			'role'=>'Jabatan',
			'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'edited_by' => 'Edited By',
            'edited_date' => 'Edited Date',
        ];
    }
	
	    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
/* modified */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
 
/* removed
    public static function findIdentityByAccessToken($token)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
*/
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
}
