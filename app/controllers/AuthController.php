<?php

use App\Model\Session;

require_once APP_ROOT . '/services/AuthService.php';
require_once APP_ROOT . '/models/SessionModel.php';

class AuthController {
    protected $authService;

    public function __construct($database) {
        $this->authService = new AuthService($database);
    }

    public function signin() {
        if (is_post_request()) {
            $result = $this->authService->signIn($_POST);

            if($result == 'account not exists'){
                return view('/falure/index', ['message' => 'Tài khoảng không tồn tại']);
            }

            if($result == 'password wrong'){
                return view('/falure/index', ['message' => 'Mật khẩu không đúng']);
            }
            
            Session::setSession($result['username'], $result['role']);
            return redirect('/student/index'); 
        }
        else {
            view('auth/signin');
        }
    }

    public function signup() {
        if (is_post_request()) {
            $result = $this->authService->signUp($_POST);
            if($result == 'account already exists'){
                return view('/falure/index', ['message' => 'Tài khoảng đã tồn tại']);
            }

            return view('/success/index', ['message' => 'Tài khoảng của bạn đăng ký thành công']);
        }
        else {
            view('auth/signup');
        }
    }

    public function logout() {
        Session::closeSession();
        redirect('/auth/signin');
    }
}
