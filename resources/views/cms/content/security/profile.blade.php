<div class="card-header" data-background-color="purple">
    <h4 class="title">Profile Information</h4>
    <p class="category">Complete your profile</p>
</div>
<div class="card-content">
<form method="post" action="/admin/access/profile" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{$firstName or old('first_name')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{$lastName or old('last_name')}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label">Photo/Avatar</label>
                <input type="file" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label">Social</label>
                <div class="row duplicate">
                  <div class="col-md-5">
                    <input type="text" name="social[][name]" class="form-control" placeholder="e.g. facebook">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="social[][url]" class="form-control" placeholder="e.g. http://fb.com/<user>">
                  </div>
                  <div class="col-md-1">
                    <button type="button" data-duplicate=".duplicate" class="btn btn-sm btn-primary show"> + </button>
                    <button type="button" data-duplicate=".duplicate" class="btn btn-sm btn-primary hide"> - </button>
                  </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="form-group label-floating">
                <label class="control-label">State</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group label-floating">
                <label class="control-label">Zip Code</label>
                <input type="text" class="form-control">
            </div>
        </div> --}}
    </div>
    <div class="row">
        {{-- <div class="col-md-12">
            <div class="form-group">
                <label>Company Info</label>
                <div class="form-group label-floating">
                    <textarea class="form-control" rows="5" name="details"></textarea>
                </div>
            </div>
        </div> --}}
    </div>
    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
    <div class="clearfix"></div>
</form>
</div>
