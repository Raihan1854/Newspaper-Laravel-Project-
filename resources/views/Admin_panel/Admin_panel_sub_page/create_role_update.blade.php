@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')
<div class="container">
  <div class="row">
      <div style="width:85%">
        <h3>Create Your Role</h3>
        <a href="/Create_Role_show">Back In</a>
        <br>
        <form class="form-horizontal" action="/Create_role_update" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Role Name</label>
            <div class="col-sm-10">
              <input class="form-control" name="Name" value="{{$Role_edit_information->name}}" id="disabledInput" type="text" placeholder="Display Name input here..." >
              <div hidden="hidden"><input class="form-control" name="ID" value="{{$Role_edit_information->id}}" id="disabledInput" type="text"></div>
            </div>
          </div>

            <div class="form-group">
              <label for="disabledTextInput" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea rows="5" name="Discription" class="form-control">{{$Role_edit_information->description}}</textarea>

              </div>
            </div>

            <div class="form-group">

              <div class="col-sm-12 text-center">
              <input class="btn btn-success" type="submit" value="Update">

              </div>
            </div>

        </form>
      </div>
  </div>
</div>

@stop
