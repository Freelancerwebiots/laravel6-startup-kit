<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('images/logo.png')}}" alt="favicon" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Dashboard </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

   @include('layouts.admin.head')

   @yield('css')
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	    <div id="app" >
		    @include('layouts.admin.header')
		    
	    	@include('layouts.admin.sidebar')
	    	<!-- Content Wrapper. Contains page content -->
	    	<div class="content-wrapper">
			    <!-- Content Header (Page header) -->
			    <div class="content-header">
			      <div class="container-fluid">
			        <div class="row mb-2">
			          <div class="col-sm-6">
			            <h1 class="m-0 text-dark">@yield('title')</h1>
			          </div><!-- /.col -->
			          <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="#">Home</a></li>
			              <li class="breadcrumb-item active">Starter Page</li>
			            </ol>
			          </div><!-- /.col -->
			        </div><!-- /.row -->
			      </div><!-- /.container-fluid -->
			    </div>
			    <!-- Main content -->
			    <div class="content">
				    @yield('content')
				</div>
			    <!-- /.content -->
			  </div>
			  <!-- /.content-wrapper -->
		</div> 
	    @include('layouts.admin.script')
	    @yield('script')
	</div>
</body>
</html>
