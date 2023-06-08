<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    //
    public function register (Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%@]).*$/'],
            'lName' =>['required', 'string', 'max:255'],
            'about'=>['required', 'string'],
            'phone'=>['required', 'numeric', 'unique:users'],
            'age'=>['required', 'string'],
            'role'=>['required', 'string'],
            'gender'=>['required', 'string']

        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->lName = $request->lName;
        $user->about = $request->about;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->role = $request->role;
        $user->gender = $request->gender;

        $user->save();
        $token=$user->createToken('registertoken')->plainTextToken;

        return response ([
            'user'=>$user,
            'token'=>$token,
            'message'=> 'You have successfully Registered'

        ]);

    }
    public function login(Request $request) {
        $request->validate([

            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%@]).*$/'],
        ]);
        //check email and password
        $user=User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password)) {
            return response('invalid credentials',401);
        }
        $token=$user->createToken('logintoken')->plainTextToken;
        return response ([
            'user'=>$user,
            'token'=>$token,
            'message'=> 'Login successfull'

        ]);
    }
    public function update(string $id, Request $request)
    {
        $user = User::findorFail($id);
        $request->validate([

        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->lName = $request->lName;
        $user->about = $request->about;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->gender = $request->gender;

        $user->update();
        return "You have Successfylly Updated Your Details";
    }
    public function logout(Request $request) {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        return response()->json(['message' => 'Logout successful'], 200);
    }
    // public function logout () {
    //     Auth::user()->tokens()->delete();
    //     return "User logged out";
    // }
    public function show($id)
    {
        $user = User::findorFail($id);
        return $user;
    }

}
