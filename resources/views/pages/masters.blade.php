@extends('index')

@section('seo')
	<title>{{ $seo->metatitle }}</title>
	<meta name="keywords" content="{{ $seo->keywords }}">
	<meta name="description" content="{{ $seo->description }}">
@endsection

@section('content')
<section class="masters">
	<div class="wrapper">
		<div class="adb_picture" style="background-image: url(img/masters_bg.jpg);"></div>
		<h1 class="title_">@lang('index.menu_masters')</h1>
		<div class="masters_items">
			
			@foreach($masters as $master)
			@if($master->id)
			<div class="masters_item">
				<div class="masters_img" style="background-image: url({{ url($master->img) }});"></div>
				<div class="masters_body">
					<h3 class="hh">{{ $master->name }}</h3>
					<p>{{ $master->profession }}</p>
					<div class="btns_wr">
						<a href="{{ url('/master',$master->href) }}" class="button">@lang('index.masters_bio') </a>
						<a href="{{ url('/master_works',$master->href) }}" class="button">@lang('index.masters_work')</a>
					</div>
				</div>
			</div>
			
			@else
			
			@endif
			@endforeach

		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	$(document).ready(function () {
		$('#active_menu_2').addClass('active');
	});
</script>
@endsection
