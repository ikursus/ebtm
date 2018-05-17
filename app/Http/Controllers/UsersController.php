<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

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
      # Query ke table users (Dapatkan SEMUA rekod)
      // $rekod_users = DB::table('users')->get();
      # Query ke table users (Dapatkan rekod pagination)
      # $rekod_users = DB::table('users')->paginate(2);
      # Query ke table dan pilih column2 tertentu
      $rekod_users = DB::table('users')
      ->select('id', 'nama', 'email', 'no_telefon')
      ->orderBy('id', 'desc')
      //->whereIn('role', ['admin', 'student'])
      ->paginate(3);
      // $rekod_users = User::select('id', 'nama', 'email', 'no_telefon')
      // ->orderBy('id', 'desc')
      // //->whereIn('role', ['admin', 'student'])
      // ->paginate(3);

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
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'no_kp' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/|unique:users,no_kp',
        'password' => 'required|min:3'
      ]);

      # Dapatkan semua data dari borang
      // $data = $request->all();
      # Dapatkan nama dan emeel
      // $data = $request->only('nama', 'email');
      # Dapatkan nama dan emeel
      $data = $request->except('_token', 'uid');
      # Simpan data ke dalam database
      DB::table('users')->insert($data);
      //
      return redirect('/users')->with('mesej-sukses', 'Rekod berjaya di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aduan($id)
    {
        # Dapatkan maklumat user
        //$user = User::find($id);
        $user = DB::table('users')->where('id', '=', $id)->first();

        # Dapatkan maklumat aduan user
        $rekod_aduan = DB::table('users') // atau guna model User::join()
        ->join('aduan', 'users.id', '=', 'aduan.user_id')
        ->where('users.id', '=', $id)
        ->select('users.*', 'aduan.id as aduan_id', 'aduan.masalah', 'aduan.status', 'aduan.tarikh_report')
        ->paginate(10);

        return view('users/template_aduan', compact('page_title', 'user', 'rekod_aduan') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      # Dapatkan data user berdasarkan ID
      $user = DB::table('users')->where('id', '=', $id)->first();
      # Tetapkan title halaman edit
      $page_title = 'Edit Rekod User - ' . $user->nama;
      # Bagi respon paparkan template edit user beserta passkan variable $page_title dan $user
      return view('users/template_edit', compact('page_title', 'user') );
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
      # Validation borang
      $request->validate([
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:users,email,' . $id,
        'no_kp' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/|unique:users,no_kp,' . $id
      ]);

      # Dapatkan data daripada borang
      $data = $request->except('_token', '_method', 'uid', 'password');

      # Semak jika wujud data untuk password? Jika ada, encrypt dan attach kepada array $data
      if ( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      # Update data ke dalam database berdasarkan ID yang dibekalkan
      DB::table('users')->where('id', '=', $id)->update($data);

      # Bagi respon
      return redirect()->route('users.index')->with('mesej-sukses', 'Rekod berjaya dikemaskini!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      # Dapatkan data user berdasarkan ID dan delete rekodnya
      // DB::table('users')->where('id', '=', $id)->delete();
      $user = DB::table('users')->where('id', '=', $id)->first();

      # Sekiranya bukan ADMIN, baru delete rekod
      if ( $user->role != 'ADMIN' )
      {
        DB::table('users')->where('id', '=', $id)->delete();
        # Bagi respon kembali ke halaman senarai users
        return redirect()->route('users.index')->with('mesej-sukses', 'Rekod berjaya dihapuskan!');
      }

      # Bagi respon kembali ke halaman senarai users
      return redirect()->route('users.index')->with('mesej-error', 'Anda tidak boleh menghapuskan ADMIN!');
    }
}
