<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Admin_Information_news_protal;
use App\Admin_panel_cat_news;
use App\user_regestration;
use App\vote;
use App\Comment;
class user_panel_operation extends Controller
{
  public function error()
  {
      return view('errors.404');

  }
    public function Index()
    {
        $create_object=new Admin_Information_news_protal;

        $Breaking_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(8)->get();
        $Front_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->first();
        $update_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(20)->get();
        $Category_object=new Admin_panel_cat_news();
        $Category=$Category_object::where('enable_status','Enable')->get();


        $Category_get_for_news=$Category_object::orderBy(DB::raw('RAND()'))->where('enable_status','Enable')->first();

        $Backend_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
             ->where('news_portal.news_category',$Category_get_for_news->news_category)
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->get();


            $Different_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->orderBy(DB::raw('RAND()'))
                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(20)
                ->paginate(4);




        $All_recent_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(17)
            ->get();

        $All_selected_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_selection','selected')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(8)
            ->get();

        $All_recent_tabbed_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(8)
            ->get();

            $Backend_news_bottom_list= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->take(2)->skip(2)
                ->get();

                $Backend_news_left_list= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->where('news_portal.news_category',$Category_get_for_news->news_category)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->take(1)->skip(4)
                    ->first();
              $Backend_footer_news= $Category_object::find(1)
                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                         ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                         ->where('news_portal.news_category',$Category_get_for_news->news_category)
                        ->where('category_news.enable_status','Enable')
                        ->where('news_portal.news_aproval','aproved')
                        ->orderBy('Time', 'DESC')
                        ->take(1)->skip(1)
                        ->first();

            $Backend_footer_news_bottom= $Category_object::find(1)
                             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                             ->where('news_portal.news_category',$Category_get_for_news->news_category)
                            ->where('category_news.enable_status','Enable')
                            ->where('news_portal.news_aproval','aproved')
                            ->orderBy('Time', 'DESC')
                            ->limit(4)
                            ->get();
$Category_get_for_news_footer_right_news=$Category_object::all()->where('enable_status','Enable')->last();
                            $Rajniti_news= $Category_object::find(1)
                                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                 ->select('news_portal.*', 'news_portal.news_country')
                                 ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                                ->where('category_news.enable_status','Enable')
                                ->where('news_portal.news_aproval','aproved')
                                ->orderBy('Time', 'DESC')
                                ->limit(2)
                                ->get();

                                $More_content_news= $Category_object::find(1)
                                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                     ->select('news_portal.*', 'news_portal.news_country')
                                     ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                                    ->where('category_news.enable_status','Enable')
                                    ->where('news_portal.news_aproval','aproved')
                                    ->orderBy('Time', 'DESC')
                                    ->take(2)->skip(1)
                                    ->get();





      $Day_question=vote::orderBy('Time', 'DESC')->first();

        $Comment_base_news=$Category_object::find(1)
           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
           ->select('news_portal.*', 'news_portal.news_country')
          ->where('category_news.enable_status','Enable')
          ->where('news_portal.news_aproval','aproved')
          ->orderBy('comment_count', 'DESC')
          ->orderBy('Time', 'DESC')
          ->limit(8)
          ->get();

          $View_news_subject=Admin_Information_news_protal::select('news_subject')->groupby('news_subject')->get();


return view('user_panel_child_page.Home',["View_news_subject"=>$View_news_subject,"Comment_base_news"=>$Comment_base_news,"More_content_news"=>$More_content_news,"Backend_footer_news_bottom"=>$Backend_footer_news_bottom,"Backend_news_footer"=>$Backend_footer_news,"Backend_news_left"=>$Backend_news_left_list,"Backend_news_bottom"=>$Backend_news_bottom_list,"Different_news"=>$Different_news,"Category"=>$Category,"Breaking_news"=>$Breaking_news,"Front_news"=>$Front_news,'Update_news'=>$update_news,"Backend_news"=>$Backend_news,"Rajniti"=>$Rajniti_news,"All_recent"=>$All_recent_news,"Day_question"=>$Day_question,"selected_news"=>$All_selected_news,"Tabbed_recent_news"=>$All_recent_tabbed_news]);
}

