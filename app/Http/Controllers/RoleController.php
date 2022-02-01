<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Role;
use Str;
use Carbon\Carbon;
use Auth;

class RoleController extends Controller
{
    //to view role add form page;
    function addform()
    {
        $all_roles = Role::all();
        $all_roles = Role::latest()->paginate(3);
        return view('role/add',compact('all_roles'));
    }
    function storerole(Request $request)
    {
        $request->validate([
            'role'=>' required',
        ]);
        // print_r($request->all());
        $role = Str::title($request->role);

        if(Role::where('role','=', $role)->doesntExist()){
            Role::insert([
                'role' => $role,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
        else{
            return back()->with('InsErr','Already Inserted');
        }

        
        return back();
    }
}
