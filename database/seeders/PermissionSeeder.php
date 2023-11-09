<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::FirstOrCreate([ 'name' => 'add-employee' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'delete-employee' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'update-employee' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'show-employee' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'access-employees' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'access-companies' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'add-company' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'delete-company' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'update-company' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'show-company' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'access-permissions' , 'guard_name' => 'web']);
        Permission::FirstOrCreate([ 'name' => 'access-roles' , 'guard_name' => 'web']);
        
    }
}
