@extends('cms.layouts.main')
@section('content')
<div class="w100">
  <div class="card-deck">
    <div class="card col-md-6 col-lg-4 card-nav-tabs mx-auto">
        <div class="card-header" data-background-color="purple">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper text-center">
                    <span class="nav-tabs-title">Pages:</span>
                    <ul class="nav nav-tabs ml-auto" data-tabs="tabs">
                        <li class="active">
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
                        </li>
                        <li class="">
                            <a href="#new-page" data-toggle="tab">
                                <i class="material-icons"></i> <strong>Add</strong> New
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="tab-content">
                <div class="tab-pane active" id="page-list">
                    @include('cms.content.pages.showlist')
                </div>
                <div class="tab-pane" id="site-tree">
                    @include('cms.content.pages.showtree')
                </div>
                <div class="tab-pane" id="new-page">
                    @include('cms.content.pages.create')
                </div>
            </div>
        </div>
    </div>
  </div>
  {{-- <div class="card col">

  </div> --}}
</div>
@endsection
