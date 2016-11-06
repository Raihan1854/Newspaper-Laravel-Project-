@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')


        <div class="container">
          <h2>Add Role</h2>
          <p>Role Configuration</p>
          <div class="row">
              <div style="width:85%">

                <br>
                <form class="form-horizontal" action="/Role_configuration" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="sel1">Role :</label>
                      <div>

                        <select name="Role_ID" class="form-control">
                            @foreach($Role as $All_role)
                            <option>{{$All_role->name}}</option>
                            @endforeach
                        </select>
                      </div>

                    <label  for="sel2">select Role All Permission:</label>
                    <br>

                    <select name="Role_power[]" multiple class="form-control" id="sel2">
                        @foreach($ALL_ROLE_POWER as $Role_power)
                            <option>{{$Role_power->name}}</option>
                        @endforeach
                          </select>
                  </div>

                  <div align="center"><input class="btn btn-success" value="SET ROLE" type="submit" ></div>

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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>



@foreach($After_add_role_Data as $ROle_Information_for_After_data)
      <tr>
        <td>{{$ROle_Information_for_After_data->role_name}}</td>

        <td><a class="btn btn-success" href="/Show_permission_role/{{$ROle_Information_for_After_data->role_name}}">Show</a>
            <a class="btn btn-danger" href="#">Delete</a></td>
@endforeach

    </tbody>
  </table>
</div>

</div>

@stop
