
@extends('Admin_panel.index')
@section('Titel','Add New News')

@section('Content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<?php session_start() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.News_aigin {
	text-align: center;
	color: #FFF;
	font-family: SutonnyMJ;
	font-size: 24px;
}
#button {
	text-align: center;
}
</style></head>
<body>

<style type="text/css">
.News_aigin {
	text-align: center;
	font-family: SutonnyMJ;
	font-size: 20px;
	color: #FFF;
}
.DOT {
	font-size: 24px;
}
</style>
<form name="" action="/News_data_entry" method="post" enctype="multipart/form-data">
<table style="box-shadow:2px 8px 20px 3px" width="866" height="531" border="0" align="center" cellpadding="0" cellspacing="0">
   {{csrf_field()}}
  <tr>
    <td height="40" colspan="4" bgcolor="#22222" class="News_aigin">নতুন খবর<span class="News_aigin"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="DOT">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

    <tr >
    <td align="right" bgcolor="#F8F8F8"><span class="text-danger">*</span>ক্রমিক নং</td>
    <td align="center" bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8"><input name="news_no" value="{{$Max_id}}" type="text" class="form-control" id="textfield2" /></td>
  </tr>


  <tr>
    <td align="right" bgcolor="#F8F8F8"><span class="text-danger">*</span>বিষয়</td>
    <td align="center" bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8"><input name="News_Subject" type="text" class="form-control" id="textfield2" /></td>
  </tr>


   <tr>
        <td align="right" bgcolor="#F8F8F8"><span class="text-danger">*</span>ক্যাটাগরি</td>
        <td align="center" bgcolor="#F8F8F8">&nbsp;</td>
        <td bgcolor="#F8F8F8">&nbsp;</td>
        <td bgcolor="#F8F8F8"><select name='category_name'  class="form-control">
            <?php
                foreach($Category as $Category_list)
                {
            ?>
                <option>{{ $Category_list->news_category }}</option>
            <?php
                }
            ?>
            </select></td>
        <td>&nbsp;</td>
    </tr>


  <tr>
    <td align="right" bgcolor="#F8F8F8"><span class="dot"><span class="tab-content"><span class="text-danger">*</span></span></span>হেডলাইন</td>
    <td align="center" bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8"><input name="News_headline" type="text" class="form-control" id="textfield3" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F8F8F8"><span class="text-danger">*</span>দেশের নাম</td>
    <td align="center" bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8">&nbsp;</td>
    <td bgcolor="#F8F8F8"><select  name="Country_name" class="form-control" id="select">
            <option>None</option>
            <option>Afghanistan</option>
            <option>Albania</option>
            <option>Algeria</option>
            <option>Andorra</option>
            <option>Angola</option>
            <option>Antigua and Barbuda</option>
            <option>Argentina</option>
            <option>Armenia</option>
            <option>Aruba</option>
            <option>Australia</option>
            <option>Austria</option>
            <option>Azerbaijan</option>
            <option>Bahamas</option>
            <option>Bahrain</option>
            <option>Bangladesh</option>
            <option>Barbados</option>
            <option>Belarus</option>
            <option>Belgium</option>
            <option>Belize</option>
            <option>Benin</option>
            <option>>Bhutan</option>
            <option>Bolivia</option>
            <option>Bosnia and</option> Herzegovina</option>
            <option>Botswana</option>
            <option>Brazil</option>
            <option>Brunei </option>
            <option>Bulgaria</option>
            <option>Burkina Faso</option>
            <option>Burma</option>
            <option>Burundi</option>
        </select></td>
    </select></td>
  </tr>
  <tr>
    <td height="34" align="right">বিভাগ</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><select  name="Divison" class="form-control" id="select2">
            <option></option>
            <option>Dhaka</option>
            <option>Chittagong</option>
            <option>Shylet</option>
            <option>Khulna</option>
            <option>Barisal</option>
            <option>Rajshai</option>
        </select></td>
  </tr>
  <tr>
    <td height="34" align="right">জেলা</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="News_zilla" type="text" class="form-control" id="textfield6" /></td>
  </tr>
  <tr>
    <td height="34" align="right">নিউসকভারেজ ছবি</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="file" name="News_file" id="fileField" /></td>
  </tr>
  <tr>
    <td align="right"><span ><span class="text-danger">*</span>খবর</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left"><textarea name="News" cols="45" rows="5" id="textarea"></textarea></td>
  </tr>
  <tr>
    <td align="right">খবর সংগ্রহকারী প্রতিনিধী</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><select name="News_coverage_jurnalist_name" class="form-control" id="select3">
            <option>Hasan</option>
            <option>AA</option>
            <option>BB</option>
            <option>CC</option>
            <option>DD</option>
            <option>EE</option>
        </select></td>
  </tr>
  <tr>
    <td align="right"><span class="text-danger">*</span>খবর সংগ্রহের সূত্র</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="News_collection_source" type="text" class="form-control" id="textfield4" /></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>

    <tr>
    <td style="color:green" colspan="4"><?=@$Message?></td>
  </tr>

  <tr>

    <td colspan="4" align="center">
      <?php
      $Information_for_Role_USER=session()->get('key');

      ?>
      @foreach($Information_for_Role_USER as $Role_check)
        @if($Role_check->permission_name =="create")
          <input class="btn btn-default" type="submit" name="button" id="button" value="Submit" />
        @endif
        @if($Role_check->permission_name =="View")
      <a href="/view_news_operation_report" class="btn btn-default">View</a>
      @endif
      @endforeach
    </td>
  </tr>
  <tr>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#22222">&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>

@stop
