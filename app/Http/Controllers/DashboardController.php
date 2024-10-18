<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('dashboard'); 
    }

    public function welcome(){

        return view('auth.login');
    }
}
