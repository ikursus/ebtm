@extends('themes/adminlte/layouts/master')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">{!! $page_title !!}</div>

<div class="card-body">

@include('layouts/alerts')

<p>
  <a class="btn btn-primary" href="/users/add">Tambah User</a>
</p>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Telefon</th>
      <th>Tindakan</th>
    </tr>
  </thead>
  <tbody>

    @foreach ( $rekod_users as $orang )
    <tr>
      <td>{{ $orang->nama }}</td>
      <td>{{ $orang->email }}</td>
      <td>{{ $orang->no_telefon }}</td>
      <td>
        <a class="btn btn-sm btn-primary" href="{{ route('users.aduan', ['id' => $orang->id]) }}">Lihat Aduan</a>
        <a class="btn btn-sm btn-info" href="/users/{{ $orang->id }}/edit">Edit</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $orang->id }}">
  Delete
</button>

<form method="POST" action="{{ route('users.destroy', ['id' => $orang->id]) }}">
  @csrf
  <input type="hidden" name="_method" value="DELETE">

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{ $orang->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  <li>ID: {{ $orang->id }}</li>
  <li>Nama: {{ $orang->nama }}</li>
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

      </td>
    </tr>
    @endforeach

  </tbody>

</table>

{!! $rekod_users->links() !!}

<p>Jumlah Users: {{ $rekod_users->total() }} pengguna.</p>

</div>
</div>
</div>
</div>
</div>
@endsection
