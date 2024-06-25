<?php

namespace App\Http\Controllers;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {


         $products = Product::with(['categories', 'tags', 'size', 'media'])->get();
         return view('products.index',compact('products'));


    }

    public function addToCart( Product $product){

        Cart::add($product->id,$product->name, 1,$product->price,)->associate('App\Models\Product');
        return redirect()->route('cart.show');

    }
    /****show one product***/

    public function show(Product $product){
        $products = Product::with(['categories', 'tags', 'size', 'media'])->take(4)->get();
        return view('products.show',compact('product','products'));
    }


}
