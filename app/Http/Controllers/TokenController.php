<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function confirm($token)
    {
    	$user = User::whereToken($token);
    	return $user;
    }
}
