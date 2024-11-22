<?php

namespace App\Modules\Login\Helpers;

use App\Helpers\Select;
use App\Models\OpenSSL;
# github library
use beingnikhilesh\error\Error;
use Exception;

class RegisterProcess
{
    # Globle variables 
    private $isUpdate = false;
    private $params = [];
    public function Process(array $params = [])
    {
        # Chacke empty
        if (empty($params))
            return Error::set_error('Invalid or No Data provided');
        # The provide a Ref_no, indicating that it is update data
        if (!empty($params['ref_no']))
            $this->isUpdate = true;
        # Set params 
        $this->params = $params;
        # Validate All inputs
        $this->validateInputs();
        # Chacke Errors
        if (!Error::check_error())
            return;
        # Upload img and insert 
        // if ($this->params['photo'] && $this->params['photo']->isValid())
        $this->UploadImg();
        $this->_insert($this->insertData());
    }

    /** Private function to validate all inputs */
    private function validateInputs()
    {
        $oldUsername = '';
        if ($this->isUpdate) {
            # get old data
            $oldUsername = (new Select())->select('register', ['where' => ['ref_no' => $this->params['ref_no']]]);
            if ($this->params['ref_no'] !=  $oldUsername[0]['ref_no'])
                return Error::set_error('Reference number does not match');
        }
        if (!$this->isUpdate) {
            $oldUsername = (new Select())->select('register', ['where' => ['username' => $this->params['username']]]);
            #  Validate that the username is unique and does not already exist.
            if (!empty($oldUsername) or isset($oldUsername[0]['id']))
                return Error::set_error('Username already exists.');

            $oldEmail = (new Select())->select('register', ['where' => ['email' => $this->params['email']]]);
            #  Validate that the username is unique and does not already exist.
            if (!empty($oldEmail) or isset($oldEmail[0]['id']))
                return Error::set_error('Email already exists.');
            # Validate password 
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $this->params['password']))
                return Error::set_error('Invalid password Provide, Please Provide Strong Password');
            # Validate Confirm password fild
            if ($this->params['password'] != $this->params['confirm_password'])
                return Error::set_error('Password does not match the confirm password field.');
        }
        # Validate username
        if (!preg_match('/^[a-zA-Z0-9_@#$]+$/', $this->params['username']))
            return Error::set_error('Invalid username provided. Only the characters _, @, #, and $ are allowed');

        # Validate Email
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $this->params['email']))
            return Error::set_error('Invalide Email Provided');
    }

    /** Private function to Upload image */
    private function UploadImg()
    {
        try {
            if ($this->params['photo'] && $this->params['photo']->isValid() && !$this->params['photo']->hasMoved()) {
                // Move the file to the uploads directory
                $this->params['photo']->move(ROOTPATH . 'public\Uploads\\', $customName = rand(111, 999) . time() . '.' . $this->params['photo']->getExtension());
                // Get the new file name and set it in params
                $this->params['photo'] = $this->params['photo']->getName();
                return true;
            }
            unset($this->params['photo']);
            return false;
        } catch (Exception $e) {
            Error::set_error('Profile photo not Uploded');
            return false;
        }
    }


    /** Private function to create insert data */
    private function insertData()
    {
        # Unset confirm password field
        if (!empty($this->params['confirm_password']))
            unset($this->params['confirm_password']);

        if (!$this->isUpdate) {
            # Encrypt the Password use of openssl
            $this->params['password'] = (new OpenSSl())->encrypt($this->params['password']);

            # Set Unique Reference Number
            $this->params['ref_no'] = rand(121, 991) . time();

            # Set Date Time
            $this->params['created'] = date('d-m-Y H:i:s');
        }
        $this->params['edited'] = date('d-m-Y H:i:s');
    }
    /** Private function to initiate database query */
    private function _insert()
    {
        if (!Error::check_error())
            return;
        # Declare the required Variables
        $db = \Config\Database::connect();
        # Start the Transaction
        transBegin($db);
        # Insert and Update the data (if available)
        if ($this->isUpdate)
            $db->table('register')->where('ref_no', $this->params['ref_no'])->update($this->params);
        else
            $db->table('register')->insert($this->params);
        # Commit or Rollback as required
        if ($db->transStatus() === false) {
            transRollback($db);
            return Error::set_error('Some error occured while Process the Register');
        } else {
            transCommit($db);
            return Error::set_successmessage('You are Register Successful.');
        }
    }
}
