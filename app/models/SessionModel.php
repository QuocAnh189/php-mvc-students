<?php namespace App\Model;

class Session {
    public static function setSession($username, $role)
    {
        session_start();
        $_SESSION['valid'] = $username;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
    }
    
    public static function closeSession()
    {
        session_start();
        session_destroy();
    }

    public static function isAdmin()
    {
        return $_SESSION['role'] === 'admin';
    }
}
?>