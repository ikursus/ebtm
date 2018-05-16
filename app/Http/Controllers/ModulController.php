<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Dapatkan rekod modul dari table modul
        $rekod_modul = DB::table('modul')->paginate(10);
        # Beri respon paparkan template senarai modul
        return view('modul.template_index', compact('rekod_modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Tetapkan tajuk halaman
        $page_title = 'Tambah Modul';
        # Paparkan halaman tambah rekod modul baru
        return view('modul.template_add', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validasi borang
        $request->validate([
          'nama' => 'required'
        ]);
        # Dapatkan data nama dari borang dan attach ke dalam array $data
        $data['nama'] = $request->input('nama');
        # Simpan data ke dalam table modul
        DB::table('modul')->insert($data);
        # Beri respon redirect ke halaman senarai modul beserta mesej sukses
        return redirect()->route('modul.index')->with('mesej-sukses', 'Rekod berjaya ditambah!');
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
        # Dapatkan rekod modul berdasarkan ID
        $modul = DB::table('modul')->where('id', $id)->first();
        # Paparkan borang template edit modul dan passkan variable $modul kepada template
        return view('modul.template_edit', compact('modul') );
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
      # Validasi borang
      $request->validate([
        'nama' => 'required'
      ]);
      # Dapatkan data nama dari borang dan attach ke dalam array $data
      $data['nama'] = $request->input('nama');
      # Simpan kemaskini data ke dalam table modul
      DB::table('modul')->where('id', $id)->update($data);
      # Beri respon redirect ke halaman senarai modul beserta mesej sukses
      return redirect()->route('modul.index')->with('mesej-sukses', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      # Dapatkan rekod modul berdasarkan ID dan hapuskan ia
      DB::table('modul')->where('id', $id)->delete();
      # Beri respon redirect ke halaman senarai modul beserta mesej sukses
      return redirect()->route('modul.index')->with('mesej-sukses', 'Rekod berjaya dihapuskan!');
    }
}
