<?php

class LoginForm {
    public $username;
    public $password;
    public $errors = [];
    
    const SALT = '__salted';
    
    public function __construct($post_data) {
        $this->username = htmlspecialchars($post_data['username']);
        $this->password = htmlspecialchars($post_data['password']);
    }

    public function verifyPassword($verify_string, $password)
    {
      $hashed_pass = md5($verify_string) . self::SALT;
      return $hashed_pass === $password . self::SALT;
    }
}
