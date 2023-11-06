<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $roles=Role::all();
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $roles = Role::all();
        return view('role.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
        ]);
        $role=new role();
        $role->name=$request->input('name');
        $role->save();
        return redirect('role')->with('msg','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $role=Role::find($id);
        return view('role.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $role=Role::find($id);
        $permissions=Permission::all();
        return view('role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();
        return redirect('role')->with('msg','Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role= Role::find($id);
        $role->delete();
        return redirect()->back()->with('msg','Success');
    }

    public function givePermission(Request $Request, Role $role)
    {
        if($role->hasPermissionTo($Request->permission)){
            return redirect()->back()->with('msg','This permission already exists');
        }
        $role->givePermissionTo($Request->permission);
        return redirect()->back()->with('msg','permission added');
    }
    public function revokePermission(Request $request)
    {
        $permission=Permission::find($request->permission);
        $role=Role::find($request->role);
        
        $role->revokePermissionTo($permission);
        
        return redirect()->back()->with('msg','permission Removed');
    }
    
}
