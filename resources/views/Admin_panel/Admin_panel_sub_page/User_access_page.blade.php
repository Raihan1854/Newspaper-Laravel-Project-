@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')

@if (count(@$Message) > 0)
<div class="alert alert-danger">
  {{@$Message}}
</div>
@endif


<form action="/User_permission_set" method="post">
  {{csrf_field()}}
  <div class="container">
    <h2>User Acceess Permission</h2>
    <p>Role Configuration</p>
    <div class="row">
        <div style="width:85%">

          <br>
          <form class="form-horizontal">

            <div class="form-group">
              <label for="sel1">Select user Name (select one):</label>
              <select name="User_name" class="form-control" id="sel1">
                @foreach($User as $All_user)
                <option>{{$All_user->name}}</option>
              @endforeach
              </select>
              <br>
              <label for="sel2">select Role:</label>
              <select name="User_role" class="form-control" id="sel1">
                @foreach($User_Role as $Permission_Role)
                <option>{{$Permission_Role->role_name}}</option>
                @endforeach
              </select>
            </div>

            <div align="center"><input class="btn btn-success" type="submit" value="SET" ></div>

          </form>
        </div>
    </div>
  </div>
</form>


<div class="container">
  <div style="width:85%">
  <h3>User List</h3>
  <p>See User Role</p>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>user Name</th>
        <th>Role Name</th>

        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($ALL_user_role as $User_Role)
      <tr>
        <td>{{$User_Role->Name}}</td>
        <td>{{$User_Role->role_name}}</td>

        <td>
            <a href="/Show_User_role_permission/{{$User_Role->Name}}" class="btn btn-warning">Show</a>
            <!-- <a href="#" class="btn btn-primary">Edit</a> -->
            <a href="/Delete_User_role_permission/{{$User_Role->Name}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</div>


@stop
