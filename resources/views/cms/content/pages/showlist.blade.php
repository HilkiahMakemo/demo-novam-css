<table class="table table-condensed">
  <thead>
    <tr>
      <td colspan="10">
        @if ($Page)
          <span class="pull-left">
            {{$Page->children->count() ?? 'No' }} page(s) created under '<strong>{{$Page->label ?? 'Root'}}</strong>' page
          </span>
          <span class="pull-right">
          Go <a href="?parent_id={{$Page->ancestor->id ?? -1}}">Back</a>
          @if ($Page->ancestor && $Page->ancestor->id != -1)
            << <a href="?parent_id=-1">Root</a>
          @endif
          </span>
        @else
          Top-most pages (created under root)
        @endif
      </td>
    </tr>
  </thead>
    <tbody>
        @foreach ($Pages->sortByDesc('id') as $pg)
          <tr>
              <td>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="ids[]" value="{{$pg->id}}">
                      </label>
                  </div>
              </td>
              <td>
                <a href="?parent_id={{$pg->id}}">{{$pg->label}}</a>
              </td>
              <td class="td-actions text-right">
                  <a href="/admin/pages/{{$pg->id}}" rel="tooltip" title="Edit Page" class="btn btn-primary btn-simple btn-xs">
                      <i class="material-icons">edit</i>
                  </a>
                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                      <i class="material-icons">close</i>
                  </button>
                  <a href="{{$pg->url}}" rel="tooltip" title="Edit Page" class="btn btn-primary btn-simple btn-xs">
                      <i class="material-icons">preview</i>
                  </a>
              </td>
          </tr>
        @endforeach

    </tbody>
</table>
