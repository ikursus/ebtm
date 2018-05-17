@extends('layouts/app')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection


@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">{!! $page_title or "" !!}</div>

<div class="card-body">

@include('layouts/alerts')

<p>
  <a class="btn btn-primary" href="{{ route('modul.create') }}">Tambah Modul</a>
</p>

<table class="table table-bordered table-hover" id="modul-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Tindakan</th>
    </tr>
  </thead>

</table>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
$(function() {
    $('#modul-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('modul.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'tindakan', name: 'tindakan', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection
