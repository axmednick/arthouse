<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class DefaultController extends Controller
{
    public function index(Request $request)
    {


        return view('index', [
            'sliders' => Slider::all(),
            'banners' => Banner::all(),
            'products' => Product::orderBy('id', 'desc')->limit(12)->get(),
            'blogs' => Blog::orderBy('id', 'desc')->limit(4)->get()
        ]);
    }

    public function products(Request $request)
    {


        $products = Product::orderBy('id', 'desc');

        if ($request->category) {
            $products->where('category_id', $request->category);
        }
        if ($request->brand) {
            $products->where('brand_id', $request->brand);
        }

        if ($request->keyword) {
            $products->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        return view('products', [
            'products' => $products->paginate(12)
        ]);
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);

        return view('product', [
            'product' => $product,
            'related_products' => Product::where('category_id', $product->category_id)->where('id', '<>', $id)->limit(12)->get()
        ]);
    }

    public function blogs()
    {
        return view('blogs', [
            'blogs' => Blog::orderBy('id', 'desc')->paginate(12)
        ]);
    }

    public function blog($id)
    {
        return view('blog', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function orderCreate(Request $request)
    {

        $this->validate($request, [

            'full_name' => 'required',
            'phone' => 'required',
        ]);

        $order = Order::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'note' => $request->note
        ]);

        foreach ($request->product_id as $product_id) {

            if (Product::where('id', $product_id)->exists()) {

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id
                ]);
            }
        }
        $cookie = Cookie::forget('cart_product_ids');


        return redirect(route('index'))->with('success')->withCookie($cookie);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cartProductIds = $request->cookie('cart_product_ids', '');


        if ($productId) {
            $cartProductIds = $cartProductIds . '-' . $productId;
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'product' => Product::find($productId),
        ])->cookie('cart_product_ids', $cartProductIds, 600, null, null, false, false);
    }

    public function getProductDetails(Request $request)
    {
        $productId = $request->input('product_id');

        $product = Product::find($productId);

        return response()->json([
            'success' => true,
            'product' => ProductResource::make($product),
        ]);
    }

    public function orderDetail(Request $request)
    {

        $cartProductIds = $request->cookie('cart_product_ids', []);

        $arrayIds = explode('-', $cartProductIds);

        $arrayIds = array_filter($arrayIds, function ($value) {
            return $value !== '';
        });

        $products = Product::whereIn('id', $arrayIds)->get();

        $totalPrice = Product::whereIn('id', $arrayIds)->sum('price');

        return view('orderDetail', [
            'products' => $products,
            'totalPrice' => $totalPrice
        ]);
    }


}
