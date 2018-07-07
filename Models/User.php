<?php

/**
 * File defining Models\User
 *
 * PHP Version 5.6
 *
 * @author    Vo Van Toan
 * @link      https://github.com/vantoanitus/tikihometest.git
 */

namespace Models;

class User 
{
    protected $user_id;
    protected $user_name;
    protected $user_email;

    public function __construct($name, $email)
    {
        $this->user_id    = 1; // This is dummy user_id 
		$this->user_name  = $name;
		$this->user_email = $email;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUserName()
    {
        return $this->user_name;
    }

    public function getUserEmail()
    {
        return $this->user_email;
    }

}

