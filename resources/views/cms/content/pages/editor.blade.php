@extends('cms.layouts.main')
@section('content')
  <div class="row">
    <div class="col-md-5 collapse in show" id="page-editor">
      <div class="card card-nav-tabs">
          <div class="card-header" data-background-color="purple">
              <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper text-center">
                      <span class="nav-tabs-title">Page: <strong>{{$Map->label}}</strong></span>
                      <a href="/admin/pages" class="btn btn-primary btn-xs pull-right">All Pages</a>
                      <a href="#page-editor" data-toggle="collapse" class="btn btn-primary btn-xs pull-right">Content</a>
                      <ul class="nav nav-tabs ml-auto" data-tabs="tabs">
                          {{-- <li class="active">
                              <a href="#page-list" data-toggle="tab">
                                  <i class="material-icons"></i> <strong>List</strong> View
                                  <div class="ripple-container"></div>
                              </a>
                          </li>
                          <li class="">
                              <a href="#site-tree" data-toggle="tab">
                                  <i class="material-icons"></i> <strong>Site</strong> Map
                                  <div class="ripple-container"></div>
                              </a>
                          </li> --}}
                          {{-- <li class="">
                              <a href="#edit-page" data-toggle="tab">
                                  <i class="material-icons"></i> <strong>Add</strong> New
                                  <div class="ripple-container"></div>
                              </a>
                          </li> --}}
                      </ul>

                  </div>
              </div>
          </div>
          <div class="card-content">
              <div class="tab-content">
                  {{-- <div class="tab-pane active" id="page-list">
                      @include('cms.content.pages.showlist')
                  </div>
                  <div class="tab-pane" id="site-tree">
                      @include('cms.content.pages.showtree')
                  </div> --}}
                  <div class="tab-pane active" id="edit-page">
                      @include('cms.content.pages.create')
                  </div>
              </div>
          </div>
      </div>
      {{-- <div class="card">
        <div class="col-md-12">
          @include('cms.content.pages.create')
        </div>
      </div> --}}
    </div>
    <div class="col-md-7">
      <iframe class="card"

              src="//www.example.com"
              style="height:70%;width:100%"
              frameborder="0"


      ></iframe>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  $(function(){
    $('.shrink').on('click', function(){
      var classes = $(this).data('classes');
      var target  = $(this).data('target') || this.hash;
      $(target).toggleClass(classes);
    });
  });
</script>
@endpush
