<?php

namespace App\Modules\Login\Helpers;

use App\Helpers\Select;
use App\Models\OpenSSL;
use beingnikhilesh\error\Error;

class LoginProcess
{
    public function process(array $params = []): mixed
    {
        # Chacke if params is empty
        if (empty($params))
            return Error::set_error('Invalid or No Data provide');
        #  Actual Login Process
        return $this->_login($params);
    }

    /** Actual Login Process */
    private function _login($params): mixed
    {
        # Load the Required Libraries, Instances, etc.
        $user = (new Select())->select('register', ['where' => ['email' => $params['username_email']], 'orWhere' => ['username' => $params['username_email']]]);
        # Verify inputs
        if (empty($user) or isset($user[1]))
            return Error::set_error('Invalid credentials');
        # Encrypt user Password
        $password = (new OpenSSL())->encrypt($params['password']);
        # Verify password 
        if ($password === $user[0]['password']) {
            session()->set('isLoggedIn', true);
            session()->set('userId', $user[0]['ref_no']);
            return True;
        }
        Error::set_error('Invalid credentials');
        return false;
    }
}
