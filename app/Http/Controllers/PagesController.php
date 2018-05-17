<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function dashboard()
    {
      $page_title = '<h1>Halaman Dashboard</h1>';

      $content = [
        ['nama' => 'Ali', 'emel' => 'Ali@gmail.com', 'telefon' => '0123456789'],
        ['nama' => 'Abu', 'emel' => 'Abu@gmail.com', 'telefon' => '0123456779'],
        ['nama' => 'Ahmad', 'emel' => 'Ahmad@gmail.com', 'telefon' => '0123456989']
      ];

      return view('template_dashboard', compact('page_title', 'content'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        return view('themes/' . env('APP_THEME') . '/guest/homepage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
