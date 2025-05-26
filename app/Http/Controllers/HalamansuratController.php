<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamansuratController extends Controller
{
    public function Halamansurat()
    {
        return view('Halamansurat');
    }

 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect('/')->with('status', 'Oke data kamu sedang diproses, tunggu konfirmasi dari pihak setempat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
