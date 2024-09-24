<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageSaveTrait;

class GroupController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('backend.group.index', compact('groups'));
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
        while (Group::where('slug', $request['slug'])->exists()) {
            $request['slug'] = Str::slug($request->name).'-'.$i;
            $i++;
        }
        if ($request->status == 'on') {
            $status =  1;
        } else {
            $status =  0;
        }
        if($request->hasFile('image')) {
            $image_name = $this->saveImage('group', $request->file('image'), 400, 400);

            Group::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'status' => $status,
                'image' =>$image_name,
            ]);
        }
        else{
            Group::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'status' => $status,
            ]);
        }


        return redirect()->route('groups.index')->with('success', 'Group Created Successfully');
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
    public function edit(Group $group)
    {
        return view('backend.group.edit', [
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (!empty($group->image)) {
                $this->deleteImage(public_path($group->image));
            }

            $image_name = $this->saveImage('group', $request->file('image'), 400, 400);
            $group->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
            ]);
        }
        else {
            $group->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('groups.index')->with('success', 'Group Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        try {
            $this->deleteImage(public_path($group->image));
            $group->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Group Deleted Successfully'], 200);
    }

    public function updateStatus(Group $group)
    {
        try {
            $group->update([
                'status' => $group->status == 0 ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Group Status Updated Successfully'], 200);
    }
}
