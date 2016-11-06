@extends('Admin_panel.index')
@section('Titel','New Question')
@section('Content')


<form action="/Question_add" method="post">
    <table style="font-family:times new roman" width="60%" align="center" height="205" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25"  style="color:white"colspan="3" bgcolor="#222220"><div align="center" class="style1"><h4>Day Question </h4></div></td>
  </tr>
  <tr>
    <td width="134" height="54" class="text-center">Question</td>
    <td width="1">&nbsp;</td>
    <td width="318"><input type="text" class="form-control" name="question"></td>
  </tr>
        {{csrf_field()}}
<tr>
    <td>{{@$Message}}</td>
</tr>        
        
  <tr>
    <td height="45" colspan="3"><div align="center">
      <input type="submit" class="btn btn-default" name="Submit" value="Submit">
    </div></td>
  </tr>
  <tr>
    <td height="26" colspan="3" bgcolor="#222220">&nbsp;</td>
  </tr>
</table>
</form>
 <?php session_start() ?>  
</body>
@stop