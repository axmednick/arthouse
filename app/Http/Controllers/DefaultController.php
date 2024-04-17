<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(){
        return view('index',[
            'sliders'=>Slider::all(),
            'banners'=>Banner::all(),
            'products'=>Product::orderBy('id','desc')->limit(12)->get(),
            'blogs'=>Blog::orderBy('id','desc')->limit(4)->get()
        ]);
    }

    public function products(Request $request){


        $products = Product::orderBy('id','desc');

        if ($request->category){
            $products->where('category_id',$request->category);
        }

        if ($request->keyword){
            $products->where('name','like','%'.$request->keyword.'%')
                ->orWhere('description','like','%'.$request->keyword.'%');
        }

        return view('products',[
            'products'=>$products->paginate(12)
        ]);
    }

    public function product($id){
        $product = Product::findOrFail($id);

        return view('product',[
            'product'=>$product,
            'related_products'=>Product::where('category_id',$product->category_id)->where('id','<>',$id)->get()
        ]);
    }

    public function blogs(){
        return view('blogs',[
            'blogs'=>Blog::orderBy('id','desc')->paginate(12)
        ]);
    }

    public function blog($id){
        return view('blog',[
            'blog'=>Blog::findOrFail($id)
        ]);
    }

    public function contact(){
        return view('contact');
    }

    public function orderCreate(Request $request){


        Order::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'product_id'=>$request->product_id
        ]);

        return back()->with('success');
    }

}
