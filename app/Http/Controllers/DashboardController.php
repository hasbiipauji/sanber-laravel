<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard(){
        $user = User::count();
        $book = Book::count();
        $category = Category::count();

        $game = DB::table('games')->count();

        return view('dashboard', compact('user', 'book', 'category', 'game')); 
    }

    public function welcome(){

        return view('auth.login');
    }
}
