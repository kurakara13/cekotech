<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class KeluarController extends Controller
{
	
	public function keluar()
	{
		Auth::logout();
		return redirect()->route('login');
	}

}
