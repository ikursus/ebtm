@extends('layouts/app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{!! $page_title !!}</div>

<div class="card-body">

  @include('layouts/alerts')

  <form method="POST" action="/aduan/add">
      @csrf

      <div class="form-group row">
          <label for="modul" class="col-sm-4 col-form-label text-md-right">MODUL</label>

          <div class="col-md-6">
              <select name="modul" class="form-control">
                @foreach( $modul as $item )
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>

              @if ($errors->has('modul'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('modul') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="masalah" class="col-sm-4 col-form-label text-md-right">MASALAH</label>

          <div class="col-md-6">
              <textarea id="masalah" class="form-control{{ $errors->has('masalah') ? ' is-invalid' : '' }}" name="masalah" value="{{ old('masalah') }}" required autofocus></textarea>

              @if ($errors->has('masalah'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('masalah') }}</strong>
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
