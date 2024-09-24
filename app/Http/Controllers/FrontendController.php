<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Group;
use App\Models\Inventory;
use App\Models\Product;

class FrontendController extends Controller
{
    function index()
    {
        $brands = Brand::where('status', '1')->get();
        $groups = Group::where('status', '1')->get();
        $products = Product::where('status', '1')->latest()->get();
        return view('frontend.index' , compact('brands','groups', 'products'));
    }

    function show_brand($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $latests = Product::latest()->get();
        $products = Product::where('brand_id', $brand->id)->where('status', '1')->with('brand')->get();
        return view('frontend.show_brand' , compact('products', 'brand', 'latests'));
    }
    function show_group($slug)
    {
        $group = Group::where('slug', $slug)->first();
        $latests = Product::latest()->get();
        $products = Product::where('group_id', $group->id)->where('status', '1')->with('group')->get();
        return view('frontend.show_group' , compact('products', 'group', 'latests'));
    }

    function product_show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $galleries = Gallery::where('product_id', $product->id)->get();
        $groupProducts = Product::where('group_id', $product->group_id)->where('id', '!=', $product->id)->with('group')->get();
        $brands = Brand::where('status', '1')->get();
        $sizes = Inventory::where('product_id', $product->id)->get();
        return view('frontend.single_product' , compact('product', 'galleries', 'brands', 'groupProducts', 'sizes'));
    }


    function search(Request $request)
    {
        $latests = Product::latest()->get();
        $search = $request->q;
        $products = Product::where('name', 'like', '%'.$search.'%')->where('status', '1')->get();
        return view('frontend.search', compact('products', 'latests'));
    }
}
