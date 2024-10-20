<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    // __construct disini dipakai sebagai auth
    public function __construct()
    {   
        //autentikasi semua function kecuali index dan show
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // di bawah untuk relasi dengan database categories, agar bisa dipanggil saat kita mau menambahkan item
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:4096',
            'stock' => 'required|digits_between:1,4',
            // ambil data dari tabel categories, dengan field id
            'category_id' => 'exists:categories,id',
        ]);
        
        // untuk menyimpan file yg di upload
        // untuk mengubah nama file yg di upload
        
        $fileNameImage = time().'_'.uniqid().'.'.$request->image->extension();
        //untuk menympan filenya ke folder public
        $request->image->move(public_path('img'), $fileNameImage);


        //ambil data dari model Book
        $books = new Book;
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->image = $fileNameImage;
        $books->stock = $request->input('stock');
        $books->category_id = $request->input('category_id');

        $books->save();
        return redirect()->route('books.index')->with('success', $books->title.' berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {   
        // pakai route ::resource tidak perlu id yg ditangkap, laravel otomatis bisa membaca hal tsb, langsung return saja mau kemana
        // $books = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // relasi db dari tabel categories
        $categories = Category::all();
        return view('books.edit', compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:4096',
            'stock' => 'required|digits_between:1,4',
            // ambil data dari tabel categories, dengan field id
            'category_id' => 'exists:categories,id',
        ]);

        // exists disini untuk cek apakah file lama ada di penyimpanannya atau tidak
        if ($request->has('image') && File::exists(public_path('img/'. $book->image))) {
            File::delete(public_path('img/'. $book->image));

            $fileNameImage = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $fileNameImage);
            $book->image = $fileNameImage;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');

        $book->update();
        return redirect()->route('books.index')->with('success', 'Buku Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->image && File::exists(public_path('img/'. $book->image))){
            File::delete(public_path('img/'. $book->image));
        }
    
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku '.$book->title.' berhasil dihapus');
    }
}
