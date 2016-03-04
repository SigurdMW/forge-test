<?php

namespace App\Providers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\ServiceProvider;



class AuthHeaderProvider extends ServiceProvider
{

    protected $token;
   


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //return $this->setHeader($this->token);
    }

    
    private function setHeader($token = ""){
        header('Authorization: Bearer '.$token);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
