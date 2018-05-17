<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Calendar;

use App\Aduan;
use App\Modul;

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

      $rekod_aduan = Aduan::paginate(5);

      return view('aduan/template_index', compact('page_title', 'rekod_aduan'));
    }

    // Function planner untuk aduan
    public function calendar()
    {
      $page_title = 'Planner';

      # Dapatkan data aduan yang telah dibuat
      $data = Aduan::select('tarikh_report', 'masalah')->get();

      if ( count( $data ) )
      {
        foreach ( $data as $key => $value )
        {
          $events[] = Calendar::event(
            $value->masalah,
            true,
            new \DateTime('2018-05-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2018-02-17'), //end time (you can also use Carbon instead of DateTime)
            null,
            [
              'color' => '#800'
            ]
          );
        }

        $calendar = Calendar::addEvents($events);
      }

      return view('themes/'.env('APP_THEME'). '/aduan/template_calendar', compact('page_title', 'calendar'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $page_title = 'Tambah Rekod Aduan';
      # Dapatkan data dari table modul untuk select box modul
      $modul = Modul::pluck('nama', 'id');
      # Beri respon paparkan template add aduan dan passkan variable $page_title dan $modul
      return view('aduan/template_add', compact('page_title', 'modul') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validasi data
        $request->validate([
          'masalah' => 'required|min:3'
        ]);

        # Dapatkan SEMUA data daripada borang
        $data = $request->all();
        # Masukkan data tambahan
        $data['user_id'] = Auth::user()->id;
        $data['tarikh_report'] = date('Y-m-d');
        $data['status'] = 'PENDING';

        # Simpan data ke dalam table aduan
        Aduan::create($data);

        # Bagi respon redirect ke halaman senarai aduan
        return redirect()->route('aduan.index')->with('mesej-sukses', 'Aduan berjaya dihantar');
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
      # Dapatkan rekod aduan berdasarkan ID
      # Nota: Penggunaan find() hanya untuk carian ID
      $aduan = Aduan::find($id);
      # Dapatkan senarai modul
      $modul = Modul::pluck('nama','id');
      # Tetapkan tajuk halaman
      $page_title = 'Edit Rekod Aduan';
      # Paparkan borang template edit untuk aduan
      return view('aduan/template_edit', compact('page_title', 'aduan', 'modul') );
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
      # Validasi data
      $request->validate([
        'masalah' => 'required'
      ]);

      # Dapatkan SEMUA data daripada borang
      $data = $request->all();

      # Dapatkan rekod aduan yang ingin dikemaskini dan Simpan data kemaskini ke dalam table aduan
      $aduan = Aduan::find($id);
      $aduan->update($data);

      # Bagi respon redirect ke halaman senarai aduan
      return redirect()->route('aduan.index')->with('mesej-sukses', 'Aduan berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      # Dapatkan rekod aduan yang ingin dikemaskini dan hapuskan dari table aduan
      $aduan = Aduan::find($id);
      $aduan->delete();

      # Bagi respon redirect ke halaman senarai aduan
      return redirect()->route('aduan.index')->with('mesej-sukses', 'Aduan berjaya dihapuskan');
    }
}
