<div class="form-group row">
    <label for="modul" class="col-sm-4 col-form-label text-md-right">MODUL</label>

    <div class="col-md-6">
        {!! Form::select('modul', $modul, null, ['class' => 'form-control']) !!}

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
        {!! Form::textarea('masalah', null, ['class' => 'form-control']) !!}

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
