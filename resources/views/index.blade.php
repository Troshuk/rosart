<!doctype html>
<html lang="ru">
<head>
	@include('blocks.head_tags')
	@yield('seo')
</head>
<body>
	@include('blocks.header')
	@yield('content')
	
	@include('blocks.footer')
	@include('blocks.dialog')
	@yield('script')
</body>
</html>
