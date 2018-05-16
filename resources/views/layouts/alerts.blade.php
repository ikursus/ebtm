@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ( session('mesej-sukses') )
<div class="alert alert-success">
    {{ session('mesej-sukses') }}
</div>
@endif

@if ( session('mesej-error') )
<div class="alert alert-warning">
    {{ session('mesej-error') }}
</div>
@endif
