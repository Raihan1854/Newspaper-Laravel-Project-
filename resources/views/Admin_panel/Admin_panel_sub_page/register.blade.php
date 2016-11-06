
@extends('Admin_panel.index')
@section('Titel','Admin Register')

@section('Content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/Admin_register">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email"  type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                              <div hidden="hidden">  <input id="Token" type="text" class="form-control" value="{{csrf_token()}}" name="Token" required></div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <div style="width:85%">
  <h3>User List</h3>

  <table class="table table-condensed">
    <thead>
      <tr>
        <th>user Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      @foreach($User_Information as $User)
      <tr>
        <td>{{$User->name}}</td>
        <td>{{$User->email}}</td>
        <td>Password Not Show</td>
        <td>
          <?php $User_status=$User->status; ?>
          @if($User_status=="Active")
            <a href="/Status_update/{{$User->id}}" class="btn btn-success">{{$User->status}}</a>
          @else
          <a href="/Status_update/{{$User->id}}" class="btn btn-danger">{{$User->status}}</a>
          @endif
            <a href="/" class="btn btn-warning">Show</a>
            <a href="/User_profile_edit/{{$User->id}}" class="btn btn-primary">Edit</a>
            <a href="/user_delete/{{$User->id}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@stop
