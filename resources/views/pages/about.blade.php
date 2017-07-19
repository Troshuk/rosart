@extends('index')
@section('seo')
	<title>{{ $seo->metatitle }}</title>
	<meta name="keywords" content="{{ $seo->keywords }}">
	<meta name="description" content="{{ $seo->description }}">
@endsection

@section ('content')
	<section class="about">
		<div class="wrapper">
			<div class="adb_picture" style="background-image: url(img/about_bg.jpg);"></div>
			<h1 class="title">@lang('index.menu_about')</h1>
			<div class="about_desc">
				@lang('index.about_desc')
			</div>
			<div class="about_1 content">
				<div class="double_pic">
					<div class="pic" style="background-image: url({{$about->img2}});"></div>
					<div class="pic" style="background-image: url({{$about->img1}});"></div>
				</div>
				<div class="space"></div>
				{!! $about->text1 !!}
			</div>
			<div class="about_2 content">
				<div class="double_pic_rev">
					<div class="pic" style="background-image: url({{$about->img4}});"></div>
					<div class="pic" style="background-image: url({{$about->img3}});"></div>
				</div>
				<div class="space"></div>
				{!! $about->text2 !!}
			</div>
		</div>
	</section>


	<div class="about_3" style="background-image: url(img/about_3_bg.jpg);">
		<div class="wrapper">
			{!! $about->text3 !!}
			<!-- <a href="#" class="button"><span>@lang('index.about_go')</span> <i class="ic_dir_arrow"></i></a> -->
		</div>
	</div>
	@endsection	

@section ('script')
	<script>
		$(document).ready(function () {
			$('#active_menu_1').addClass('active');
		});
	</script>
@endsection	



