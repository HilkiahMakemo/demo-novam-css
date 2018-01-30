<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  {{$page['meta'] ?? ''}}
  <title>{{$title or config('app.name')}}</title>

  {{-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" /> --}}
  {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png" /> --}}
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  @yield('styles')
  <link href="{{elixir('dist/css/main.css')}}" rel="stylesheet" />
  @stack('styles')

</head>

<body>
  <div class="wrapper">
    <main class="main-panel">
      @include('cms.includes.header')
      <section class="content">
        @yield('content')
      </section>
      @include('cms.includes.footer')
    </main>
    <aside class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="/" class="simple-text">
          {{config('app.name')}}
        </a>
      </div>
      <div class="sidebar-wrapper">
        @include('cms.includes.menu')
      </div>
    </aside>
  </div>
  @stack('modals')
<!--   Core JS Files   -->
<script src="{{elixir('dist/js/main.js')}}" type="text/javascript"></script>
<script src="{{elixir('dist/js/plugins.js')}}" type="text/javascript"></script>
<script src="https://unpkg.com/vue@2.5.13/dist/vue.min.js" charset="utf-8"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE" type="text/javascript"></script>
@yield('scripts')
<script src="{{elixir('dist/js/scripts.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    demo.initDashboardPageCharts();
});
</script>
@stack('scripts')
</body>
</html>
