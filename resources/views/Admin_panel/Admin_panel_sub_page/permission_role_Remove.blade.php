@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')

<div class="container">
  <div class="row">
      <form class="form-horizontal" action="/Add_New_Role" method="post">
      <div class="col-sm-6">
        <div class="container">
          <h2>Role Configuration</h2>
          <h3 class="text-success"><u>Role Add</u></h3>
          <div class="row">
              <div style="width:85%">

                <br>

                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="sel1">Role :{{$Role_name}}</label>
                    <div></div>  <label for="sel2">select Role All Permission:</label>
                    <br>

                    <div class="well col-xs-4">
                      @foreach ($Role_power as $All_Role_power)
                      <input checked type="checkbox" value="">{{$All_Role_power->permission_name}}
                      @endforeach
                    </div>
                    <br>

                  </div>

                        <div class="form-group">
                          <label for="sel1">You Select Role Name:{{$Role_name}}</label>
                          <div></div>  <label for="sel2">select New Role</label>
                          <div hidden="hidden"><input type="text" name="Role_name" value="{{$Role_name}}"></div>
                          <br>

                          <div class="well col-xs-4">
                            @foreach ($All_permission_information as $All_permission_information)
                            <input type="checkbox" name="Role_power[]" value="{{$All_permission_information->name}}">{{$All_permission_information->name}}
                            @endforeach
                          </div>
                          <br>

                        </div>




              </div>
          </div>
        </div>
          <div><input type="submit" class="btn btn-success"  value="Add Role"></div>
      </div>
  </form>

      <div class="col-sm-6">
        <div class="container">
        <br><br><br>
          <h3 class="text-danger"><u>Role Remove</u></h3>
          <div class="row">
              <div style="width:85%">

                <br>
                <form class="form-horizontal" action="/Role_remove" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="sel1">Role :{{$Role_name}}</label>
                    <div hidden="hidden"><input type="text" name="Role_name" value="{{$Role_name}}"></div>
                    <div>Role Check</div>  <label for="sel2">select Role All Permission:</label>
                    <br>

                    <div class="well col-xs-4">
                      @foreach ($Role_power as $All_Role_power)
                      <input type="checkbox" name="Role_power[]" value="{{$All_Role_power->permission_name}}">{{$All_Role_power->permission_name}}
                      @endforeach
                    </div>


                  </div>




              </div>
          </div>
        </div>
          <div><input type="submit" class="btn btn-danger" value="Remove Role"></div>
            </form>
      </div>
  </div>
</div>






@stop
