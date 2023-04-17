<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function createUser(Request $request)

    {
        $date = Carbon::now();
        $data = User::where('email', '=' ,$request->email)->first();
        if ($data != null){
            return back()->with('error','user already exists');
           }
        $validate = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' =>'required|digits_between:2,10',
            'address' => 'required',
            'gender'=>'required',

        ]);



        if ($validate->fails()){
            $messages = $validate->messages();
            return back()->with('error','erro while insertng data');
         }


        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->password = Hash::make("12345");
        $user->created_at =$date;
        $user->status=1;
        $user->save();
        $user->assignRole($request->input('roles'));

        return back()->with('message','User created sucessful');
    }


    public function editUser(Request $request, $id)
    {
        // $data = User::where('email', '=' ,$request->email)->first();
        // if ($data != null){
        //     return back()->with('error','Mfanyakazi Tayari yupo Tafadhali Ongeza Mwingine');
        //    }
        $date = Carbon::now();
        $validate = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' =>'required|digits_between:2,10',
            'address' => 'required',
            'gender'=>'required',


        ]);



        if ($validate->fails()){
            $messages = $validate->messages();
            return back()->with('error','error while inserting data');
         }


        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->updated_at=$date;
        $user->password = Hash::make("12345");
        $user->status=1;
        $user->save();
        $user->removeRole($user->roles->first()->name);
        $user->assignRole($request->input('roles'));

        return back()->with('message','information changed sucessful');
    }
    public function deleteUser($id){

        $user = User::where('id',$id)->delete();

        if ($user){
            return back()->with('message','User deleted successful');

        }

        return back()->with('error','Kuna Kosa wakati wa ufutaji wa mfanyakazi');


    }

    public function block(Request $request,$id){
        $user = User::find($id);
        if ($user->status == 1){
            $user->fill([
                'status' => 0
            ]);
        }
        else{
            $user->fill([
                'status' => 1
            ]);
        }



        $user->save();

        if ($user){
            return back()->with('message','User blocked successful');

        }

        return back()->with('error','Kuna Kosa wakati wa ufutaji wa mfanyakazi');


    }
    public function login(Request $request){
        $date = Carbon::now()->toDateTimeString();
        $user = User::where('email', '=' ,$request->email)->first();
        if ($user->status==0){
            return back()->with('error','Your account is Blocked consult the system admin');
           }
        $validate = Validator::make($request->all(),
        [
            'email' => 'required|email|unique:users,email',
            'password' =>'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
           $user = Auth::user();
           $user->last_login=$date;
           $user->save();


        //    dd($user->last_login);


            return redirect('/graphs')->with('message','login successful');
        }

        return back()->with('error','No information found in the databse');


    }
    public function logout(Request $request){

        Auth::logout();
        return redirect('/');
    }
    public function addRole(Request $request){
        $role = Role::create(['name' => $request->name]);

            $permissions = $request->permission;

            $role->syncPermissions($permissions);

            if ($role){
                return back()->with('message','sucessful');
            }
            return back()->with('error','error');
    }

    public function deleteRole(Request $request,$id){
        $role = Role::find($id);

           $role->delete();
            if ($role){
                return back()->with('message','successful');
            }
            return back()->with('error','error');
    }

    public function editRole(Request $request,$id){
        $role = Role::find($id);

        $role->update(['name' => $request->name]);

        $permissions = $request->permission;

        $role->syncPermissions($permissions);

        if ($role){
            return back()->with('message','sucessful');
        }
        return back()->with('error','error');
    }


    public function changepassword(Request $request){

        if(!(Hash::check($request->old, Auth::user()->password))){
                return back()->with('error','old password in wrong');
        }
        if($request->old == $request->new){
            return back()->with('error','new password match with new passwrd');
        }
        $validate = Validator::make($request->all(),[

            'old'=>'required',
            'new'=> 'required|string|min:8',
        ]);
        if ($validate->fails()){
            $messages = $validate->messages();
            return back()->with('error',$messages);
         }
        $user = Auth::user();
        $user->password = bcrypt($request->new);
        $user->save();
        if($user){
            Auth::logout();
            return redirect('/')->with('message','success');
        }

        }

        public function changeinfo(Request $request){

            $date = Carbon::now();
            $validate = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' =>'required|digits_between:2,10',
                'address' => 'required',
                'gender'=>'required',


            ]);



            if ($validate->fails()){
                $messages = $validate->messages();
                return back()->with('error','problem in inserting data');
             }


            $user = Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
            return back()->with('message','successul');

        }

}