    public function Category_base_news(Request $request)
    {
        $Category_name=$request->Category_name;

        $create_object=new Admin_Information_news_protal;

        $Breaking_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(8)->get();
        $Front_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->first();
        $update_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->limit(7)->get();
        $Category_object=new Admin_panel_cat_news();
        $Category=$Category_object::where('enable_status','Enable')->get();


        $Category_get_for_news=$Category_object::orderBy(DB::raw('RAND()'))->where('enable_status','Enable')->first();

        $Backend_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
             ->where('news_portal.news_category',$Category_name)
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->get();


            $Different_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->orderBy(DB::raw('RAND()'))
                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(20)
                ->paginate(4);




        $All_recent_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(17)
            ->get();

        $All_selected_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_selection','selected')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(8)
            ->get();

        $All_recent_tabbed_news= $Category_object::find(1)
             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
             ->select('news_portal.*', 'news_portal.news_country')
            ->where('category_news.enable_status','Enable')
            ->where('news_portal.news_aproval','aproved')
            ->orderBy('Time', 'DESC')
            ->limit(8)
            ->get();

            $Backend_news_bottom_list= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->where('news_portal.news_category',$Category_name)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->take(2)->skip(2)
                ->get();

                $Backend_news_left_list= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->where('news_portal.news_category',$Category_name)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->take(1)->skip(4)
                    ->first();
              $Backend_footer_news= $Category_object::find(1)
                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                         ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                         ->where('news_portal.news_category',$Category_name)
                        ->where('category_news.enable_status','Enable')
                        ->where('news_portal.news_aproval','aproved')
                        ->orderBy('Time', 'DESC')
                        ->take(1)->skip(1)
                        ->first();

            $Backend_footer_news_bottom= $Category_object::find(1)
                             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                             ->where('news_portal.news_category',$Category_name)
                            ->where('category_news.enable_status','Enable')
                            ->where('news_portal.news_aproval','aproved')
                            ->orderBy('Time', 'DESC')
                            ->limit(4)
                            ->get();
            $Category_get_for_news_footer_right_news=$Category_object::all()->where('enable_status','Enable')->last();
                            $Rajniti_news= $Category_object::find(1)
                                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                 ->select('news_portal.*', 'news_portal.news_country')
                                 ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                                ->where('category_news.enable_status','Enable')
                                ->where('news_portal.news_aproval','aproved')
                                ->orderBy('Time', 'DESC')
                                ->limit(2)
                                ->get();


                                $Comment_base_news=$Category_object::find(1)
                                   ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                   ->select('news_portal.*', 'news_portal.news_country')
                                  ->where('category_news.enable_status','Enable')
                                  ->where('news_portal.news_aproval','aproved')
                                  ->orderBy('comment_count', 'DESC')
                                  ->orderBy('Time', 'DESC')
                                  ->limit(8)
                                  ->get();


      $View_news_subject=Admin_Information_news_protal::select('news_subject')->groupby('news_subject')->get();
        $Day_question=vote::orderBy('Time', 'DESC')->first();

    return view('user_panel_child_page.category_base_news',["View_news_subject"=>$View_news_subject,"Comment_base_news"=>$Comment_base_news,"Backend_footer_news_bottom"=>$Backend_footer_news_bottom,"Backend_news_footer"=>$Backend_footer_news,"Backend_news_left"=>$Backend_news_left_list,"Backend_news_bottom"=>$Backend_news_bottom_list,"Different_news"=>$Different_news,"Category"=>$Category,"Breaking_news"=>$Breaking_news,"Front_news"=>$Front_news,'Update_news'=>$update_news,"Backend_news"=>$Backend_news,"Rajniti"=>$Rajniti_news,"All_recent"=>$All_recent_news,"Day_question"=>$Day_question,"selected_news"=>$All_selected_news,"Tabbed_recent_news"=>$All_recent_tabbed_news]);





    }


    public function New_acaount_regestration(Request $request)
    {
        $Create_object=new user_regestration;


        $Create_object->user_name=$request->user_name;
        $Create_object->email=$request->email;
        $Create_object->password=$request->password;
        $Create_object->login_status='Logout';
        $Create_object->last_activity=date('d:m:Y');
        $Create_object->session='11';
        $Create_object->save();
        return back()->withInput();

    }




