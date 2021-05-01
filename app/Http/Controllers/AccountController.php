<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AccountController extends Controller
{
    public function index(){
        $accounts = DB::table('account')->get();
        return view('accounts', ['accounts'=>$accounts]);

    }
}
