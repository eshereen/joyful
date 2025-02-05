@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.city.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cities.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="countery_id">{{ trans('cruds.city.fields.countery') }}</label>
                <select class="form-control select2 {{ $errors->has('countery') ? 'is-invalid' : '' }}" name="countery_id" id="countery_id" required>
                    @foreach($counteries as $id => $countery)
                        <option value="{{ $id }}" {{ old('countery_id') == $id ? 'selected' : '' }}>{{ $countery }}</option>
                    @endforeach
                </select>
                @if($errors->has('countery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('countery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.countery_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.city.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection