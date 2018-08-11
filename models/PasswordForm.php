<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

class PasswordForm extends Model{
	public $oldpass;
	public $newpass;
	public $repeatnewpass;
   
	public function rules(){
		return [
			[['oldpass','newpass','repeatnewpass'],'required'],
			['oldpass','findPasswords'],
			['repeatnewpass','compare','compareAttribute'=>'newpass', 'message'=>'Confirm and New Password must match'],
		];
	}
   
	public function findPasswords($attribute, $params){
		$user = Users::find()->where([
			'username'=>Yii::$app->user->identity->username
		])->one();
		$password = ($user->password);
		if($password!=md5($this->oldpass))
			$this->addError($attribute,'Invalid Old Password');
	}
   
	public function attributeLabels(){
		return [
			'oldpass'=>'Old Password',
			'newpass'=>'New Password',
			'repeatnewpass'=>'Confirm Password',
		];
	}
} 

?>