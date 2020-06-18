<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Henry Onyemaobi's Portfolio</title>
		
		  <!-- Web Application Manifest -->
<link rel="manifest" href="/manifest.json">

	

 <!-- meta tags -->
 <meta name="description" content="Henry Onyemaobi's Portfolio - Professionally inclined to create
  needed web applications in view of achieving desired goals. "/>
 <meta name="keywords" content="henry onyemaobi, web developer, website, web application, portfolio, developer,
 henry nnamdi onyemaobi, web, php, laravel, vuejs, html, learn web development, tech blog"/>  



<!-- Fix - for safari / ios -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="henryonyemaobi">
  <link rel="apple-touch-icon" href="/images/icons/icon-512x512.jpg">

  <meta name="msapplication-TileColor" content="#fff">
  <meta name="theme-color" content="#123c69">
	
    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">   

	<!--bootstrap-->
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--custom css-->
	<link href="/css/style.css" rel="stylesheet" type="text/css" />
	<!--font-awsome-css-->

	<link rel="stylesheet" href="/css/wicked.min.css">
<!--boot4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  

	<!--<link href="/css/animate.css" rel="stylesheet" type="text/css" />-->
		<link type="text/css" rel="stylesheet" href="/css/blog.css" />
<!--vuetify material icons-->
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
<!--nprogress-css-->
<link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
  <!--fav icon -->
  <link rel="icon" href="{{ asset('images/pic.jpg') }}">

  
    </head>
    <body>
        <div id='app' v-cloak>
<transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
		 <router-view></router-view>	
</transition>
  
		</div>
		<noscript><h5 class='text-center text-danger'>JavaScript is required.</h5></noscript>

		<script src="/js/promise.min.js"></script>

		<script>
			//activate promise.js if browser does not have
  if(!Window.Promise){
	  Window.Promise = Promise;
  }
  </script>


  <!-- register service worker--
  <script type="text/javascript">
	// Initialize the service worker
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.register('/serviceworker.js', {
			scope: '.' 
		}).then(function (registration) {
			// Registration was successful
			console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}, function (err) {
			// registration failed :(
			console.log('ServiceWorker registration failed: ', err);
		});
	}
</script>
  !--register service worker-->
  
<!-- Load polyfills to support older browsers -->
<script src="//polyfill.io/v3/polyfill.min.js?features=es2015%2CMutationObserver" crossorigin="anonymous"></script>

		<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
		<!-- vue lives here -->
<script src="{{asset('/js/app.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/vue-disqus@3/dist/vue-disqus.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!--bootstrap vue dependency -->
  <script src="https://unpkg.com/portal-vue"></script>

	<script src="/js/bootstrap.min.js"></script>
	<!--script-->
	<script src="/js/wow.min.js"></script>

	<script>
		//wow
new WOW().init();
	</script>
	
    </body>
</html>
