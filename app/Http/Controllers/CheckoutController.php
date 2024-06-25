<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Events\OrderRecieved;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
        $shipment = Shipment::all();
        $cities = City::all();
        $areas = Area::all();
        $subtotal = Cart::subtotal();
        if(session('coupon')){
            if(session('coupon')->type == 'percentage'){
                $couponPrice = Cart::subtotal()*session('coupon')->amount/100;
            }else{
                $couponPrice = session('coupon')->amount;
            }

        }else{
            $couponPrice = 0;
        }

        $newSubTotal = Cart::subtotal() - $couponPrice ;
           /*******Shipment */
        if(session('shipment_price')){

            $shipment_price = session('shipment_price');
        }else{
            $shipment_price = 0;
        }

        $total =$newSubTotal + $shipment_price;

        return view('checkout',compact('shipment','areas','subtotal','shipment','newSubTotal','total','couponPrice','cities'));
    }



    /*****Order */

    public function order(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'area'=>'required',
            'address'=>'required',
            'note'=>'nullable'


        ]);
        /* $data['user_id']= auth()->id();*/
         $data['email'] = request('email');
         $data['item_count']= Cart::count();
         $data['area_id'] = request('area');
         $data['total_price'] = request('price');
         $data['shipping_name'] = request('name');
         $data['shipping_phone'] = request('phone');
         $data['shipping_address'] = request('address');
         $data['shipping_cost'] = session('shipment_price');





        if(session('coupon')){
            $data['coupon_id']= session('coupon')->id;
        };


       /***Making User Account***/
       $user = User::where('email',request('email'))->first();
       if($user){
        $data['user_id']=$user->id;
       }else{
        $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make('password'),

        ]);
        $data['user_id']=$user->id;
       }



        /***Making User Account***/
        $data['user_id']=$user->id;
        $order = Order::create($data);
        $order->products()->sync($request->input('products', []));


        if ($order) {


    $items = Cart::content();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->qty,
                    'price'         =>  $item->price
                ]);

                $order->items()->save($orderItem);
            }

            session()->forget(['shipment', 'shipment_price','shipmnt_area','coupon']);
            Cart::destroy();

        }
        event(new OrderRecieved($order));
        return redirect()->route('thanks');

    }
    /****get shipment***/
    public function getShipment($id){


        $shipment= Shipment::where('area_id',$id)->first();
        if($shipment){
            $shipment_price= $shipment->price;
            $shipment_area= $shipment->area->name;
            session()->put('shipment',$shipment);
            session()->put('shipment_price',$shipment_price);
            session()->put('shipment_area',$shipment_area);
            toast('Your area shipping price is added','success');
            return redirect()->back();
        }


    }

    public function thanks(){
        return view('thanks');
    }
}
