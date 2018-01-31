<form method="post" action="/admin/pages{{isset($Map->id)? '/'.$Map->id: ''}}">
  {!!csrf_field()!!}
  <div class="row">
  <div class="col-md-7">
    <div class="form-group label-floating">
      <label class="control-label">Create Under:</label>
      @php
      $Label = $Map->ancestor->label ?? $Page->label ?? 'Top-most';
      @endphp
      <select class="form-control" name="parent_id">
        <option value="-1">Top-most</option>
        @if ($Page && $Page->ancestor)
          <option value="{{$Page->ancestor->id or -1}}" {!! $Page->ancestor->label == $Label? ' selected': '' !!}> {{$Page->ancestor->label}}</option>
        @endif
        @if ($Page && $Page->label)
        <option value="{{$Page->id}}" {!! $Page->label == $Label? ' selected': '' !!}>> {{$Page->label}}</option>
        @endif
        @isset($Pages)
          @foreach ($Pages as $pg)
            <option value="{{$pg->id ?? -1}}" {!! $pg->label == $Label? ' selected': '' !!}>>> {{$pg->label}}</option>
          @endforeach
        @endisset
      </select>
    </div>
  </div>
    <div class="col-md-5">
      <div class="form-group label-floating">
        <label class="control-label">Page Type</label>
        <select class="form-control" name="type">
          @isset($PageTypes)
            @foreach ($PageTypes as $pgtype)
              <option value="{{$pgtype['class']}}" {!! isset($Map) && $Map->type == $pgtype['class']? ' selected': '' !!}>
                {{$pgtype['name']}}
              </option>
            @endforeach
          @endisset
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group label-floating">
        <label class="control-label">Page Title</label>
        <input type="text" class="form-control" name="title" value="{{$Map->title or ''}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="form-group label-floating">
        <label class="control-label">Icon</label>
        <input type="text" class="form-control" name="icon" value="{{$Map->icon or ''}}">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group label-floating">
        <label class="control-label">Menu Label</label>
        <input type="text" class="form-control" name="label" value="{{$Map->label or ''}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group label-floating">
        <label class="control-label">URL Part</label>
        <input type="text" class="form-control" name="link" value="{{$Map->link or ''}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group label-floating">
          <label class="control-label"> Page Description</label>
          <textarea class="form-control" rows="2" name="meta[description]">{{$Map->meta['description'] or ''}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="settings[visible]" checked>
          Show this page label on the site menu
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="settings[searchable]" checked>
          Show this page content in search results
        </label>
      </div>
      <hr>
      <div class="radio">
        <p>Make this page available online:</p>
        <label class="radio-inline">
          <input type="radio" name="online[when]" onclick="$('#date-range').collapse('hide')" value="always" checked> Always
        </label>
        <label class="radio-inline">
          <input type="radio" name="online[when]" onclick="$('#date-range').collapse('show')" value="range"> Between the following dates:
        </label>
      </div>
      <div class="row collapse" id="date-range">
        <div class="col-md-6">
          <div class="form-group label-floating is-focused">
            <label class="control-label">From</label>
            <input type="date" class="form-control" name="online[from]">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group label-floating is-focused">
            <label class="control-label">To</label>
            <input type="date" class="form-control" name="online[to]">
          </div>
        </div>
      </div>
      <hr>
      <div class="radio">
        <p>Make this page viewable by:</p>
        <label class="radio-inline">
          <input type="radio" name="viewer" value="admins"> Administrators
        </label>
        <label class="radio-inline">
          <input type="radio" name="viewer" value="users"> Members
        </label>
        <label class="radio-inline">
          <input type="radio" name="viewer" value="guests"> Guests
        </label>
        <label class="radio-inline">
          <input type="radio" name="viewer" value="all" checked> All
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary pull-right"{!! isset($Map->id)? ' name="_method" value="PUT"': '' !!}>
    Save Page
  </button>
  <div class="clearfix"></div>
</form>

@push('scripts')
  <script>
  $(function(){
    $('[name="title"]').on('keyup blur', function(){
      var titleText = $(this).val();
      var pgStatus  = $('[name="status"]').val();

      var linkBox   = $('[name="link"]');
      if(!linkBox.val() || pgStatus === undefined){
        linkBox.closest('.form-group').removeClass('is-empty').addClass('is-focused');
        var linkText = titleText.replace(/\s+/g,'-');
        linkBox.val('/'+linkText.toLowerCase());
      }
      var labelBox  = $('[name="label"]');
      if(!labelBox.val() || pgStatus === undefined){
        labelBox.closest('.form-group').removeClass('is-empty').addClass('is-focused');
        var labelText = titleText.substring(0, 20);
        labelBox.val(labelText);
      }
    });
  });
</script>
@endpush
