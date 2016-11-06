@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')
<div class="container">
  <div class="row">
      <div style="width:85%">
        <h3>Create Your Role</h3>
        <br>
        <form class="form-horizontal" action="/Create_Role" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Role Name</label>
            <div class="col-sm-10">
              <input class="form-control" name="Name" id="disabledInput" type="text" placeholder="Display Name input here..." >
            </div>
          </div>

            <div class="form-group">
              <label for="disabledTextInput" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea rows="5" name="Discription" class="form-control"></textarea>

              </div>
            </div>

            <div class="form-group">

              <div class="col-sm-12 text-center">
              <input class="btn btn-success" type="submit" value="Create">

              </div>
            </div>

        </form>
      </div>
  </div>
</div>









  <div class="container">
    <div style="width:85%">
    <h2>Check Your Role</h2>
    <p>If You Want Change Your Role</p>
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Role Name</th>
          <th>Description</th>
          <th>Role Creator</th>
          <th>Role Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($Role_show as $Role_Information)
        <tr>
          <td>{{$Role_Information->name}}</td>
          <td>{{$Role_Information->description}}</td>
          <td>{{$Role_Information->Role_creator}}</td>
          <td>
              <a href="/Role_edit/{{$Role_Information->id}}" class="btn btn-primary">Edit</a>
              <a href="/Role_delete/{{$Role_Information->id}}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

</div>
@stop
