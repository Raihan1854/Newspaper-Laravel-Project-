<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\RBAC_PERMISSION;
use App\RBAC_ROLE;
use App\User;
use App\RBAC_PERMISSION_ROLE;
use App\Role_user;

class RBAC extends Controller
{
    public function permission()
    {
        $All_permission=RBAC_PERMISSION::all();

       return view ('Admin_panel.Admin_panel_sub_page.Permission',["All_permission"=>$All_permission]);
    }

    public function Create_Role_show()
    {
      $Role_show=RBAC_ROLE::all();
      return view('Admin_panel.Admin_panel_sub_page.Create_role',["Role_show"=>$Role_show]);
    }
    public function Permission_role_page()
    {
      $ALL_ROLE=RBAC_ROLE::all();
      $ALL_ROLE_POWER=RBAC_PERMISSION::all();

      $After_role_add_information=RBAC_PERMISSION_ROLE::select('role_name')->groupby('role_name')->get();

   return view('Admin_panel.Admin_panel_sub_page.Add_role_permission',["Role"=>$ALL_ROLE,"ALL_ROLE_POWER"=>$ALL_ROLE_POWER,"After_add_role_Data"=>$After_role_add_information]);
    }
    public function User_access_page()
    {
      $Find_user=User::select('name')->where('status',"Active")->get();
      $Find_Role=RBAC_PERMISSION_ROLE::select('role_name')->groupby('role_name')->get();


      $ALL_user_role=Role_user::all();
      return view ('Admin_panel.Admin_panel_sub_page.User_access_page',["User"=>$Find_user,"User_Role"=>$Find_Role,'ALL_user_role'=>$ALL_user_role]);
    }



    public function Create_Role(Request $request)
    {
      $Cretae_boject=new RBAC_ROLE;
      $Cretae_boject->name=$request->Name;
      $Cretae_boject->display_name=$request->Name;
      $Cretae_boject->description=$request->Discription;
      $Cretae_boject->Role_creator=Auth::user()->name;
      $Cretae_boject->save();
      return back()->withInput();

    }

    public function Role_edit(Request $request)
    {
        $Role_edit_information=RBAC_ROLE::where('id',$request->ID)->first();
        return view ('Admin_panel.Admin_panel_sub_page.create_role_update',["Role_edit_information"=>$Role_edit_information]);

    }
    public function Create_role_update(Request $request)
    {
      RBAC_ROLE::where('id',$request->ID)->update(["name"=>$request->Name,"display_name"=>$request->Name,"description"=>$request->Discription]);
      return back()->withInput();
    }
    public function Role_delete(Request $request)
    {
        RBAC_ROLE::where('id',$request->ID)->delete();
        return back()->withInput();
    }

    public function Role_configuration(Request $request)
    {
      if(Auth::check()):

        $keys =$request->Role_power;
        $a = array_fill_keys($keys, $request->Role_ID);
        $Count_total_array=count($a);
        $get_aray_keys=array_keys($a);
        for($i=0;$i<$Count_total_array;$i++)
        {
          $object=new RBAC_PERMISSION_ROLE;
          $object->role_name=$a[$get_aray_keys[$i]];
        //  echo $object->role_id=$a[$get_aray_keys[$i]];
          $object->permission_name=$get_aray_keys[$i];
          //echo $object->permission_id=$get_aray_keys[$i];
          $object->save();
        }
        return back()->withInput();
      else:
          return redirect()->action('user_panel_operation@Index');
      endif;


    }

    public function Show_permission_role(Request $request)
    {
      if(Auth::check())
      {
        $All_information_name_based=RBAC_PERMISSION_ROLE::where('role_name',$request->Role_name)->get();

        $All_permission_information=RBAC_PERMISSION::all();
        //echo "<pre>";
      // print_r($All_role_information);
      return view('Admin_panel.Admin_panel_sub_page.permission_role_Remove',["Role_power"=>$All_information_name_based,"Role_name"=>$request->Role_name,"All_permission_information"=>$All_permission_information]);
      }
      else
      {
        return redirect()->action('user_panel_operation@Index');
      }
    }

    public function Add_New_Role(Request $request)
    {
        $Keys=$request->Role_power;
        echo "<pre>";
        $a=array_fill_keys($Keys,$request->Role_name);
        $Count_field=count($a);
        for($i=0;$i<$Count_field;$i++)
        {
            $GET_KEYS=array_keys($a);

            if($CHECK_ROLE=RBAC_PERMISSION_ROLE::where('permission_name',$GET_KEYS[$i])->where('role_name',$a[$GET_KEYS[$i]])->get()->toArray() )
            {
                echo "This Aleady Exist";
            }
            else {
              $object=new RBAC_PERMISSION_ROLE;
              $object->role_name=$a[$GET_KEYS[$i]];
            //  echo $object->role_id=$a[$get_aray_keys[$i]];
              $object->permission_name=$GET_KEYS[$i];
              //echo $object->permission_id=$get_aray_keys[$i];
              $object->save();
            }
        }
        return back()->withInput();
    }

    public function Role_remove(Request $request)
    {
      if(Auth::check())
      {
        $Keys=$request->Role_power;
        echo "<pre>";
        $a=array_fill_keys($Keys,$request->Role_name);
        $Count_field=count($a);
        for($i=0;$i<$Count_field;$i++)
        {
            $GET_KEYS=array_keys($a);


              $object=new RBAC_PERMISSION_ROLE;
              RBAC_PERMISSION_ROLE::where('role_name',$a[$GET_KEYS[$i]])->where('permission_name',$GET_KEYS[$i])->delete();


        }
        return back()->withInput();
      }
      else {
          return redirect()->action('user_panel_operation@Index');
      }
    }

    public function User_permission_set(Request $request)
    {
      if(Auth::check())
      {

        //   $Find_user=User::select('name')->where('status',"Active")->get();
        //   $Find_Role=RBAC_PERMISSION_ROLE::select('role_name')->groupby('role_name')->get();
        //   return view('Admin_panel.Admin_panel_sub_page.User_access_page',["Message"=>"This User Already Exist","User"=>$Find_user,"User_Role"=>$Find_Role]);
        // }

          $Create_Object=new Role_user;
          $Create_Object->Name=$request->User_name;
          $Create_Object->role_name=$request->User_role;
          $Create_Object->save();
          return back()->withInput();



      }
      else {
        return redirect()->action('user_panel_operation@Index');
      }
    }

    public function Show_User_role_permission(Request $request)
    {
      // $Information_for_Role_USER= RBAC_PERMISSION_ROLE::
      // join('permission_role','permission_role.role_name','=','role_user.role_name')
      // ->select('permission_role.role_name','role_user.role_name')
      // ->where('role_user.Name',"Hasan")
      // ->get();

      $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
      ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
      ->where('role_user.Name',$request->User_name)
      ->get();

      return view('Admin_panel.Admin_panel_sub_page.Show_for_user_permission_role_wise',["User_permission"=>$Information_for_Role_USER]);

    }

    public function Delete_User_role_permission(Request $request)
    {
        Role_user::where('Name',$request->User_name)->delete();
        return back()->withInput();
    }
}
