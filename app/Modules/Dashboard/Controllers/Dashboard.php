<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Select;
use App\Modules\Dashboard\Helpers\ChangePassword;
use App\Modules\Login\Helpers\RegisterProcess;
use beingnikhilesh\error\Error;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = (new Select)->select('register', ['where' => ['ref_no' => session()->get('userId')]]);
        return view('App\Modules\Dashboard\Views\Dashboard', ['user' => $data[0]]);
    }
    public function update()
    {
        (new RegisterProcess())->process(array_merge($this->request->getPost(), ['photo' => $this->request->getFile('photo')]));
        if (!Error::check_error() and (Error::get_returndata()[0] == -2)) {
            session()->setFlashdata('error_register', Error::get_returndata()[1]);
            return redirect()->to('dashboard');
        } else {
            session()->setFlashdata('Success_register', 'Your profile has been updated successfully');
            return redirect()->to('dashboard');
        }
    }
    public function password()
    {
        return view('App\Modules\Dashboard\Views\Password');
    }
    public function changePassword()
    {
        (new ChangePassword())->setPassword($this->request->getPost());
        if (!Error::check_error() and (Error::get_returndata()[0] == -2)) {
            session()->setFlashdata('error_register', Error::get_returndata()[1]);
            return redirect()->to('dashboard/password');
        } else {
            session()->setFlashdata('Success_register', 'Your Password has been updated successfully');
            return redirect()->to('dashboard');
        }
    }
}
