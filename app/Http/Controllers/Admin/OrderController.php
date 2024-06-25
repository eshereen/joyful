<?php

namespace App\Http\Controllers\Admin;

use App\Events\CancelledEvent;
use App\Events\ConfirmedOrderEvent;
use App\Events\DeliveredEvent;
use App\Events\OrderShipped;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['user', 'coupon', 'products'])->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::all()->pluck('coupon_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::all()->pluck('name', 'id');

        return view('admin.orders.create', compact('users', 'coupons', 'products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->products()->sync($request->input('products', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $order->id]);
        }

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::all()->pluck('coupon_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::all()->pluck('name', 'id');

        $order->load('user', 'coupon', 'products');

        return view('admin.orders.edit', compact('users', 'coupons', 'products', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
       $order->products()->sync($request->input('products', []));


        //confirmed Order
        if($order['status'] == 'confirmed'){

            event(new ConfirmedOrderEvent($order));
        }

      //shipped Order
        if($order['shipped'] == 'shipped'){

            event(new OrderShipped($order));
        }
        /****Delivered Order */
        if($order['shipped'] == 'delivered'){

            event(new DeliveredEvent($order));
        }

        /******Cancelled Order */
        if($order['shipped'] == 'cancelled'){

            event(new CancelledEvent($order));
        }

        return redirect()->route('admin.orders.index');
    }



    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('user', 'coupon', 'products');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('order_create') && Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Order();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
