<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends AuthenticateController	
{
    public function app(){
    	return view('welcome');
    }
}
