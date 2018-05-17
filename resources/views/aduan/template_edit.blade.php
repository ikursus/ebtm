@extends('layouts/app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{!! $page_title !!}</div>

<div class="card-body">

  @include('layouts/alerts')

  {!! Form::model($aduan, ['method' => 'patch', 'route' => ['aduan.update', $aduan->id]]) !!}

  @include('aduan/borang')

  {!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>
@endsection