    public function Day_question(Request $request)
    {
        if($request->vote=="Yes")
        {
           $Object= vote::where('Question_id',$request->ID)->get();


            $Max_yes_vote=$Object[0]->Yes;
            $Max_yes_vote++;
            vote::where('Question_id',$request->ID)->update(['Yes' =>$Max_yes_vote]);
            return back()->withInput();
        }
        else
        {
            $Object= vote::where('Question_id',$request->ID)->get();

            $Max_No_vote=$Object[0]->No;
            $Max_No_vote++;
            vote::where('Question_id',$request->ID)->update(['No' =>$Max_No_vote]);
            return back()->withInput();
        }



    }

    public function Question_add(Request $request)
    {
        $object=new vote;
        $object->Question=$request->question;
        $object->Yes=0;
        $object->No=0;

        $object->Time=time();
        $object->save();

        return back()->withInput();
    }

    public function Show_single_News(Request $request)
    {

      $create_object=new Admin_Information_news_protal;
       $Category_name=$request->Category_name;
      $Breaking_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(8)->get();
      $Front_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->first();
      $update_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->limit(7)->get();
      $Category_object=new Admin_panel_cat_news();
      $Category=$Category_object::where('enable_status','Enable')->get();


      $Category_get_for_news=$Category_object::orderBy(DB::raw('RAND()'))->where('enable_status','Enable')->first();

      $Backend_news= $Category_object::find(1)
           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
           ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
           ->where('news_portal.news_category',$Category_name)
          ->where('category_news.enable_status','Enable')
          ->where('news_portal.news_aproval','aproved')
          ->orderBy('Time', 'DESC')
          ->get();


          $Different_news= $Category_object::find(1)
               ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
               ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
               ->orderBy(DB::raw('RAND()'))
               ->where('news_portal.news_category',$Category_get_for_news->news_category)
              ->where('category_news.enable_status','Enable')
              ->where('news_portal.news_aproval','aproved')
              ->orderBy('Time', 'DESC')
              ->limit(20)
              ->paginate(4);




      $All_recent_news= $Category_object::find(1)
           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
           ->select('news_portal.*', 'news_portal.news_country')
          ->where('category_news.enable_status','Enable')
          ->where('news_portal.news_aproval','aproved')
          ->orderBy('Time', 'DESC')
          ->limit(17)
          ->get();

      $All_selected_news= $Category_object::find(1)
           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
           ->select('news_portal.*', 'news_portal.news_country')
          ->where('category_news.enable_status','Enable')
          ->where('news_portal.news_selection','selected')
          ->where('news_portal.news_aproval','aproved')
          ->orderBy('Time', 'DESC')
          ->limit(8)
          ->get();

      $All_recent_tabbed_news= $Category_object::find(1)
           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
           ->select('news_portal.*', 'news_portal.news_country')
          ->where('category_news.enable_status','Enable')
          ->where('news_portal.news_aproval','aproved')
          ->orderBy('Time', 'DESC')
          ->limit(8)
          ->get();

          $Backend_news_bottom_list= $Category_object::find(1)
               ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
               ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
               ->where('news_portal.news_category',$Category_name)
              ->where('category_news.enable_status','Enable')
              ->where('news_portal.news_aproval','aproved')
              ->orderBy('Time', 'DESC')
              ->take(2)->skip(2)
              ->get();

              $Backend_news_left_list= $Category_object::find(1)
                   ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                   ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                   ->where('news_portal.news_category',$Category_name)
                  ->where('category_news.enable_status','Enable')
                  ->where('news_portal.news_aproval','aproved')
                  ->orderBy('Time', 'DESC')
                  ->take(1)->skip(4)
                  ->first();
            $Backend_footer_news= $Category_object::find(1)
                       ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                       ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                       ->where('news_portal.news_category',$Category_name)
                      ->where('category_news.enable_status','Enable')
                      ->where('news_portal.news_aproval','aproved')
                      ->orderBy('Time', 'DESC')
                      ->take(1)->skip(1)
                      ->first();

          $Backend_footer_news_bottom= $Category_object::find(1)
                           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                           ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                           ->where('news_portal.news_category',$Category_name)
                          ->where('category_news.enable_status','Enable')
                          ->where('news_portal.news_aproval','aproved')
                          ->orderBy('Time', 'DESC')
                          ->limit(4)
                          ->get();
      $Category_get_for_news_footer_right_news=$Category_object::all()->where('enable_status','Enable')->last();
                          $Rajniti_news= $Category_object::find(1)
                               ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                               ->select('news_portal.*', 'news_portal.news_country')
                               ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                              ->where('category_news.enable_status','Enable')
                              ->where('news_portal.news_aproval','aproved')
                              ->orderBy('Time', 'DESC')
                              ->limit(2)
                              ->get();


                              $Comment_base_news=$Category_object::find(1)
                                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                 ->select('news_portal.*', 'news_portal.news_country')
                                ->where('category_news.enable_status','Enable')
                                ->where('news_portal.news_aproval','aproved')
                                ->orderBy('comment_count', 'DESC')
                                ->orderBy('Time', 'DESC')
                                ->limit(8)
                                ->get();


      $Day_question=vote::orderBy('Time', 'DESC')->first();
      $News_protal=new Admin_Information_news_protal;
      $Single_news=$News_protal::where('news_no',$request->ID)->first();

      $Single_news_comment=Comment::where('news_no',$request->ID)->where('aproval','aproved')->get();
      $View_news_subject=Admin_Information_news_protal::select('news_subject')->groupby('news_subject')->get();
      //echo "<pre>";
      //print_r($Single_news_comment);
      return view('user_panel_child_page.Single_news',["View_news_subject"=>$View_news_subject,"Single_news_comment"=>$Single_news_comment,"Comment_base_news"=>$Comment_base_news,"Single_news"=>$Single_news,"Backend_footer_news_bottom"=>$Backend_footer_news_bottom,"Backend_news_footer"=>$Backend_footer_news,"Backend_news_left"=>$Backend_news_left_list,"Backend_news_bottom"=>$Backend_news_bottom_list,"Different_news"=>$Different_news,"Category"=>$Category,"Breaking_news"=>$Breaking_news,"Front_news"=>$Front_news,'Update_news'=>$update_news,"Backend_news"=>$Backend_news,"Rajniti"=>$Rajniti_news,"All_recent"=>$All_recent_news,"Day_question"=>$Day_question,"selected_news"=>$All_selected_news,"Tabbed_recent_news"=>$All_recent_tabbed_news]);


    }

