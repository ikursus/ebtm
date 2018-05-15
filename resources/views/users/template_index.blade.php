@extends('layouts/app')

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
        <a class="btn btn-sm btn-info" href="/users/{{ $orang->id }}/edit">Edit</a>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach

  </tbody>

</table>

{!! $rekod_users->links() !!}

</div>
</div>
</div>
</div>
</div>
@endsection
