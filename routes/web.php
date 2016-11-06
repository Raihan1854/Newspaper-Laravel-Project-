<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/Login', function () {
    return view('auth.login');
});



Route::get('/Bangladesh_user_Panel', function () {
    return view('user_panel_child_page.Bangladesh');
});

Route::get('/','user_panel_operation@Index');
Route::post('/New_acaount_regestration','user_panel_operation@New_acaount_regestration');
Route::post('/Day_question/{ID}','user_panel_operation@Day_question');
Route::get('/Category_base_news/{Category_name}','user_panel_operation@Category_base_news');
Route::get('/More_news/{Category_name}','user_panel_operation@More_news');
Route::get('/Show_single_News/{Category_name}/{ID}','user_panel_operation@Show_single_News');
Route::get('/Subject/{Category_name}','user_panel_operation@Subject');
Route::post('/Comment_add','user_panel_operation@Comment_add');
//Route::get('/Question_add/','user_panel_operation@Question_add');






/*Admin Panel Go To Controller*/
Route::get('/Admin','Admin_Panel_Control@Index');
Route::get('/Bangladesh','Admin_Panel_Control@Bangladesh')->middleware('auth');
Route::get('/Cat_regestration','Admin_Panel_Control@Cat_regestration');
Route::get('/Question','Admin_Panel_Control@Question');
Route::get('/Admin_register_page_show','Admin_Panel_Control@Admin_register_page_show');
/*Admin Panel All Opertaion*/
Route::post('/News_data_entry','Admin_panel_operation@News_data_entry');
Route::get('/view_news_operation_report','Admin_panel_operation@view_news_operation_report');
Route::post('/Filter_report','Admin_panel_operation@Filter_report');
Route::get('/view_news_operation_aproval/{ID}','Admin_panel_operation@view_news_operation_aproval');
Route::get('/view_news_operation_report_delete/{ID}','Admin_panel_operation@view_news_operation_report_delete');
Route::get('/view_news_operation_report_Edit/{ID}','Admin_panel_operation@view_news_operation_report_Edit');
Route::post('/News_data_update','Admin_panel_operation@News_data_update');
Route::get('/view_news_operation_select/{ID}','Admin_panel_operation@view_news_operation_select');
Route::get('/Comment_report','Admin_panel_operation@Comment_report');
Route::get('/Comment_aproval/{Comment_id}','Admin_panel_operation@Comment_aproval');
Route::get('/Comment_Delete/{id}','Admin_panel_operation@Comment_Delete');
Route::post('/Admin_register','Login_control@Admin_register');
Route::get('/Status_update/{ID}','Login_control@Status_update');
Route::get('/User_profile_edit/{ID}','Login_control@User_profile_edit');
Route::post('/Admin_information_update','Login_control@Admin_information_update');
Route::get('/user_delete/{ID}','Login_control@user_delete');
/*Category Operation*/
Route::post('/Category_news_Data_entry','Admin_panel_operation@Category_news_Data_entry');
Route::get('/View_category_report','Admin_panel_operation@View_category_report');
Route::get('/view_category_operation_enable/{ID}','Admin_panel_operation@view_category_operation_enable');
Route::get('/view_category_operation_delete/{ID}','Admin_panel_operation@view_category_operation_delete');
Route::get('/view_category_operation_report_Edit/{ID}','Admin_panel_operation@view_category_operation_report_Edit');
Route::post('/Category_news_Data_update','Admin_panel_operation@Category_news_Data_update');


Route::get('/permission','RBAC@permission')->middleware('auth');
Route::get('/Create_Role_show','RBAC@Create_Role_show')->middleware('auth');
Route::get('/Permission_role_page','RBAC@Permission_role_page')->middleware('auth');
Route::get('/User_access_page','RBAC@User_access_page')->middleware('auth');
Route::post('/Create_Role','RBAC@Create_Role')->middleware('auth');
Route::get('/Role_edit/{ID}','RBAC@Role_edit')->middleware('auth');
Route::post('/Create_role_update','RBAC@Create_role_update')->middleware('auth');
Route::get('/Role_delete/{ID}','RBAC@Role_delete')->middleware('auth');
Route::post('/Role_configuration','RBAC@Role_configuration')->middleware('auth');
Route::get('/Show_permission_role/{Role_name}','RBAC@Show_permission_role')->middleware('auth');
Route::post('/Add_New_Role','RBAC@Add_New_Role');
Route::post('/Role_remove','RBAC@Role_remove');
Route::post('/User_permission_set','RBAC@User_permission_set');
Route::get('/Show_User_role_permission/{User_name}','RBAC@Show_User_role_permission');
Route::get('/Delete_User_role_permission/{User_name}','RBAC@Delete_User_role_permission');
/*System Operation*/
Auth::routes();
Route::post('/System_vailidation','Login_control@System_vailidation');



Route::get('/home', 'HomeController@index');
