<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function companies()
    {
        $company=Company::all();
        return view('companies',compact('company'));
    }
    public function employees()
    {
        $employee=Employee::all();
        return view('employees',compact('employee'));
    }
    public function company()
    {
        //$company=new company();
        return view('addCompany');
    }
    public function upcompage($id)
    {
        $com=Company::find($id);
        return view('upcompage',compact('com'));
    }
    public function upemppage($id)
    {
        $company=Company::all();
        $emp=Employee::find($id);
        return view('upemppage',compact('emp','company'));
    }
    public function employee()
    {
        $company=Company::all();
        return view('addEmployee',compact('company'));
    }
    public function add_company(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'file' => 'required',
        ]);
        $company=new company();
        $company->name=$data->input('name');
        $company->email=$data->input('email');
        $company->website=$data->input('website');
        $company->logo=time().$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads',$company->logo);
        $company->save();
        return redirect()->back()->with('msg','Success');
    }
    public function update_company(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);
        $company=Company::find($data->input('id'));
        $company->name=$data->input('name');
        $company->email=$data->input('email');
        $company->website=$data->input('website');
        if($data->file('file')!=null)
        {
        $company->logo=time().$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads',$company->logo);
        }
        $company->save();
        return redirect()->back()->with('msg','Success');
    }
    public function add_employee(Request $data)
    {
        $data->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $emp=new employee();
        $emp->fname=$data->input('fname');
        $emp->lname=$data->input('lname');
        $emp->company_id=$data->input('company');
        $emp->email=$data->input('email');
        $emp->phone=$data->input('phone');
        $emp->save();
        return redirect()->back()->with('msg','Success');
    }
    public function update_employee(Request $data)
    {
        $data->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $emp=Employee::find($data->input('id'));
        $emp->fname=$data->input('fname');
        $emp->lname=$data->input('lname');
        $emp->company_id=$data->input('company');
        $emp->email=$data->input('email');
        $emp->phone=$data->input('phone');
        $emp->save();
        return redirect()->back()->with('msg','Success');
    }
    public function delete_company($id)
    {
        $com= Company::find($id);
            $com->delete();
            return redirect()->back();
    }
    public function delete_employee($id)
    {
        $emp= Employee::find($id);
            $emp->delete();
            return redirect()->back();
    }
}
