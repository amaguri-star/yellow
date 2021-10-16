<?php

namespace App\Traits;

trait AuthenticatesUsers
{ 
    use ThrottlesLogins;
    
    public function username()
    {
        return 'email';
    }

}
