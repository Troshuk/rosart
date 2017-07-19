<!doctype html>
<html lang="ru">
<head>
@include('blocks.head_tags')

</head>
<body class="topPadidng">
@include('blocks.header')
	<div class="page_404">
		<div class="wrapper">
			<h1 class="hh">@lang('index.error_404')</h1>
			<p>@lang('index.error_404_desc')</p>
			<a href="{{ url('/') }}" class="button">@lang('index.error_404_go')</a>
		</div>
	</div>

@include('blocks.footer')
@include('blocks.dialog')


</body>
</html>