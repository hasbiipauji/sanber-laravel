<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function game(){
        $games = DB::table('games')->get();
        return view('game.index', compact('games'));
    }

    public function create(){
        return view('game.create');
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name'      => 'required|string|max:45',
            'gameplay'  => 'required|string',
            'developer' => 'required|string|max:45',
            'year'      => 'required|integer|between:1900,2100' 
        ]);
        DB::table('games')->insert([
            "name" => $request['name'],
            "gameplay" => $request['gameplay'],
            "developer" => $request['developer'],
            "year" => $request['year']
        ]);
        return redirect()->route('game')->with('success', 'Game berhasil ditambahkan');   
    }

    public function show($id){
        $game = DB::table('games')->find($id);
        // dd($game);
        return view('game.show', compact('game'));
    }

    public function edit($id){
        $game = DB::table('games')->find($id);
        // dd($game);
        return view('game.edit', compact('game'));   
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'name'      => 'required|string|max:45',
            'gameplay'  => 'required|string',
            'developer' => 'required|string|max:45',
            'year'      => 'required|integer|between:1900,2100' 
        ]);
        DB::table('games')->update([
            "name" => $request['name'],
            "gameplay" => $request['gameplay'],
            "developer" => $request['developer'],
            "year" => $request['year']
        ]);
        return redirect()->route('game')->with('success', 'Game Berhasil diubah');
    }

    public function delete($id){
        DB::table('games')->where('id', '=', $id)->delete();
        return redirect()->route('game')->with('success', 'Game berhasil dihapus');
    }
}
