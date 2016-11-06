@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')

  <div class="container">
    <div style="width:85%">
    <h2>Check Your Permission</h2>
    <p>If You Want Change Your Permission</p>
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Role Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($All_permission as $All_permission_information)
        <tr>
          <td>{{$All_permission_information->name}}</td>
          <td>{{$All_permission_information->description}}</td>
          <td><a href="#" class="btn btn-primary" disabled>Edit</a>
              <a href="#" class="btn btn-danger" disabled>Delete</a>
              <a href="#" class="btn btn-danger" disabled >Show</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

</div>
@stop
