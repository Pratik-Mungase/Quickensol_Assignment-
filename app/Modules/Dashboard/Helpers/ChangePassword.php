<?php

namespace App\Modules\Dashboard\Helpers;

use App\Helpers\Select;
use App\Models\OpenSSL;
use beingnikhilesh\error\Error;

class ChangePassword
{
    # Globle variables 
    private $ref_no;
    private $params = [];
    public function setPassword($params = [])
    {
        # Chacke empty
        if (empty($params))
            Error::set_error('Invalid or no data provided.');
        # set params globale
        $this->params = $params;
        # verify all inputs
        $this->validateInputs();
        # Update
        $this->_update($params);
    }

    /** Private function to validate all inputs */
    private function validateInputs()
    {
        # Encrypt current password
        $current_password = (new OpenSSL())->encrypt($this->params['current_password']);
        # get old Password
        $oldPassword = (new Select())->select('register', ['where' => ['ref_no' => session()->get('userId')]]);
        if (empty($oldPassword) or $oldPassword[0]['password'] != $current_password)
            return Error::set_error('The old password does not match.');
        # set reference_no
        $this->ref_no = $oldPassword[0]['ref_no'];
        # Validate password fild
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $this->params['new_password']))
            return Error::set_error('Invalid new password provided. Please provide a stronger password.');
        # Validate Confirm password fild
        if ($this->params['new_password'] != $this->params['confirm_password'])
            return Error::set_error('Password does not match the confirm password field.');
        $this->params['new_password'] =  (new OpenSSL())->encrypt($this->params['new_password']);
    }

    /** Private function to initiate database query */
    private function _update()
    {
        if (!Error::check_error())
            return;
        # Declare the required Variables
        $db = \Config\Database::connect();
        # Start the Transaction
        transBegin($db);
        # Update the data (if available)
        $db->table('register')->set('password', $this->params['new_password'])->where('ref_no', $this->ref_no)->update();
        # Commit or Rollback as required
        if ($db->transStatus() === false) {
            transRollback($db);
            return Error::set_error('An error occurred while processing the password change.');
        } else {
            transCommit($db);
            return Error::set_successmessage('Password change was successful.');
        }
    }
}
