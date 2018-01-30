<form method="post" action="/admin/access/profile">
  {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Company Name</label>
                <input type="text" class="form-control" name="company">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Company Site</label>
                <input type="url" class="form-control" name="website" value="{{$website or old('website')}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label">Adress</label>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group label-floating">
                <label class="control-label">City</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Company Info</label>
                <div class="form-group label-floating">
                    <textarea class="form-control" rows="5" name="details"></textarea>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
    <div class="clearfix"></div>
</form>
