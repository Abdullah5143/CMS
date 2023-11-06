<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employee=Employee::all();
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(Auth::User()->hasPermissionTo('add-employee')){
        $roles=Role::all();
        $company=Company::all();
        return view('employee.create',compact('company','roles'));
        }
        else{
            return redirect()->back()->with('msg','Only Admin have Access to add an employee');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        //
        $data->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
        ]);
        $emp=new Employee();
        $emp->fname=$data->input('fname');
        $emp->lname=$data->input('lname');
        $emp->company_id=$data->input('company');
        $emp->email=$data->input('email');
        $emp->phone=$data->input('phone');
        $emp->assignRole($data->input('role'));
        $emp->save();
        
        return redirect('employee')->with('msg','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $company=Company::all();
        $emp=Employee::find($id);
        return view('employee.show',compact('emp','company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company=Company::all();
        $emp=Employee::find($id);
        return view('employee.edit',compact('emp','company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        //
        $data->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $emp=Employee::find($id);
        $emp->fname=$data->input('fname');
        $emp->lname=$data->input('lname');
        $emp->company_id=$data->input('company');
        $emp->email=$data->input('email');
        $emp->phone=$data->input('phone');
        $emp->save();
        return redirect('employee')->with('msg','Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(Auth::User()->hasRole('admin')){
            $emp= Employee::find($id);
            $emp->delete();
            return redirect()->back()->with('msg','Success');
        }
        else{
            return redirect()->back()->with('msg','You are not Admin');
        }
    }
}
