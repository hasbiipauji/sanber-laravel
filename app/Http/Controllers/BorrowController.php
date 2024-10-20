<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\facades\Auth;


class BorrowController extends Controller
{
    public function create(Request $request, $id){
        $request->validate([
           'tanggal_peminjaman' => 'required|date',
           'tanggal_pengembalian'    => 'required|date|after:tanggal_peminjaman',
        //    'user_id'            => 'required',
        //    'book_id'            => 'required'
        ]);

        $iduser = Auth::user()->id;

        $borrow = New Borrow;
        $borrow->tanggal_peminjaman = $request->input('tanggal_peminjaman');
        $borrow->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $borrow->user_id = $iduser;
        //id dibawah yaitu dari buku yg akan dipinjam
        $borrow->book_id = $id;

        // dd($borrow);

        $borrow->save();

        return redirect()->route('books.show', $id);
    }

    public function update(){
        
    }
}
