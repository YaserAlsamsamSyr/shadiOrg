<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function index(){
        return view('index') ?? "there are something wrong";
    }
    public function getUsers(){
        try{
            $formType="حسابات المستخدمين";
            $users=UserResource::collection(User::where('role','!=','addmin*')->orderBy('id', 'desc')->paginate(10));
            return view('app.users',['formType'=>$formType,'users'=>$users]);
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
    public function userUpdatePassword(Request $req){
        try{
            session(['id' => $req->user]);
            $validated =  Validator::make($req->all(), [
                'password' => ['required', Rules\Password::defaults()],
            ]);
            if ($validated->fails()) {
                return redirect()->route('users')
                    ->withErrors($validated)
                    ->withInput();
            }
            $user=User::find($req->user);
            if(!$user)
                return response()->json(['message'=>'there are something wrong',422]);
            $user->password= Hash::make($req->password);
            $user->save();
            session(['repassword' => true]);
            return redirect()->route('users');
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
}
