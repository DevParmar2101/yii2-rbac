<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $status;
    public $confirm_password;
    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['status','last_name'], 'safe'],
            ['role', 'safe'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['id','integer'],
            [['password'], 'required'],
            [['confirm_password'], 'required','on' => 'admin-create'],
            [['confirm_password'], 'required','on' => 'user-create'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password','on' => 'admin-create'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength'],'max'=>30],
        ];
    }

    public function setUserSignup()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new \common\models\User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if ($user->save()) {
            if(isset($this->role) && $this->role!=""){
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole($this->role);
                $auth->assign($authorRole, $user->primaryKey);
            }
            return true;
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'status'=>'Is Active?'
        ];
    }

    public static function getList()
    {
        return [
            'admin' => 'Administator',
            'user' => 'User'
        ];
    }
}
