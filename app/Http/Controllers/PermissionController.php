<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions=Permission::all();
        return view('permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $permission=new Permission();
        $permission->name=$request->input('name');
        $permission->save();
        return redirect('permission')->with('msg','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $permission=Permission::find($id);
        return view('permission.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permission=Permission::find($id);
        return view('permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $permission=Permission::find($id);
        $permission->name=$request->input('name');
        $permission->save();
        return redirect('permission')->with('msg','Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission= Permission::find($id);
        $permission->delete();
        return redirect()->back()->with('msg','Success');
    }
}
