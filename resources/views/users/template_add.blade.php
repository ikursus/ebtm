@extends('layouts/app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{!! $page_title !!}</div>

<div class="card-body">

  @include('layouts/alerts')

  <form method="POST" action="/users/add">
      @csrf
      {{ csrf_field() }}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group row">
          <label for="uid" class="col-sm-4 col-form-label text-md-right">USER ID</label>

          <div class="col-md-6">
              <input id="uid" type="text" class="form-control{{ $errors->has('uid') ? ' is-invalid' : '' }}" name="uid" value="{{ old('uid') }}" required autofocus>

              @if ($errors->has('uid'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('uid') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="nama" class="col-sm-4 col-form-label text-md-right">NAMA</label>

          <div class="col-md-6">
              <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

              @if ($errors->has('nama'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label text-md-right">EMAIL</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">PASSWORD</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="jantina" class="col-sm-4 col-form-label text-md-right">JANTINA</label>

          <div class="col-md-6">
              <select name="jantina" class="form-control">
                <option value="LELAKI">LELAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
                <option value="LAIN_LAIN">LAIN LAIN</option>
              </select>

              @if ($errors->has('jantina'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('jantina') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="no_kp" class="col-sm-4 col-form-label text-md-right">NO. KP</label>

          <div class="col-md-6">
              <input id="no_kp" type="text" class="form-control{{ $errors->has('no_kp') ? ' is-invalid' : '' }}" name="no_kp" value="{{ old('no_kp') }}" required autofocus>

              @if ($errors->has('no_kp'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('no_kp') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="no_telefon" class="col-sm-4 col-form-label text-md-right">NO. TELEFON</label>

          <div class="col-md-6">
              <input id="no_telefon" type="text" class="form-control{{ $errors->has('no_telefon') ? ' is-invalid' : '' }}" name="no_telefon" value="{{ old('no_telefon') }}" required autofocus>

              @if ($errors->has('no_telefon'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('no_telefon') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="role" class="col-sm-4 col-form-label text-md-right">ROLE</label>

          <div class="col-md-6">
              <select name="role" class="form-control">
                <option value="ADMIN">ADMIN</option>
                <option value="STAFF">STAFF</option>
                <option value="STUDENT">STUDENT</option>
              </select>

              @if ($errors->has('role'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('role') }}</strong>
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
