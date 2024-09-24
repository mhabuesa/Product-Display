<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Gallery;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $groups = Group::all();
        $sizes = Size::all();
        return view('backend.product.create', compact('brands', 'groups', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'group_id' => 'required',
            'price' => 'required',
            'thumbnail_image' => 'required',

        ]);

        // Slug create
        $request['slug'] = Str::slug($request->name);

        // check slug availability
        $i = 1;
        while (Group::where('slug', $request['slug'])->exists()) {
            $request['slug'] = Str::slug($request->name).'-'.$i;
            $i++;
        }
        if ($request->status == 'on') {
            $status =  1;
        } else {
            $status =  0;
        }

        // Thumbnail Image save
        $thumbnail_image = $this->saveImage('thumbnail', $request->file('thumbnail_image'), 400, 400);

        // Product create
        $product =  Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'group_id' => $request->group_id,
            'material' => $request->material,
            'dose' => $request->dose,
            'functionality' => $request->functionality,
            'slug' => $request->slug,
            'status' => $status,
            'thumbnail_image' =>$thumbnail_image,
        ]);

        // Gallery Image save
        foreach ($request->gallery_image as $image) {
            $gallery_image = $this->saveImage('gallery', $image, 500, 500);

            Gallery::create([
                'product_id' => $product->id,
                'gallery_image' => $gallery_image,
            ]);
        }

        // Inventory create
        $sizes = $request->size_id;
        $price = $request->price;
        $quantities = $request->quantity;

        if(Inventory::where('product_id', $product->id)->where('size_id', $request->size_id)->exists()){

            foreach( $sizes as $key=> $size){
                Inventory::where('product_id', $product->id)->where('size_id', $sizes[$key])->increment('quantity', $quantities[$key]);
            }
        }
        else{
            foreach( $sizes as $key=> $color){
                Inventory::create([
                    'product_id'=>$product->id,
                    'size_id'=>$sizes[$key],
                    'price'=>$price[$key],
                    'quantity'=>$quantities[$key],
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $groups = Group::all();
        $galleries = Gallery::where('product_id', $product->id)->get();
        return view('backend.product.edit', compact('product', 'brands', 'groups', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'group_id' => 'required',

        ]);

        if ($request->status == 'on') {
            $status =  1;
        } else {
            $status =  0;
        }

        if ($request->hasFile('thumbnail_image')) {
            if (!empty($group->image)) {
                $this->deleteImage(public_path($product->thumbnail_image));
            }

            $thumbnail_image = $this->saveImage('thumbnail', $request->file('thumbnail_image'), 400, 400);
            $product->update([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'group_id' => $request->group_id,
                'material' => $request->material,
                'dose' => $request->dose,
                'functionality' => $request->functionality,
                'thumbnail_image' =>$thumbnail_image,
                'status' => $status,
            ]);
        }
        else {
            $product->update([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'group_id' => $request->group_id,
                'material' => $request->material,
                'dose' => $request->dose,
                'functionality' => $request->functionality,
                'status' => $status,
            ]);
        }


        if ($request->hasFile('gallery_image')) {
            foreach ($request->gallery_image as $image) {
                $gallery_image = $this->saveImage('gallery', $image, 500, 500);
                Gallery::create([
                    'product_id' => $product->id,
                    'gallery_image' => $gallery_image,
                ]);
            }
        }

        return redirect()->route('products.edit', $product->id)->with('success', 'Group Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $galleries = Gallery::where('product_id', $product->id)->get();

        try {
            $this->deleteImage(public_path($product->thumbnail_image));
            foreach ($galleries as $gallery) {
                $this->deleteImage(public_path($gallery->gallery_image));
                $gallery->delete();
            }
            $product->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Deleted Successfully'], 200);
    }

    public function updateStatus(Product $product)
    {
        try {
            $product->update([
                'status' => $product->status == 0 ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Status Updated Successfully'], 200);
    }

    public function galleryRemove(Gallery $gallery)
    {
        try {
            $this->deleteImage(public_path($gallery->gallery_image));
            $gallery->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

        return redirect()->back()->with('success', 'Gallery Deleted Successfully');
    }


    function inventory(Product $product)
    {
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $product->id)->get();
        return view('backend.product.inventory', compact('product', 'sizes', 'inventories'));
    }

    function inventory_store(Request $request, Product $product)
    {
        $request->validate([
            'size_id' => 'required',
            'quantity' => 'required',
        ]);

        // Inventory create
        $sizes = $request->size_id;
        $price = $request->price;
        $quantities = $request->quantity;


         if(Inventory::where('product_id', $product->id)->where('size_id', $request->size_id)->exists()){

            foreach( $sizes as $key=> $size){
                Inventory::where('product_id', $product->id)->where('size_id', $sizes[$key])->increment('quantity', $quantities[$key]);
                Inventory::where('product_id', $product->id)->where('size_id', $sizes[$key])->update([
                    'price'=>$price[$key],
                ]);
            }
        }
        else{
            foreach( $sizes as $key=> $size){
                Inventory::create([
                    'product_id'=>$product->id,
                    'size_id'=>$sizes[$key],
                    'price'=>$price[$key],
                    'quantity'=>$quantities[$key],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Inventory Updated Successfully');

    }

    function inventory_delete(Inventory $inventory)
    {
        try {
            $inventory->delete();
            return response()->json(['success' => true, 'message' => 'Inventory Deleted Successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

    public function getPrice(Request $request)
    {
        $inventory = Inventory::where('product_id', $request->product_id)
                              ->where('size_id', $request->size_id)
                              ->first();

        if ($inventory) {
            return response()->json($inventory->price);  // Return JSON response
        } else {
            return response()->json(['error' => 'Size not found'], 404);  // Handle case where no inventory is found
        }
    }

}
