<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    
    public function loginUser(Request $request)
    {
        
        $input = $request->all();
        Auth::attempt($input);
        if(Auth::User()){
        $user = Auth::User();
        $token = $user->createToken('token')->accessToken;
        return Response(['status'=>200,'token'=>$token],200);
        }
            return Response(['data'=>'User does not exist'],401);
        
    }

    
    public function getUserDetail()
    {
        
        $user = Auth::guard('api')->user();
        return Response(['data'=>$user],200);
        
    }

    
    public function userLogout()
    {
        if(Auth::guard('api')->check()){
        $user = Auth::guard('api')->user();
        $user->token()->revoke();
        return Response(['data'=>'unauthenticated','message'=>'User Logout Successfully'],200);
        }
        return Response(['data'=>'unauthenticated'],401);
    }

    
    public function users()
    {
        if(Auth::guard('api')->check()){
            $users = [Employee::all()];
            // dd($users);
            foreach($users as $user){
                return Response(['data'=>$user],200);
            }
        }
        return Response(['data'=>'unauthenticated'],401);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $employees = [Employee::all()];
            // dd($users);
            foreach($employees as $employee){
                return Response(['data'=>$employee],200);
            }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            // 'company_id' => [
            //     'required',
            //     'company_id',
            //     Rule::exists('companies', 'company_id'),
            // ],
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
        ]);
        if($validator->fails()){
            return Response(['errors'=>$validator->errors()],401);
        }
        else{
            $emp=new Employee();
            $emp->fname=$request->input('fname');
            $emp->lname=$request->input('lname');
            $emp->company_id=$request->input('company_id');
            $emp->email=$request->input('email');
            $emp->phone=$request->input('phone');
            // $emp->assignRole('employee','web');
            $emp->save();
        
        return Response(['data'=>$emp],200);
            }
        }
        return Response(['data'=>'unauthenticated'],401);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee = Employee::find($employee->id);
            if (!$employee) {
                return response(['error' => 'employee not found'], 404);
            }
            return response(['employee' => $employee], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        
            // dd($request->all(),$company);
            $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'company_id' => 'required|exists:companies,id',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                return response(['errors' => $validator->errors()], 422);
            } else{
            $emp = Employee::find($employee->id);
            if (!$emp) {
                return response(['error' => 'Employee not found'], 404);
            }
            
            $emp->fname=$request->input('fname');
            $emp->lname=$request->input('lname');
            $emp->company_id=$request->input('company_id');
            $emp->email=$request->input('email');
            $emp->phone=$request->input('phone');
            $emp->save();
            return response(['data' => $emp], 200);}
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee->id);
            if (!$employee) {
                return response(['error' => 'employee not found'], 404);
            }
            $employee->delete();
            return response(['message' => 'Deleted successfully'], 200);
    }
}
