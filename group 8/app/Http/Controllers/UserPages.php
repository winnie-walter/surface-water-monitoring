<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UserPages extends Controller
{
    public function showlogin(){


        return view('login');
    }

    public function users(){
        $user = User::all();
        $roles = Role::all();
        return view('users',compact('user','roles'));
    }
    public function roles(){
        $permission = Permission::all();
         $role =Role::with('permissions')->get();
         // for($i=0; $i<count($role); $i++){
         //     dd($role[$i]['permissions']);
         // }
         // dd($role[$i]['permissions'][$i]['name']);

         return view('roles',compact('permission','role'));
     }
}
