<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; //mentioning auth
use App\Models\User; //mentioning user table

class HomeController extends Controller
{
    public function redirect() //creating redirect function
    {

    	if(Auth::id()) //checking if there is an auth id
    	{
    		if(Auth::user()->usertype=='0') //usertype='0' for regular user and usertype='1' for admin
    		{
    			return view('user.home'); //return to user view
    		}
    		else 
    		{
    			return view('admin.home'); //return to admin view
    		}



    	}
    	else 
    	{
    		return redirect()->back();
    	}



    }
    public function index()
    {
    	return view('user.home');
    }
}
