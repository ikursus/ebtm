@extends('layouts/app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">{!! $page_title !!}</div>

<div class="card-body">

<p>
  <a class="btn btn-primary" href="/aduan/add">Tambah Aduan</a>
</p>

@if ( count( $rekod_aduan ) )
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>MODUL</th>
      <th>MASALAH</th>
      <th>TARIKH REPORT</th>
      <th>STATUS</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>
  <tbody>

    @foreach ( $rekod_aduan as $item )
    <tr>
      <td>{{ $item->tableModul->nama }}</td>
      <td>{{ $item->masalah }}</td>
      <td>{{ $item->tarikh_report }}</td>
      <td>{{ $item->status }}</td>
      <td>
        <a class="btn btn-sm btn-info" href="{{ route('aduan.edit', ['id' => $item->id]) }}">Edit</a>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach

  </tbody>

</table>
@else
<div class="alert alert-info">
  Tiada rekod
</div>
@endif

</div>
</div>
</div>
</div>
</div>
@endsection
