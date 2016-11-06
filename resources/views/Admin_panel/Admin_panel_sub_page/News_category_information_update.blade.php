@extends('Admin_panel.index')
@section('Titel','New Category')
@section('Content')


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/Admin_panel.css')}}" />
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    
</head>
    
<body>
   

<form name="" action="/Category_news_Data_update" method="post">
        
    <a href="View_category_report" class="btn btn-primary">See Report</a>
    <table style="box-shadow:2px 8px 20px 3px; margin-top:50px;font-family: Menlo,Monaco,Consolas,'Courier New',monospace;" width="674" align='center' height="288" class="table-responsive; " border="0">
            {{csrf_field()}}
      <tr>
        <td style="color:white; font-size:20px; font-family: times new roman" height="45" colspan="3" bgcolor="#222220"><div align="center">
          News Categories</span>
        </div></td>
      </tr>

    
    <tr hidden="hidden">
        <td width="227" height="38"><div align="right"><strong>Categories</strong> ID</div></td>
        <td width="44">&nbsp;</td>
        <td width="381"><input value="{{$Information_pass->cat_id}}" class="form-control" type="text" name="cat_id"></td>
      </tr>
    
      <tr>
        <td height="33"><div align="right"><br> <strong>Categories</strong>Name </div></td>
        <td>&nbsp;</td>
        <td><br><input type="text" value="{{$Information_pass->cat_name}}" class="form-control" name="cat_name"></td>
      </tr>
      <tr>
        <td height="86"><div align="right"><strong>Categories</strong> Short Description </div></td>
        <td>&nbsp;</td>
        <td><textarea class="form-control" name="short_description">{{$Information_pass->cat_short_desprition}}</textarea></td>
      </tr>

        
    <tr><td colspan="3" class="text-center" style="color:green; font-family:times new roman"><?php echo @$Message ?></td></tr>
    
    
    
      <tr>
        <td height="52" colspan="3"><div align="center">
          <input class="btn btn-default" type="submit" name="Submit" value="Update">
          
        </div></td>
      </tr>
      <tr>
        <td height="24" colspan="3" bgcolor="#">&nbsp;</td>
      </tr>
    </table>
</form>
  <?php session_start() ?>  
</body>
@stop