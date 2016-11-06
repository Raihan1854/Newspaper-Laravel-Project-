
@extends('Admin_panel.index')
@section('Titel','Add New News')

@section('Content')

<div style="font-family:times new Roman" ><h2><u>User Profile</u><h2></div>

<div class="container">
  <div class="row" style="font-family:times new Roman">

      <div class="col-sm-3">
          <h3><b> <e class="text-danger">User Name :</e>    {{$User_permission[0]->Name}}</b></h3><b>Job Titel :</b>{{$User_permission[0]->role_name}}
      </div>
      <div class="col-sm-3"><img src="{{URL::asset('Image/Image_error.jpg')}}" class="img-responsive img-rounded" style="height: 132px; border:1px black solid">

      </div>
      <div class="col-sm-3 " align="left">
        <ul class="pager">
              <li><a href="/User_access_page">Go To Previous</a></li>

        </ul>
      </div>
      <div class="col-sm-3 ">

      </div>
  </div>
</div>


<br><br><br><br>
<div class="container">
  <div class="row"  style="font-family:times new Roman" >
      <p style="font-size:20px"><b>{{$User_permission[0]->Name}} Role For Website</b></p>

      @foreach($User_permission as $Permission)
      <span class="badge">{{$Permission->permission_name}}</span>
      @endforeach

  </div>
</div>
<br><br><br><br>


@stop
