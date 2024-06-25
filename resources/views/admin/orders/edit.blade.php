@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">Name : {{$order->user->name}}</label>
               <input class="form-control" name="user_id" value="{{$order->user->id}}">


            </div>
            <div class="form-group">
                <label class="required" for="email">Email</label>
               <input class="form-control" name="email" value="{{$order->email}}">


            </div>

            <div class="form-group">
                <label for="coupon_id">{{ trans('cruds.order.fields.coupon') }}</label>
                <select class="form-control select2 {{ $errors->has('coupon') ? 'is-invalid' : '' }}" name="coupon_id" id="coupon_id">
                    @foreach($coupons as $id => $coupon)
                        <option value="{{ $id }}" {{ (old('coupon_id') ? old('coupon_id') : $order->coupon->id ?? '') == $id ? 'selected' : '' }}>{{ $coupon }}</option>
                    @endforeach
                </select>
                @if($errors->has('coupon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coupon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.coupon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.order.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="select-all btn btn-info btn-xs" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                @foreach($order->products as $key => $item)
                <span class="badge badge-info">{{ $item->name }} {{$item->size->name}}gm</span>
            @endforeach
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $order->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>

                @if($errors->has('products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_price">{{ trans('cruds.order.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', $order->total_price) }}" step="0.01" required>
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="item_count">{{ trans('cruds.order.fields.item_count') }}</label>
                <input class="form-control {{ $errors->has('item_count') ? 'is-invalid' : '' }}" type="number" name="item_count" id="item_count" value="{{ old('item_count', $order->item_count) }}" step="1" required>
                @if($errors->has('item_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.item_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_address">{{ trans('cruds.order.fields.shipping_address') }}</label>
                <input class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $order->shipping_address) }}" required>
                @if($errors->has('shipping_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_phone">{{ trans('cruds.order.fields.shipping_phone') }}</label>
                <input class="form-control {{ $errors->has('shipping_phone') ? 'is-invalid' : '' }}" type="text" name="shipping_phone" id="shipping_phone" value="{{ old('shipping_phone', $order->shipping_phone) }}" required>
                @if($errors->has('shipping_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_name">{{ trans('cruds.order.fields.shipping_name') }}</label>
                <input class="form-control {{ $errors->has('shipping_name') ? 'is-invalid' : '' }}" type="text" name="shipping_name" id="shipping_name" value="{{ old('shipping_name', $order->shipping_name) }}">
                @if($errors->has('shipping_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.order.fields.note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{!! old('note', $order->note) !!}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.paid') }}</label>
                <select class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" name="paid" id="paid" required>
                    <option value disabled {{ old('paid', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::PAID_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paid', $order->paid) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.shipped') }}</label>
                <select class="form-control {{ $errors->has('shipped') ? 'is-invalid' : '' }}" name="shipped" id="shipped" required>
                    <option value disabled {{ old('shipped', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::SHIPPED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('shipped', $order->shipped) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipped'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipped') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipped_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/orders/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $order->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
