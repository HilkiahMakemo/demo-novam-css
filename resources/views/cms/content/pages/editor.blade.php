@extends('cms.layouts.main')
@section('content')
  <div class="card-deck">
    <div class="card col-md-5 col-lg-4 card-nav-tabs" id="page-editor">
        <div class="card-header" data-background-color="purple">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper text-center">
                    <span class="nav-tabs-title">Page: <strong>{{$Map->label}}</strong></span>
                    <a href="/admin/pages" class="btn btn-primary btn-xs pull-right">All Pages</a>
                    <a href="#page-editor" data-classes="col-md-5 col-md-2" class="btn btn-default btn-xs pull-right">Content</a>
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
    <div class="card col">
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
    $('[data-class]').each(function(){
      var trigger = $(this).data('trigger') || 'click';

     $(this).on(trigger, function(){
       var target  = $(this).data('target') || this.hash;
       var classes = $(this).data('class');
       $(target).toggleClass( classes );
     });
    });
  });
</script>
@endpush