    public function More_news(Request $request)
    {

            $create_object=new Admin_Information_news_protal;
             $Category_name=$request->Category_name;
            $Breaking_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(8)->get();
            $Front_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->first();

            $Category_object=new Admin_panel_cat_news();
            $Category=$Category_object::where('enable_status','Enable')->get();


            $Category_get_for_news=$Category_object::orderBy(DB::raw('RAND()'))->where('enable_status','Enable')->first();

            $Backend_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->get();


                $Different_news= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->orderBy(DB::raw('RAND()'))
                     ->where('news_portal.news_category',$Category_get_for_news->news_category)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->limit(20)
                    ->paginate(4);




            $All_recent_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(17)
                ->get();

            $All_selected_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_selection','selected')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(8)
                ->get();

            $All_recent_tabbed_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(8)
                ->get();

                $Backend_news_bottom_list= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->where('news_portal.news_category',$Category_get_for_news->news_category)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->take(2)->skip(2)
                    ->get();

                    $Backend_news_left_list= $Category_object::find(1)
                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                         ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                         ->where('news_portal.news_category',$Category_get_for_news->news_category)
                        ->where('category_news.enable_status','Enable')
                        ->where('news_portal.news_aproval','aproved')
                        ->orderBy('Time', 'DESC')
                        ->take(1)->skip(4)
                        ->first();
                  $Backend_footer_news= $Category_object::find(1)
                             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                             ->where('news_portal.news_category',$Category_get_for_news->news_category)
                            ->where('category_news.enable_status','Enable')
                            ->where('news_portal.news_aproval','aproved')
                            ->orderBy('Time', 'DESC')
                            ->take(1)->skip(1)
                            ->first();

                $Backend_footer_news_bottom= $Category_object::find(1)
                                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                                ->where('category_news.enable_status','Enable')
                                ->where('news_portal.news_aproval','aproved')
                                ->orderBy('Time', 'DESC')
                                ->limit(4)
                                ->get();
            $Category_get_for_news_footer_right_news=$Category_object::all()->where('enable_status','Enable')->last();
                                $Rajniti_news= $Category_object::find(1)
                                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                     ->select('news_portal.*', 'news_portal.news_country')
                                     ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                                    ->where('category_news.enable_status','Enable')
                                    ->where('news_portal.news_aproval','aproved')
                                    ->orderBy('Time', 'DESC')
                                    ->limit(2)
                                    ->get();

              $ALL_content_news_category= $Category_object::find(1)
                                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                         ->select('news_portal.*', 'news_portal.news_country')
                                         ->where('news_portal.news_category',$Category_name)
                                        ->where('category_news.enable_status','Enable')
                                        ->where('news_portal.news_aproval','aproved')
                                        ->orderBy('Time', 'DESC')
                                        ->limit(30)
                                        ->paginate(4);


                                        $Comment_base_news=$Category_object::find(1)
                                           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                           ->select('news_portal.*', 'news_portal.news_country')
                                          ->where('category_news.enable_status','Enable')
                                          ->where('news_portal.news_aproval','aproved')
                                          ->orderBy('comment_count', 'DESC')
                                          ->orderBy('Time', 'DESC')
                                          ->limit(8)
                                          ->get();


            $Day_question=vote::orderBy('Time', 'DESC')->first();
            $News_protal=new Admin_Information_news_protal;
            $View_news_subject=Admin_Information_news_protal::select('news_subject')->groupby('news_subject')->get();

           return view('user_panel_child_page.More_news',["View_news_subject"=>$View_news_subject,"Comment_base_news"=>$Comment_base_news,"ALL_content_news_category"=>$ALL_content_news_category,"Backend_footer_news_bottom"=>$Backend_footer_news_bottom,"Backend_news_footer"=>$Backend_footer_news,"Backend_news_left"=>$Backend_news_left_list,"Backend_news_bottom"=>$Backend_news_bottom_list,"Different_news"=>$Different_news,"Category"=>$Category,"Breaking_news"=>$Breaking_news,"Front_news"=>$Front_news,"Backend_news"=>$Backend_news,"Rajniti"=>$Rajniti_news,"All_recent"=>$All_recent_news,"Day_question"=>$Day_question,"selected_news"=>$All_selected_news,"Tabbed_recent_news"=>$All_recent_tabbed_news]);

    }
    public function Comment_add(Request $request)
    {
      $Comment_object=new Comment;
      $Comment_object->news_no=$request->Comment_news_no;
      $Comment_object->name=$request->Comment_Name;
      $Comment_object->email=$request->Comment_Email;
      $Comment_object->comment=$request->Comment;
      $Comment_object->aproval='pendding';
      $Comment_object->save();


      $MAX_COMMENT_COUNT_query= Admin_Information_news_protal::where('news_no',$request->Comment_news_no)->first();

      $MAX_COMMENT_COUNT_vote=$MAX_COMMENT_COUNT_query->comment_count;
      $MAX_COMMENT_COUNT_vote++;
      Admin_Information_news_protal::where('news_no',$request->Comment_news_no)->update(['comment_count'=>$MAX_COMMENT_COUNT_vote]);
      return back()->withInput();
    }


