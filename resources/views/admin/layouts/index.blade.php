<!DOCTYPE html>
<html lang="en">


<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Static Tables | Nifty - Responsive admin template.</title>
	<base href="{{asset('')}}">
	@include('admin.layouts.css');
	@yield('css')
	<script src="admin/plugins/pace/pace.min.js"></script>
</head>

<body>
	<div id="container" class="effect mainnav-lg">
		@include('admin.layouts.header')
		@yield('content')
		@include('admin.layouts.footer')
	</div>
	@include('admin.layouts.jquery')
	@yield('script')
</body>

<!-- Tieu Long Lanh Kute -->
</html>

