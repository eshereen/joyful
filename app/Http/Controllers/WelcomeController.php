<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       return view('welcome',compact('products'));
    }

   public function soon()
    {
        
       return view('soon');
    }
    /**
    **About Us**
     */
    public function about()
    {
        return view('about');

    }
    /****Palm wax */
    public function palm()
    {
        return view('palm');

    }
      /****Terms  */
      public function terms()
      {
          return view('terms');

      }
        /****Privacy */
    public function privacy()
    {
        return view('privacy');

    }
           /****Contact */
           public function contact(Request $request)
           {

            $data = $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'msg'=>'required|min:3'
            ]);

            Mail::to('info@joyfulegy.com')->send(new ContactMail($data));
            alert()->success('Thank You','Your message is on its way to us!');
            return redirect()->route('welcome');
           }

           /*****Candle Care */
           public function candle_care(){
               return view('candle_care');
           }

}
