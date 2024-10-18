<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['category', 'show']);
    }

    public function category(){
        // $categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        DB::table('categories')->insert([
            "name" => $request['name']
        ]);
        return redirect()->route('category')->with('success', 'Kategori '. $request['name'] .' Berhasil ditambahkan');
    }

    public function show($id){
        $category = Category::find($id);
        // dd($category);
        return view('category.show', compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);

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
            
        return redirect()->route('category')->with('success', 'Kategori berhasil diedit');
    }

    public function delete($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('category')->with('success', 'Kategori berhasil dihapus');
    }
}
