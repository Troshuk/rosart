@extends('index')
@section('seo')
<title>
	@lang('index.catalog') |
</title>
<meta name="keywords" content="">
<meta name="description" content="">
@endsection
@section('content')
	<section class="catalog_page">
		<div class="wrapper">
			<div class="adb_picture" style="background-image: url(img/catalog_bg.jpg);"></div>
			<h1 class="title_">@lang('index.catalog')</h1>
			@include('blocks/catalog_items')
		</div>
	</section>
@endsection
	
@section('script')
	<script>
		$(document).ready(function () {
			$('#active_menu_3').addClass('active');
		});
	</script>
@endsection

