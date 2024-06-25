<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function cart(){
        $couponPrice = 0;
        $shipment=0;
        $total = cart::total();

        $products =Product::all();
        $shipment = Shipment::all();
        $areas = Area::all();
        $subtotal = Cart::subtotal();
        if(session('coupon')){
            if(session('coupon')->type === 'percent'){
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

            $shipment = session('shipment_price');
        }else{
            $shipment = 0;
        }

        $total =$newSubTotal +$shipment;

        return view('cart',compact('products','shipment','areas','subtotal','shipment','newSubTotal','total','couponPrice'));
    }
/****increase Qty */
public function increaseQty($rowId){
    $product = Cart::get($rowId);

    $qty =$product->qty +1;
    Cart::update($rowId, $qty); // Will update the quantity

    return back();
}
public function decreaseQty($rowId){
    $product = Cart::get($rowId);

    $qty =$product->qty - 1;
    Cart::update($rowId, $qty); // Will update the quantity
    return back();
}
    public function update($rowId){
     Cart::update($rowId,request('qty'));
     return back();
    }

     public function remove($rowId){
            Cart::remove($rowId);
            if(Cart::count() == 0){
                session()->flush();

            }
         return back();
        }

        /*****Check coupon */
        public function check(Request $request){

            $couponCount = Coupon::where('coupon_code',request('code'))
                              ->count();
            $coupon =Coupon::where('coupon_code',request('code'))
                              ->first();


            if($couponCount == 0){


                toast('Sorry, invalid coupon.','error');
                return redirect()->back();

            }elseif( new Carbon($coupon->expiry_date)   <  Carbon::now())
          {

                    toast('Sorry, expired coupon.','error');
                    return redirect()->back();
            }else{
                    //if all condition right
                    session()->put('coupon',$coupon);
                    toast('Thank you! Valid coupon.','success');
                    return redirect()->back();
                  }

        }


            /*****Check shippment */
            public function checkShipment(){
                $shipment= Shipment::where('area_id',request('area_id'))->first();
                if($shipment){
                    $shipment_price= $shipment->price;
                    $shipment_area= $shipment->area->name;
                    session()->put('shipment_price',$shipment_price);
                    session()->put('shipment_area',$shipment_area);
                    session()->put('shipment',$shipment);
                    toast('Your area shipping price is added.','success');
                    return redirect()->back();
                }else{
                    toast('Choose your area!','error');
                    return redirect()->back();

                }

            }
            //flush session of coupon
            public function sessionFlush(){
                if(session('coupon')){
                    session()->forget('coupon');
                    toast('Your Coupon is removed','success');
                    return redirect()->back();
                }
                return redirect()->back();
            }

             //flush session of coupon
             public function sessionShipmentFlush(){
                if(session('shipment_price')){
                    session()->forget('shipment_price');
                    session()->forget('shipment_area');
                    session()->forget('shipment');
                    toast('Your Shipping area is removed','success');
                    return redirect()->back();
                }
                return redirect()->back();
            }


}


