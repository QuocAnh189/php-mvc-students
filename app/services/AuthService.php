<?php

use Respect\Validation\Validator as v;

class AuthService {
    protected $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function signIn($data) {
        v::key('username', v::notEmpty()->length(1, 20))
            ->key('password', v::notEmpty()->regex('/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s:])/'))
            ->assert($data);

        $user = $this->database->get('users', '*', ['username' => $data['username']]);

        if(!$user) {
            return 'account not exists';
        }
        
        if ($user) {
            if (password_verify($data['password'], $user['password'])) {
                return $user; 
            } else {
                return 'password wrong';
            }
        }
    }

    public function signUp($data) {
        v::key('username', v::notEmpty()->length(1, 20))
            ->key('password', v::notEmpty()->regex('/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s:])/'))
            ->key('role', v::notEmpty()->in(['admin', 'user']))
            ->assert($data);

        $user = $this->database->get('users', '*', ['username' => $data['username']]);
        
        if($user){
            return 'account already exists';
        }
        
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        return $this->database->insert('users', [
            'username' => $data['username'],
            'password' => $hashedPassword,
            'role' => $data['role']
        ]);
    }
}

?>