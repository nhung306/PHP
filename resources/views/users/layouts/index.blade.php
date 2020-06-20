<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vui lòng xin chờ!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{asset('')}}">
	<!-- Favicon
	============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="users/img/titi.jpg">
	
	<!-- FONTS
	============================================ -->	
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<!-- animate CSS
	============================================ -->
    <link rel="stylesheet" href="users/css/animate.css">			
	
	<!-- FANCYBOX CSS
	============================================ -->			
    <link rel="stylesheet" href="users/css/jquery.fancybox.css">	
	
	<!-- BXSLIDER CSS
	============================================ -->			
    <link rel="stylesheet" href="users/css/jquery.bxslider.css">			
			
	<!-- MEANMENU CSS
	============================================ -->			
    <link rel="stylesheet" href="users/css/meanmenu.min.css">	
	
	<!-- JQUERY-UI-SLIDER CSS
	============================================ -->			
    <link rel="stylesheet" href="users/css/jquery-ui-slider.css">		
	
	<!-- NIVO SLIDER CSS
	============================================ -->			
    <link rel="stylesheet" href="users/css/nivo-slider.css">
	
	<!-- OWL CAROUSEL CSS 	
	============================================ -->	
    <link rel="stylesheet" href="users/css/owl.carousel.css">
	
	<!-- OWL CAROUSEL THEME CSS 	
	============================================ -->	
     <link rel="stylesheet" href="users/css/owl.theme.css">
	
	<!-- BOOTSTRAP CSS 
	============================================ -->	
    <link rel="stylesheet" href="users/css/bootstrap.min.css">
	
	<!-- FONT AWESOME CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/font-awesome.min.css">
	
	<!-- NORMALIZE CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/normalize.css">
	
	<!-- MAIN CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/main.css">
	
	<!-- STYLE CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/style.css">
	
	<!-- RESPONSIVE CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/responsive.css">
	
	<!-- IE CSS 
	============================================ -->
    <link rel="stylesheet" href="users/css/ie.css">		
	
	<!-- MODERNIZR JS 
	============================================ -->
    <script src="users/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body class="index-2">
    @include('users.layouts.header')
    @yield('menu')
    @yield('content')
    @include('users.layouts.footer')
	<!-- JS 
	===============================================-->
	<!-- jquery js -->
	<script src="users/js/vendor/jquery-1.11.3.min.js"></script>

	<!-- fancybox js -->
	<script src="users/js/jquery.fancybox.js"></script>

	<!-- bxslider js -->
	<script src="users/js/jquery.bxslider.min.js"></script>

	<!-- meanmenu js -->
	<script src="users/js/jquery.meanmenu.js"></script>

	<!-- owl carousel js -->
	<script src="users/js/owl.carousel.min.js"></script>

	<!-- nivo slider js -->
	<script src="users/js/jquery.nivo.slider.js"></script>

	<!-- jqueryui js -->
	<script src="users/js/jqueryui.js"></script>

	<!-- bootstrap js -->
	<script src="users/js/bootstrap.min.js"></script>

	<!-- wow js -->
	<script src="users/js/wow.js"></script>		
	<script>
		new WOW().init();
	</script>

	<!-- Google Map js -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>	
	<script>
		function initialize() {
		  var mapOptions = {
			zoom: 8,
			scrollwheel: false,
			center: new google.maps.LatLng(35.149868, -90.046678)
		  };
		  var map = new google.maps.Map(document.getElementById('googleMap'),
			  mapOptions);
		  var marker = new google.maps.Marker({
			position: map.getCenter(),
			map: map
		  });

		}
		google.maps.event.addDomListener(window, 'load', initialize);				
	</script>
	<!-- main js -->
	<script src="users/js/main.js"></script>
    </body>
</html>