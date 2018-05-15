<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $page_title = 'Senarai Users';

      $rekod_users = [
        ['id' => 1, 'nama' => 'Ali', 'emel' => 'Ali@gmail.com', 'telefon' => '0123456789'],
        ['id' => 2, 'nama' => 'Abu', 'emel' => 'Abu@gmail.com', 'telefon' => '0123456779'],
        ['id' => 3, 'nama' => 'Ahmad', 'emel' => 'Ahmad@gmail.com', 'telefon' => '0123456989']
      ];

      return view('users/template_index', compact('page_title', 'rekod_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Rekod User';

        return view('users/template_add', compact('page_title') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      # Validation laravel 5.4 kebawah
      //$this->validate($request, []);
      # Validation Laravel 5.5 ke atas
      $request->validate([
        'nama' => 'required|min:3|alpha',
        'email' => 'required|email',
        'no_kp' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/'
      ]);

      # Dapatkan semua data dari borang
      // $data = $request->all();
      # Dapatkan nama dan emeel
      // $data = $request->only('nama', 'email');
      # Dapatkan nama dan emeel
      $data = $request->except('nama');
      # Bagi respon
      return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $page_title = 'Edit Rekod User - ' . $id;

      return view('users/template_edit', compact('page_title') );
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
