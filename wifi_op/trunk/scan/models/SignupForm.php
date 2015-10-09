<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message'=>'账号不能为空'],
            ['username', 'string', 'min' => 2, 'max' => 20],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','message'=>'Email不能为空'],
            ['email', 'email','message'=>'Email格式不正确'],
           ['email', 'string', 'min' => 2, 'max' => 40],

            ['password', 'required','message'=>'密码不能为空'],
            ['password', 'string', 'min' => 6, 'max' => 100],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password=md5($this->password);
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
