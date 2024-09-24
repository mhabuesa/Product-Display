<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageSaveTrait;

class BrandController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $request['slug'] = Str::slug($request->name);

        // check slug availability
        $i = 1;
        while (Brand::where('slug', $request['slug'])->exists()) {
            $request['slug'] = Str::slug($request->name).'-'.$i;
            $i++;
        }
        if ($request->status == 'on') {
            $status =  1;
        } else {
            $status =  0;
        }
        if($request->hasFile('image')) {
            $image_name = $this->saveImage('brand', $request->file('image'), 400, 400);

            Brand::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'status' => $status,
                'image' =>$image_name,
            ]);
        }
        else{
            Brand::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'status' => $status,
            ]);
        }


        return redirect()->route('brands.index')->with('success', 'Brand Created Successfully');
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
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (!empty($brand->image)) {
                $this->deleteImage(public_path($brand->image));
            }

            $image_name = $this->saveImage('brand', $request->file('image'), 400, 400);
            $brand->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
            ]);
        }
        else {
            $brand->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('brands.index')->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->deleteImage(public_path($brand->image));
            $brand->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Brand Deleted Successfully'], 200);
    }

    public function updateStatus(Brand $brand)
    {
        try {
            $brand->update([
                'status' => $brand->status == 0 ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Brand Status Updated Successfully'], 200);
    }
}
