<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormResource;
use App\Http\Resources\FormsResource;
use App\Models\Form;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class FormController extends Controller
{
    public function create(Request $req){
        try{
            $validated =  Validator::make($req->all(), [            
                "firstName"=>['required', 'string','max:300'],
                "lastName"=>['required', 'string','max:300'],
                "fatherName"=>['required', 'string','max:300'],
                "motherName"=>['required', 'string','max:300'],
                "iss"=>['required', 'string','regex:/^[0-9]{11}$/'],
                "birthDate"=>['required', 'string','max:255'],
                "birthDateArea"=>['required', 'string','max:500'],
                "joinType"=>['required', 'string','max:600'],
            ]);
            if ($validated->fails()) {
                return redirect()->route('index')
                    ->withErrors($validated)
                    ->withInput();
            }
            $newForm=new Form();
            $newForm->firstName=$req->firstName;
            $newForm->lastName=$req->lastName;
            $newForm->fatherName=$req->fatherName;
            $newForm->motherName=$req->motherName;
            $newForm->iss=$req->iss;
            $newForm->birthDate=$req->birthDate;
            $newForm->birthDateArea=$req->birthDateArea;
            $newForm->joinType=$req->joinType;
            $newForm->user_id=auth()->user()->id;
            $newForm->save();
            session(['created' => true]);
            return redirect()->route('index') ?? "there are something wrong";
        }catch(Exception $err){
            return response()->json(["message"=>"there are something wrong"],500);
        }
    }
    public function getMyForms(){
        try{
            $myForms=FormResource::collection(auth()->user()->forms()->paginate(10));
            return view('app.myForms',['myForms'=>$myForms]);
         }catch(Exception $err){
             return response()->json(["message"=>$err->getMessage()],500);
         } 
    }
    public function formUpdate(Request $req){
        try{
            $form=Form::find($req->form);
            if(!$form)
                return response()->json(["message"=>'this form not found'],404);
            if($form->status!='إنتظار')
               return response()->json(["message"=>'this form not found'],404);
             $form->status=$req->status;
             $form->save();
             return redirect()->route('form.wait');
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
    public function formTrue(){
        try{
            $formType="اللإستمارات المقبولة";
            $Forms=FormsResource::collection(Form::where('status','مقبول')->orderBy('id', 'desc')->paginate(10));
            return view('app.forms',['formType'=>$formType,'forms'=>$Forms]);
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
    public function formFalse(){
        try{
            $formType="اللإستمارات المرفوضة";
            $Forms=FormsResource::collection(Form::where('status','مرفوض')->orderBy('id', 'desc')->paginate(10));
            return view('app.forms',['formType'=>$formType,'forms'=>$Forms]);
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
    public function formWait(){
        try{
            $formType="اللإستمارات قيد الإنتظار";
            $Forms=FormsResource::collection(Form::where('status','إنتظار')->paginate(10));
            return view('app.forms',['formType'=>$formType,'forms'=>$Forms]);
        } catch(Exception $err){
           return response()->json(['message'=>$err->getMessage(),500]);
        }
    }
}
