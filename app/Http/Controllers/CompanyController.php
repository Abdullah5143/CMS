<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $company=Company::all();
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        //
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
        return redirect('company')->with('msg','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $com= Company::find($id);
        return view('company.show',compact('com','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $com=Company::find($id);
        return view('company.edit',compact('com','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        //
        $data->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);
        $company=Company::find($id);
        $company->name=$data->input('name');
        $company->email=$data->input('email');
        $company->website=$data->input('website');
        if($data->file('file')!=null)
        {
        $company->logo=time().$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads',$company->logo);
        }
        $company->save();
        return redirect('company')->with('msg','Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $com= Company::find($id);
            $logo="uploads/".$com->logo;
            if(File::exists($logo)){
            File::delete($logo);}
            $com->delete();
            return redirect()->back();
        } catch (\Exception $exception) {
            // dd($exception);
            return back()->with('msg', 'Cannot delete Company! It has employees');
        }
        return redirect()->back()->with('msg','Success');
    }
}
