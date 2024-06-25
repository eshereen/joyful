<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // check Coupon
    public function check(Request $request){
        $coupon = Coupon::where('coupon_code',request('code'))->first();
        return view('cart',compact('coupon'));

    }
}