    public function Subject(Request $request)
    {

            $create_object=new Admin_Information_news_protal;
             $Category_name=$request->Category_name;
            $Breaking_news=$create_object::where('news_aproval','aproved')->orderBy('Time', 'DESC')->limit(8)->get();
            $Front_news=$create_object::where('news_aproval','aproved')->where('news_category',$Category_name)->orderBy('Time', 'DESC')->first();

            $Category_object=new Admin_panel_cat_news();
            $Category=$Category_object::where('enable_status','Enable')->get();


            $Category_get_for_news=$Category_object::orderBy(DB::raw('RAND()'))->where('enable_status','Enable')->first();

            $Backend_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->get();


                $Different_news= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->orderBy(DB::raw('RAND()'))
                     ->where('news_portal.news_category',$Category_get_for_news->news_category)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->limit(20)
                    ->paginate(4);




            $All_recent_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(17)
                ->get();

            $All_selected_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_selection','selected')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(8)
                ->get();

            $All_recent_tabbed_news= $Category_object::find(1)
                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                 ->select('news_portal.*', 'news_portal.news_country')
                ->where('category_news.enable_status','Enable')
                ->where('news_portal.news_aproval','aproved')
                ->orderBy('Time', 'DESC')
                ->limit(8)
                ->get();

                $Backend_news_bottom_list= $Category_object::find(1)
                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                     ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                     ->where('news_portal.news_category',$Category_get_for_news->news_category)
                    ->where('category_news.enable_status','Enable')
                    ->where('news_portal.news_aproval','aproved')
                    ->orderBy('Time', 'DESC')
                    ->take(2)->skip(2)
                    ->get();

                    $Backend_news_left_list= $Category_object::find(1)
                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                         ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                         ->where('news_portal.news_category',$Category_get_for_news->news_category)
                        ->where('category_news.enable_status','Enable')
                        ->where('news_portal.news_aproval','aproved')
                        ->orderBy('Time', 'DESC')
                        ->take(1)->skip(4)
                        ->first();
                  $Backend_footer_news= $Category_object::find(1)
                             ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                             ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                             ->where('news_portal.news_category',$Category_get_for_news->news_category)
                            ->where('category_news.enable_status','Enable')
                            ->where('news_portal.news_aproval','aproved')
                            ->orderBy('Time', 'DESC')
                            ->take(1)->skip(1)
                            ->first();

                $Backend_footer_news_bottom= $Category_object::find(1)
                                 ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                 ->select('news_portal.*', 'news_portal.news_country', 'category_news.cat_short_desprition')
                                 ->where('news_portal.news_category',$Category_get_for_news->news_category)
                                ->where('category_news.enable_status','Enable')
                                ->where('news_portal.news_aproval','aproved')
                                ->orderBy('Time', 'DESC')
                                ->limit(4)
                                ->get();
            $Category_get_for_news_footer_right_news=$Category_object::all()->where('enable_status','Enable')->last();
                                $Rajniti_news= $Category_object::find(1)
                                     ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                     ->select('news_portal.*', 'news_portal.news_country')
                                     ->where('news_portal.news_category',$Category_get_for_news_footer_right_news->news_category)
                                    ->where('category_news.enable_status','Enable')
                                    ->where('news_portal.news_aproval','aproved')
                                    ->orderBy('Time', 'DESC')
                                    ->limit(2)
                                    ->get();

              $ALL_content_news_category= $Category_object::find(1)
                                         ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                         ->select('news_portal.*', 'news_portal.news_country')
                                         ->where('news_portal.news_subject',$Category_name)
                                        ->where('category_news.enable_status','Enable')
                                        ->where('news_portal.news_aproval','aproved')
                                        ->orderBy('Time', 'DESC')
                                        ->limit(30)
                                        ->paginate(5);


                                        $Comment_base_news=$Category_object::find(1)
                                           ->join('news_portal', 'news_portal.news_category', '=', 'category_news.news_category')
                                           ->select('news_portal.*', 'news_portal.news_country')
                                          ->where('category_news.enable_status','Enable')
                                          ->where('news_portal.news_aproval','aproved')
                                          ->orderBy('comment_count', 'DESC')
                                          ->orderBy('Time', 'DESC')
                                          ->limit(8)
                                          ->get();


            $Day_question=vote::orderBy('Time', 'DESC')->first();
            $News_protal=new Admin_Information_news_protal;
            $View_news_subject=Admin_Information_news_protal::select('news_subject')->groupby('news_subject')->get();

           return view('user_panel_child_page.More_news',["View_news_subject"=>$View_news_subject,"Comment_base_news"=>$Comment_base_news,"ALL_content_news_category"=>$ALL_content_news_category,"Backend_footer_news_bottom"=>$Backend_footer_news_bottom,"Backend_news_footer"=>$Backend_footer_news,"Backend_news_left"=>$Backend_news_left_list,"Backend_news_bottom"=>$Backend_news_bottom_list,"Different_news"=>$Different_news,"Category"=>$Category,"Breaking_news"=>$Breaking_news,"Front_news"=>$Front_news,"Backend_news"=>$Backend_news,"Rajniti"=>$Rajniti_news,"All_recent"=>$All_recent_news,"Day_question"=>$Day_question,"selected_news"=>$All_selected_news,"Tabbed_recent_news"=>$All_recent_tabbed_news]);

    }



}
