<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Admin_panel_cat_news;
use Illuminate\Support\Facades\Auth;
use App\Login_model;
use App\Role_user;
class Admin_Panel_Control extends Controller
{
    public function Index(Request $request)
    {
      if(\Auth::check())
      {

        $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
        ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
        ->where('role_user.Name',Auth::user()->name)
        ->get();


          $request->session()->put('key',$Information_for_Role_USER);

        return view('Admin_panel.index',["Information_for_Role_USER"=>$Information_for_Role_USER]);
      }
      else
      {
          return redirect()->action('user_panel_operation@Index');
      }
    }

    public function Bangladesh()
    {
      // $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
      // ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
      // ->where('role_user.Name',Auth::user()->name)
      // ->get();


      $Data =DB::select('SELECT MAX(news_no) FROM news_portal');
        $Information=$Data[0];
        $object=new Admin_panel_cat_news;
        $Data_for_category=$object::where('enable_status','Enable')->get();
            foreach($Information as $Max_id)
            {
                $Max_id++;
                return view('Admin_panel.Admin_panel_sub_page.All_news_add',['Category'=>$Data_for_category,"Max_id"=>$Max_id]);
            }


    }

    public function Cat_regestration()
    {
        if(Auth::check())
        {
          // $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
          // ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
          // ->where('role_user.Name',Auth::user()->name)
          // ->get();

              $Data =DB::select('SELECT MAX(cat_id) FROM category_news');
              $Information=$Data[0];
              foreach($Information as $Max_id)
              {
                $Max_id++;
                return view('Admin_panel.Admin_panel_sub_page.News_category',["Max_id"=>$Max_id]);
              }
        }
        else
        {
          return redirect()->action('user_panel_operation@Index');
        }



    }

    public function Question()
    {
        if(Auth::check())
        {

          return view('Admin_panel.Admin_panel_sub_page.vote');
        }
        else
        {
          return redirect()->action('user_panel_operation@Index');
        }
    }

    public function Admin_register_page_show()
    {
      if(Auth::check())
      {
        $All_information_user=Login_model::all();

        return view('Admin_panel.Admin_panel_sub_page.register',["User_Information"=>$All_information_user]);
      }
      else {
        return redirect()->action('user_panel_operation@Index');
      }

    }



}
