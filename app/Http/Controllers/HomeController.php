<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard()
    {
        $brands = Brand::all();
        $groups = Group::all();
        $products = Product::latest()->get();
        return view('backend.dashboard' , compact('brands','groups', 'products'));
    }

    function index()
    {
        $brands = Brand::all();
        $groups = Group::all();
        $products = Product::latest()->get();
        return view('frontend.index' , compact('brands','groups', 'products'));
    }

    function show_brand()
    {
        $brands = Brand::all();
        $groups = Group::all();
        $products = Product::latest()->get();
        return view('frontend.show_cat' , compact('brands','groups', 'products'));
    }

    function brands_products(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->get();
        return view('backend.brand.brands_products' , compact('products' , 'brand'));
    }
    function groups_products(Group $group)
    {
        $products = Product::where('group_id', $group->id)->get();
        return view('backend.group.groups_products' , compact('products' , 'group'));
    }

    function product_details(Product $product)
    {
        $galleries = Gallery::where('product_id', $product->id)->get();
        return view('backend.product.product_details' , compact('product', 'galleries'));
    }
}
