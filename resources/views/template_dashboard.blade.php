@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! $page_title !!}</div>

                <div class="card-body">

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
</div>
</div>
</div>
</div>
@endsection

@section('script')

@endsection
