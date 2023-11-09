<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::User()->hasPermissionTo('access-employees')) {
        // return $next($request);
        // }
        // else
        // abort(403, 'Unauthorized action.');

        $route = $request->route()->getName();
        $permissions = [
            'employee.index' => 'access-employees',
            'employee.create' => 'add-employee',
            'employee.store' => 'add-employee',
            'employee.edit' => 'update-employee',
            'employee.update' => 'update-employee',
            'employee.show' => 'show-employee',
            'employee.destroy' => 'delete-employee',
            'company.index' => 'access-companies',
            'company.create' => 'add-company',
            'company.store' => 'add-company',
            'company.edit' => 'update-company',
            'company.update' => 'update-company',
            'company.show' => 'show-company',
            'company.destroy' => 'delete-company',
        ];

        if (array_key_exists($route, $permissions) && !auth()->user()->can($permissions[$route])) {
            abort(403, 'Unauthorized action!');
        }

        return $next($request);
    }
}
