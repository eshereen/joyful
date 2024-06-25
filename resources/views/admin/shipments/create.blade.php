@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shipment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shipments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="area_id">{{ trans('cruds.shipment.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id" required>
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ old('area_id') == $id ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipment_company_id">{{ trans('cruds.shipment.fields.shipment_company') }}</label>
                <select class="form-control select2 {{ $errors->has('shipment_company') ? 'is-invalid' : '' }}" name="shipment_company_id" id="shipment_company_id" required>
                    @foreach($shipment_companies as $id => $shipment_company)
                        <option value="{{ $id }}" {{ old('shipment_company_id') == $id ? 'selected' : '' }}>{{ $shipment_company }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipment_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipment_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.shipment_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.shipment.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.price_helper') }}</span>
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