<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::FirstOrCreate([ 'name' => 'admin' , 'guard_name' => 'web'])->givePermissionTo(Permission::all());
        Employee::FirstOrCreate(['email' => 'admin@admin.com' , 'fname' => 'admin' , 'lname' => 'admin' , 'phone' => '986435'])->assignrole('admin');
    }
}
