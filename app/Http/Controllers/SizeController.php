<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sizes = Size::all();
        return view('backend.size.index', compact('sizes'));
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
            'size' => 'required|unique:sizes',
        ]);

        Size::create([
            'size' => $request->size
        ]);


        return redirect()->route('sizes.index')->with('success', 'Size Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size' => 'required',
        ]);

        $size->update([
            'size' => $request->size
        ]);

        return redirect()->route('sizes.index')->with('success', 'Size Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $exists = Inventory::where('size_id', $size->id)->exists();

        if ($exists) {
            return response()->json(['error' => true, 'message' => 'This Size is used in Inventory'], 200);
        }

        try {
            $size->delete();
            return response()->json(['success' => true, 'message' => 'Size Deleted Successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
