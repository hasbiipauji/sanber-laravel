<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function category(){
        $categories = DB::table('categories')->get();
        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $query = DB::table('categories')->insert([
            "name" => $request['name']
        ]);
        return redirect()->route('category');
    }

    public function show($id){
        $category = DB::table('categories')->find($id);
        // dd($category);
        return view('category.show', compact('category'));
    }

    public function edit($id){
        $category = DB::table('categories')->find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);
            
        return redirect()->route('category');
    }

    public function delete($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('category');
    }
}
