<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DataTables;

use App\Modul;
use App\Aduan;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Senarai Modul';
        # Dapatkan rekod modul dari table modul
        # $rekod_modul = DB::table('modul')->paginate(10);
        // $rekod_modul = Modul::paginate(10);
        # Beri respon paparkan template senarai modul
        return view('modul.template_index', compact('page_title'));
    }
    /**
     * Datatables.
     */
    public function datatables()
    {
        # Dapatkan rekod dari table modul
        $query = Modul::select('id', 'nama');
        # Bagi respon ke datatables
        return DataTables::of($query)
        ->addColumn('tindakan', function ($item) {

          return '

          <a class="btn btn-sm btn-primary" href="'. route('modul.aduan', ['id' => $item->id]) .'">Lihat Aduan</a>
          <a class="btn btn-sm btn-info" href="'. route('modul.edit', ['id' => $item->id]) .'">Edit</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-'. $item->id .'">
  Delete
</button>

<form method="POST" action="'. route('modul.destroy', ['id' => $item->id]) .'">
  ' . csrf_field() . '
  <input type="hidden" name="_method" value="DELETE">

<!-- Modal -->
<div class="modal fade" id="modal-delete-'. $item->id .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<p>Adakah anda bersetuju untuk menghapuskan rekod berikut:</p>
<ul>
  <li>ID: '. $item->id .'</li>
  <li>Nama: ' . $item->nama .'</li>
</ul>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
<button type="submit" class="btn btn-danger">Sah Hapus</button>
</div>
</div>
</div>
</div>
</form>

          ';

        })
        ->rawColumns(['tindakan'])
        ->make(true);
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
    public function aduan($id)
    {
        # Dapatkan rekod modul berdasarkan ID
        $modul = Modul::find($id);
        # Kaedah 1
        # Cari rekod aduan berdasarkan ID modul
        // $rekod_aduan = Aduan::where('modul', '=', $id)->paginate(10);

        # Bagi respon paparkan template senaria aduan bagi modul ID yang terlibat
        // return view('modul/template_aduan', compact('modul', 'rekod_aduan'));
        return view('modul/template_aduan', compact('modul'));


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
        // $modul = DB::table('modul')->where('id', $id)->first();
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
