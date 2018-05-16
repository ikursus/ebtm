@extends('layouts/app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{!! $page_title or "" !!}</div>

<div class="card-body">


  <form method="POST" action="{{ route('modul.update', ['id' => $modul->id]) }}">
      @csrf

      <!--input type="hidden" name="_method" value="PATCH"-->
      @method('patch')


      <div class="form-group row">
          <label for="nama" class="col-sm-4 col-form-label text-md-right">NAMA</label>

          <div class="col-md-6">
              <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $modul->nama }}" required autofocus>

              @if ($errors->has('nama'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row mb-0">
          <div class="col-md-8 offset-md-4">

              <button type="submit" class="btn btn-primary">
                  Save
              </button>

          </div>
      </div>
  </form>


</div>
</div>
</div>
</div>
</div>
@endsection
