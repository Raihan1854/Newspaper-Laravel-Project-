<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Validator;
use App\Admin_panel_cat_news;
use App\Admin_Information_news_protal;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Role_user;
class Admin_panel_operation extends Controller
{


  //start  News_Operation
    public function News_data_entry(Request $request)
    {
        if(Auth::check()):
          $validator = Validator::make($request->all(),
           [
              'News_Subject' => 'required',
              'News_headline' => 'required',
              'Country_name'=>'required',
              'News_file' => 'required|image|mimes:jpeg,jpg,png,gif|required',
              'News'=>'required',
              'News_collection_source'=>'required'
            ]);

            $error_message=
            [
              'News_Subject.required' => 'Must Be Fill Up News Subject And Max Character 50!',
              'news_headline.required'=>'Must Be Fill Up News Headline',
              'news_country.required'=>'Select News Country Name',
              'news_file'=>'please Upload Jpg Or Png',
              'News'=>'Please Type You News',
              'news_coll_source'=>'Type News Source'
            ];

            if ($validator->fails())
            {
                return redirect('/Bangladesh')
                            ->withErrors($error_message)
                            ->withInput();
            }
            else
            {
              $flight = new Admin_Information_news_protal;
              $fileupload_path='Image/upload';
              $File_extension=$request->file('News_file')->getClientOriginalExtension();
              $file_name="$request->news_no"."."."$File_extension";
              $request->file('News_file')->move($fileupload_path,$file_name);
              $flight->news_subject =$request->news_no;
              $flight->news_subject =$request->News_Subject;
              $flight->news_category =$request->category_name;
              $flight->news_headline =$request->News_headline;
              $flight->news_country =$request->Country_name;
              $flight->news_zilla = $request->News_zilla;
              $flight->news_division = $request->Divison;
              $flight->news = $request->News;
              $flight->news_cov_jrn = $request->News_coverage_jurnalist_name;
              $flight->news_coll_source = $request->News_collection_source;
              $flight->news_aproval = 'pendding';
              $flight->news_selection = 'none';
              $flight->news_apr_uname = '';
              $flight->news_file = $File_extension;
              $flight->news_delete = 0;
              $flight->Date = Date('d:m:Y');
              $flight->Time = time();
              $flight->comment_count = 0;
              $flight->save();

              $Data =DB::select('SELECT MAX(news_no) FROM news_portal');
              $Information=$Data[0];
              foreach($Information as $Max_id)
              {$Max_id++;
              $object=new Admin_panel_cat_news;
              $Data_for_category=$object::where('enable_status','Enable')->get();
              return view('Admin_panel.Admin_panel_sub_page.All_news_add',["Message"=>"Insert Operation Succesfully","Max_id"=>$Max_id,'Category'=>$Data_for_category]);
              }
            }

        else:
              return redirect()->action('user_panel_operation@Index');
        endif;
    }






