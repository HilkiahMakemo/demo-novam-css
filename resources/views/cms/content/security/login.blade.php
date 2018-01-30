<div class="card-header" data-background-color="purple">
  <h4 class="title">Login Credentials</h4>
  <p class="category">Update your login</p>
</div>
<div class="card-content">
  <form method="post" action="/admin/access/login">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-4">
        <div class="form-group label-floating">
          <label class="control-label">Username <a href="#" class="fa fa-lock fa-lg float-right"></a></label>
          <input type="text" class="form-control" name="username" value="{{$username or old('username')}}">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group label-floating">
          <label class="control-label">Email address <a href="#" class="fa fa-lock"></a></label>
          <input type="email" class="form-control" name="email" value="{{$email or old('email')}}">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group label-floating">
          <label class="control-label">Current Password</label>
          <input type="password" class="form-control" name="old_password" value="{{$old_password or old('old_password')}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group label-floating">
          <label class="control-label">New Strong Password</label>
          <input type="password" class="form-control" name="password" value="{{$password or old('password')}}">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group label-floating">
          <label class="control-label">Confirm New Password</label>
          <input type="password" class="form-control" name="password_confirmation" value="{{$password_confirmation or old('password_confirmation')}}">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group label-floating">
          <label class="control-label"></label>
          <button type="submit" class="btn btn-primary pull-right">Update Login</button>
        </div>
      </div>

    </div>

    <div class="clearfix"></div>
  </form>
</div>
