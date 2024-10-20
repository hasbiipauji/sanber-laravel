<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //untuk autentikasi user yang login
        $iduser = Auth::id();
        //ambil data dari model Profile dan hubungkan dengan $iduser yg berasal dari tabel users
        $detailProfile = Profile::where('user_id', $iduser)->first();
        // dd($detailProfile);
        return view('profile.index', compact('detailProfile')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        // dd($request->all());
        $request->validate([
            'bio'       => 'required',
            'age'       => 'required|min:1|max:110',
            'user_id'   => 'exists:users,id'
        ]);

        $profile->bio = $request->input('bio');
        $profile->age = $request->input('age');

        $profile->update();
        // dd($profile);
        return redirect()->route('profiles.index')->with('success', 'profile berhasil diedit');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