   public function view_news_operation_report(Request $request)
    {
      if(Auth::check()):


        $flight = new Admin_Information_news_protal;
        $Information=$flight->paginate(10);
        $object=new Admin_panel_cat_news;
        $Data_for_category=$object::where('enable_status','Enable')->get();
        return view('Admin_panel.All_Report.view_news_operation_report',['Data'=>$Information,'News_category'=>'All News','Category'=>$Data_for_category]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }



    public function Filter_report(Request $request)
    {
      if(Auth::check()):
          if($request->Filter_category=="All")
          {  $flight = new Admin_Information_news_protal;
                  $Information=$flight->paginate(10);
          }
          else
          {  $flight = new Admin_Information_news_protal;
                  $Information=$flight->where('news_category', "$request->Filter_category")->paginate(10);
          }
          $object=new Admin_panel_cat_news;
          $Data_for_category=$object::where('enable_status','Enable')->get();
          return view('Admin_panel.All_Report.view_news_operation_report',['Data'=>$Information,'News_category'=>'All News','Category'=>$Data_for_category]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }



    public function view_news_operation_report_delete(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_Information_news_protal;
        $DELETE_ID_GET_EXTENSION = $flight::where('news_no', $request->ID)->first();
        $File_extension= $DELETE_ID_GET_EXTENSION->news_file;
        $directory="Image/upload/$request->ID.$File_extension";
        unlink(public_path($directory));
        $deletedRows = $flight::where('news_no', $request->ID)->delete();
        return redirect()->action('Admin_panel_operation@view_news_operation_report');
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }


    public function view_news_operation_aproval(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_Information_news_protal;
        $Data_found = $flight::where('news_no', $request->ID)->first();
        $Data_get= $Data_found->news_aproval;
        if($Data_get=='pendding')
        {$flight::where('news_no', $request->ID)->update(['news_aproval' => 'aproved']);
        return redirect()->action('Admin_panel_operation@view_news_operation_report');
        }
        else
        {$flight::where('news_no', $request->ID)->update(['news_aproval' => 'pendding']);
        return redirect()->action('Admin_panel_operation@view_news_operation_report');
        }
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }

    public function view_news_operation_select(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_Information_news_protal;
        $Data_found = $flight::where('news_no', $request->ID)->first();
        $Data_get= $Data_found->news_selection;
        if($Data_get=='none')
        {$flight::where('news_no', $request->ID)->update(['news_selection' => 'selected']);
        return back()->withInput();
        }
        else
        {$flight::where('news_no', $request->ID)->update(['news_selection' => 'none']);
        return back()->withInput();
        }
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }

    public function view_news_operation_report_Edit(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_Information_news_protal;
        $Information_for_Edit = $flight::where('news_no', $request->ID)->first();

        $object=new Admin_panel_cat_news;
        $Data_for_category=$object::where('enable_status','Enable')->get();
        return view('Admin_panel.Admin_panel_sub_page.All_news_update',['Information_pass'=>$Information_for_Edit,"Category"=>$Data_for_category]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }

    public function News_data_update(Request $request)
    {
      if(Auth::check()):
            $flight = new Admin_Information_news_protal;
            $fileupload_path='Image/upload';
            $File_extension=$request->file('News_file')->getClientOriginalExtension();
            $file_name="$request->news_no"."."."$File_extension";
            $request->file('News_file')->move($fileupload_path,$file_name);
            $flight::where('news_no', $request->news_no)->update(['news_subject' =>$request->News_Subject,'news_category'=>$request->category_name,'news_headline'=>$request->News_headline,'news_country'=>$request->Country_name,'news_zilla'=>$request->News_zilla,'news_division'=>$request->Divison,'news'=>$request->News,'news_cov_jrn'=>$request->News_coverage_jurnalist_name,'news_coll_source'=>$request->News_collection_source,'news_file'=>$File_extension]);
            $flight = new Admin_Information_news_protal;
            $Information_for_Edit = $flight::where('news_no', $request->news_no)->first();
            $object=new Admin_panel_cat_news;
            $Data_for_category=$object::where('enable_status','Enable')->get();
            return view('Admin_panel.Admin_panel_sub_page.All_news_update',['Information_pass'=>$Information_for_Edit,'Message'=>'Data Update','Category'=>$Data_for_category]);
        else:
          return redirect()->action('user_panel_operation@Index');
        endif;


    }

  //end BD_News_Operation

//start  Category_operation
public function Category_news_Data_entry(Request $request)
    {
      if(Auth::check()):
            $validator = Validator::make($request->all(), ['cat_name' => 'required']);
            $error_message =['cat_name' => 'Category Name Is Must Be Fill Up'];
            if ($validator->passes())
            {
                     $flight = new Admin_panel_cat_news;
                      $flight->cat_id = $request->cat_id;
                      $flight->news_category =$request->cat_name;
                      $flight->cat_short_desprition =$request->short_description;
                      $flight->enable_status ='Enable';
                      $flight->save();
                      $Data =DB::select('SELECT MAX(cat_id) FROM category_news');
                      $Information=$Data[0];
                      foreach($Information as $Max_id)
                      {
                        $Max_id++;
                        return view('Admin_panel.Admin_panel_sub_page.News_category',["Message"=>"Insert Operation Succesfully","Max_id"=>$Max_id]);
                      }
              }
              else
              {
                    return redirect('/Cat_regestration')->withErrors($error_message)->withInput();
              }
          else:
              return redirect()->action('user_panel_operation@Index');
          endif;


    }


    public function View_category_report(Request $request)
    {
      if(Auth::check()):
        // $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
        // ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
        // ->where('role_user.Name',Auth::user()->name)
        // ->get();

          $flight = new Admin_panel_cat_news;
          $Information=$flight->paginate(10);
          return view('Admin_panel.All_Report.view_category_report',["Data"=>$Information,"News_category"=>"News Category"]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }


    public function view_category_operation_enable(Request $request)
    {
      if(Auth::check()):
            $flight = new Admin_panel_cat_news;
            $Data_found = $flight::where('cat_id', $request->ID)->first();
            $Data_get= $Data_found->enable_status;
            if($Data_get=='Enable')
            {
                $flight::where('cat_id', $request->ID)->update(['enable_status' => 'Disable']);
                return redirect()->action('Admin_panel_operation@View_category_report');
            }
            else
            {
                $flight::where('cat_id', $request->ID)->update(['enable_status' => 'Enable']);
                return redirect()->action('Admin_panel_operation@View_category_report');
            }
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;

    }

    public function view_category_operation_delete(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_panel_cat_news;
        $DELETE_ID_GET_EXTENSION = $flight::where('cat_id', $request->ID)->first();
        $deletedRows = $flight::where('cat_id', $request->ID)->delete();
        return redirect()->action('Admin_panel_operation@View_category_report');
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }


    public function view_category_operation_report_Edit(Request $request)
    {
      if(Auth::check()):
        $flight = new Admin_panel_cat_news;
        $Information_for_Edit = $flight::where('cat_id', $request->ID)->first();
        return view('Admin_panel.Admin_panel_sub_page.News_category_information_update',['Information_pass'=>$Information_for_Edit]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }

    public function Category_news_Data_update(Request $request)
    {
      if(Auth::check()):
            $flight = new Admin_panel_cat_news;
            $flight::where('cat_id', $request->cat_id)->update(['cat_name' => $request->cat_name,'cat_short_desprition'=>$request->short_description]);
            $flight = new Admin_panel_cat_news;
            $Data_found = $flight::where('cat_id', $request->cat_id)->first();
            $Information_for_Edit=$Data_found;
            return view('Admin_panel.Admin_panel_sub_page.News_category_information_update',['Information_pass'=>$Information_for_Edit,'Message'=>'Data Update']);
        else:
          return redirect()->action('user_panel_operation@Index');
        endif;
    }

    public function Comment_report()
    {
      if(Auth::check()):
        // $Information_for_Role_USER=Role_user::join("permission_role","role_user.role_name","=","permission_role.role_name")
        // ->select('role_user.Name','permission_role.role_name','permission_role.permission_name')
        // ->where('role_user.Name',Auth::user()->name)
        // ->get();

        $All_comment_information=Comment::find(1)->join('news_portal', 'news_portal.news_no', '=', 'news_comment.news_no')->get();
        return view('Admin_panel.All_Report.All_comment_report',["All_comment_information"=>$All_comment_information]);
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }

    public function Comment_aproval(Request $resuest)
    {
      if(Auth::check()):
        $flight = new Comment;
        $Data_found = $flight::where('unique_code', $resuest->Comment_id)->first();
        $Data_get= $Data_found->aproval;
        if($Data_get=='pendding')
        {$flight::where('unique_code', $resuest->Comment_id)->update(['aproval' => 'aproved']);
        return back()->withInput();
        }
        else
        {$flight::where('unique_code', $resuest->Comment_id)->update(['aproval' => 'aproved']);
        return back()->withInput();
        }
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;

    }

    public function Comment_Delete(Request $request)
    {
      if(Auth::check()):
        $flight = new Comment;

        $deletedRows = $flight::where('unique_code', $request->id)->delete();
        return back()->withInput();
      else:
        return redirect()->action('user_panel_operation@Index');
      endif;
    }
    //End  Category_operation



}
