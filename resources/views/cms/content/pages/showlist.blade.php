<table class="table table-condensed">
  <thead>
    <tr>
      <td colspan="10">
        @if ($Page)
          <span class="float-left">
            @php $count = $Page->children->count() ?? 0; @endphp
            {{$count ?: 'No' }} page{{$count == 1? '': 's'}} here
          </span>
          <span class="float-right">
            @foreach (array_reverse($BreadCrumbs->all()) as $page)
              @if ($loop->first)
                {{ $page->label }}
              @else
                <a href="?parent_id={{$page->id}}">{{ $page->label }}</a>
              @endif
              <<
            @endforeach
            <a href="?parent_id=-1">Root</a>
          {{-- Go <a href="?parent_id={{$Page->ancestor->id ?? -1}}">Back</a>
          @if ($Page->ancestor && $Page->ancestor->id != -1)
            << <a href="?parent_id=-1">Root</a>
          @endif
          </span> --}}
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
                  <a href="{{$pg->url}}" rel="tooltip" title="View Page" class="btn btn-primary btn-simple btn-xs" target="_blank">
                      <i class="material-icons">launch</i>
                  </a>
                  <a href="#my-page-{{$pg->id}}" rel="tooltip" title="delete page" data-toggle="modal" class="btn btn-danger btn-simple btn-xs">
                      <i class="material-icons">close</i>
                  </a>
                  @push('modals')
                    <div id="my-page-{{$pg->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myPage{{$pg->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <form class="modal-content" method="post" action="/admin/pages/{{$pg->id}}">
                          {{csrf_field()}} {{method_field('DELETE')}}
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myPage{{$pg->id}}">{{$pg->title}}</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete this page completely?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-sm">DELETE</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  @endpush
              </td>
          </tr>
        @endforeach

    </tbody>
</table>
