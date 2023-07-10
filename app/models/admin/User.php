<?php

namespace app\models\admin;

class User extends \app\models\User{
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'role' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address']
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];
    public function checkUnique(){
        $user = \R::findOne('user', "login = ? OR email = ?",[$this->attributes['login'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'This login is registered';
            }
            if($user->email = $this->attributes['email']){
                $this->errors['unique'][] = 'This email is registered';
            }
            return false;
        }
        return true;
    }
}