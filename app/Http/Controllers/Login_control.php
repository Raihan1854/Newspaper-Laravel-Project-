<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Login_model;
use App\Role_user;
use Illuminate\Support\Facades\Auth;
class Login_control extends Controller
{


  public function System_vailidation(Request $request)
  {


      if (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'status'=>"Active"]))
      {
         // Authentication passed...
         $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
         ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
         ->where('role_user.Name',Auth::user()->name)
         ->get();


           $request->session()->put('key',$Information_for_Role_USER);

         return view('Admin_panel.index');
       }
       else {
         return back()->withInput();
       }
 }

   public function Admin_register(Request $request)
   {
     if(Auth::check())
     {
           $Create_object=new Login_model;
           $Create_object->name=$request->name;
           $Create_object->email=$request->email;
           $Create_object->password=bcrypt($request->password);
           $Create_object->remember_token=$request->Token;
           $Create_object->status="Active";
           $Create_object->save();
           $All_information_user=Login_model::all();
           return view('Admin_panel.Admin_panel_sub_page.register',["User_Information"=>$All_information_user]);
      }
      else
      {
        return redirect()->action('user_panel_operation@Index');
      }

   }
   public function Status_update(Request $request)
   {
     if(Auth::check())
     {
       $Status_get=Login_model::where('id',$request->ID)->select('status')->first();
       if($Status_get->status=="Active")
         {
            Login_model::where('id',$request->ID)->update(['status'=>"Deactive"]);
         }
         else
         {
           Login_model::where('id',$request->ID)->update(['status'=>"Active"]);
         }
         return back()->withInput();
     }
     else
     {
       return redirect()->action('user_panel_operation@Index');
     }
   }

   public function User_profile_edit(Request $request)
   {
       if(Auth::check())
       {
          $EDIT_INFORMATION=Login_model::where('id',$request->ID)->first();
          $All_information_user=Login_model::all();

          return view('Admin_panel.Admin_panel_sub_page.Update_user',["EDIT_INFORMATION"=>$EDIT_INFORMATION,"User_Information"=>$All_information_user]);
       }
       else
       {
         return redirect()->action('user_panel_operation@Index');
       }
   }

   public function Admin_information_update(Request $request)
    {
        if(Auth::check())
        {
          Login_model::where('id',$request->ID)->update(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password)]);
          return back()->withInput();
        }
        else
        {
            return redirect()->action('user_panel_operation@Index');
        }
     }

     public function user_delete(Request $request)
     {
       Login_model::where('id',$request->ID)->delete();
       return back()->withInput();
     }
}
