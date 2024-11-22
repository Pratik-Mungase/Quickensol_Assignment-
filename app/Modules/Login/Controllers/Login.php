<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Helpers\LoginProcess;
use App\Modules\Login\Helpers\RegisterProcess;
use beingnikhilesh\error\Error;

class Login extends BaseController
{
    # Index function to start 
    public function index()
    {
        return view('App\Modules\Login\Views\login');  // 1)Pm@123  2)Test@123
    }
    # Logout function
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function register()
    {
        return view('App\Modules\Login\Views\register');  // 1)Pm@123  2)Test@123
    }
    # Public function to process Register
    public function processRegister()
    {
        (new RegisterProcess())->process(array_merge($this->request->getPost(), ['photo' => $this->request->getFile('photo')]));
        if (!Error::check_error() and (Error::get_returndata()[0] == -2)) {
            session()->setFlashdata('error_register', Error::get_returndata()[1]);
            return redirect()->to('/login/register');
        } else {
            session()->setFlashdata('Success_register', Error::get_returndata()[1]);
            return redirect()->to('/login/register');
        }
    }
    # Public function to process Login
    public function process()
    {
        if ((new LoginProcess)->process($this->request->getPost()))
            return redirect()->to('/dashboard');
        session()->setFlashdata('error_login', Error::get_returndata()[1]);
        return redirect()->to('/');
    }
}
