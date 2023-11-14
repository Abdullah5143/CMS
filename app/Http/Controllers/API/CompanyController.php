<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
// use Illuminate\Validation\Validator;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guard('api')->check()){
            $companies = [Company::all()];
            // dd($users);
            foreach($companies as $company){
                return Response(['data'=>$company],200);
            }
        }
        return Response(['data'=>'unauthenticated'],401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:Companies',
            'website' => 'required',
            'file' => 'required',
        ]);
        if($validator->fails()){
            return Response(['errors'=>$validator->errors()],401);
        }
        else{
        $company=new company();
        $company->name=$request->input('name');
        $company->email=$request->input('email');
        $company->website=$request->input('website');
        $company->logo=time().$request->file('file')->getClientOriginalName();
        $request->file('file')->move('uploads',$company->logo);
        $company->save();
        
        return Response(['data'=>$company],200);
            }
        }
        return Response(['data'=>'unauthenticated'],401);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        // dd('here');
        $company = Company::find($company->id);
            if (!$company) {
                return response(['error' => 'Company not found'], 404);
            }
            return response(['Company' => $company], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        
            // dd($request->all(),$company);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:companies',
                'website' => 'required',
            ]);
            if ($validator->fails()) {
                return response(['errors' => $validator->errors()], 422);
            } else{
            $com = Company::find($company->id);
            if (!$com) {
                return response(['error' => 'Company not found'], 404);
            }
            $com->name = $request->input('name');
            $com->email = $request->input('email');
            $com->website = $request->input('website');
            $com->save();
            return response(['data' => $com], 200);}
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company = Company::find($company->id);
            if (!$company) {
                return response(['error' => 'Company not found'], 404);
            }
            $logo="uploads/".$company->logo;
            if(File::exists($logo)){
            File::delete($logo);}
            $company->delete();
            return response(['message' => 'Deleted successfully'], 200);
    }
}
