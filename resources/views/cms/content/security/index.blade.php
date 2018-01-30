@extends('cms.layouts.main')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="../assets/img/faces/marc.jpg" />
            </a>
          </div>
          <div class="content">
            <h6 class="category text-gray">{{$profile->name ?? 'Company Name'}}</h6>
            <h4 class="card-title"></h4>
            <p class="card-content"></p>
            <p>
              <a href="#user-access"  data-remote="/admin/security/login" class="btn btn-primary"> Edit Login </a>
              <a href="#user-access"  data-remote="/admin/security/profile" class="btn btn-primary"> Edit Profile </a>
            </p>
            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
          </div>
        </div>
      </div>
      <div class="col-md-8 collapse">
        <div class="card" id="user-access">
        </div>
      </div>
    </div>
  </div>

@endsection
