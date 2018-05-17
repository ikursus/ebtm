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
      <td>
        @if( count( $item->tableModul ) )
        {{ $item->tableModul->nama }}
        @endif
      </td>
      <td>{{ $item->masalah }}</td>
      <td>{{ $item->tarikh_report }}</td>
      <td>{{ $item->status }}</td>
      <td>
        <a class="btn btn-sm btn-info" href="{{ route('aduan.edit', ['id' => $item->id]) }}">Edit</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
          Delete
        </button>

        <form method="POST" action="{{ route('aduan.destroy', ['id' => $item->id]) }}">
          @csrf
          <input type="hidden" name="_method" value="DELETE">

        <!-- Modal -->
        <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          @if ( count( $item->tableModul ) )
          <li>MODUL: {{ $item->tableModul->nama }}</li>
          @endif
          <li>MASALAH: {{ $item->masalah }}</li>
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
