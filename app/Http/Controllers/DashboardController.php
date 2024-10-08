<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('home'); 
    }

    public function welcome(Request $request){
        $data = $request->all();

        return view('welcome', compact('data'));
    }
}
