<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $page_title = 'Senarai Aduan';

      $rekod_aduan = [
        ['id' => 1, 'user_id' => 1, 'masalah' => 'Contoh Masalah 1', 'tarikh_report' => date('Y-m-d'), 'status' => 'Baru'],
        ['id' => 2, 'user_id' => 2, 'masalah' => 'Contoh Masalah 2', 'tarikh_report' => date('Y-m-d'), 'status' => 'Baru']
      ];

      return view('aduan/template_index', compact('page_title', 'rekod_aduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $page_title = 'Tambah Rekod Aduan';

      return view('aduan/template_add', compact('page_title') );
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
      $page_title = 'Edit Rekod Aduan - ' . $id;

      return view('aduan/template_edit', compact('page_title') );
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
