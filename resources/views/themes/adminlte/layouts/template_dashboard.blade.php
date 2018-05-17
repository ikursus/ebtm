@extends('themes/adminlte/layouts/master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
{{ $page_title }}
<small>Selamat Datang {{ Auth::user()->nama }}</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Summary</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
title="Collapse">
<i class="fa fa-minus"></i></button>
<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
<i class="fa fa-times"></i></button>
</div>
</div>
<div class="box-body">

@include('layouts/alerts')

<p>
  <img src="/images/user.png" alt="Gambar" class="img-fluid">
</p>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Telefon</th>
    </tr>
  </thead>
  <tbody>

    <?php

    foreach ( $content as $orang )
    {
      echo '<tr>';
      echo '<td>' . $orang['nama'] . '</td>';
      echo '<td>' . $orang['emel'] . '</td>';
      echo '<td>' . $orang['telefon'] . '</td>';
      echo '</tr>';
    }

    ?>

    @foreach ( $content as $orang )
    <tr>
      <td>{{ $orang['nama'] }}</td>
      <td>{{ $orang['emel'] }}</td>
      <td>{{ $orang['telefon'] }}</td>
    </tr>
    @endforeach

  </tbody>

</table>

</div>
<!-- /.box-body -->
<div class="box-footer">
Footer
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection

@section('script')

@endsection
