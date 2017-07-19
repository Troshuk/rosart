@extends('index')
@section('seo')
	<title>@if($master->metatitle) {{ $master->metatitle }} @else {{ $master->name }} @endif</title>
	<meta name="keywords" content="{{ $master->keywords }}">
	<meta name="description" content="{{ $master->description }}">
@endsection
@section('content')
	<section class="main_adb || topPadidng">
		<div class="main_adb_content" style="background-image: url(/img/master_bg.jpg);">
			<div class="wrapper">
				<h1 class="hh">{{ $master->name }}</h1>
				<p class="pp">{{ $master->profession }}</p>
				<a href="#" class="button"><span>@lang('index.masters_bio')</span> <i class="ic_dir_arrow"></i></a>
				<a href="#" class="button"><span>@lang('index.masters_work')</span> <i class="ic_dir_arrow"></i></a>
			</div>
		</div>
	</section>
	<section class="biography">
		<div class="wrapper">
			<h2 class="title">@lang('index.masters_bio')</h2>
			<div class="content">
				{!! $master->text !!}
			</div>
		</div>
	</section>
	<div class="master_works">
		<div class="wrapper">
			<h2 class="title">@lang('index.masters_works')</h2>
			<div class="master_works_items">

				@isset($products)
					@foreach($products as $value)
						@if($value->id)
							<div class="master_works_item">
								<a class="link" href="{{ url('/product',$value->href) }}"></a>
								<div class="img" style="background-image: url({{url($value->img)}});">
									<div class="more">
										<span>@lang('index.category_more')</span>
										<i class="ic_dir_arrow"></i>
									</div>
								</div>
								<h3 class="tt">{{$value->name}}</h3>
								<div class="rows">
									<div class="price">{{$value->price}} <span class="price_currency">{{ $currency }}</span></div>
									<button class="button">
										<span>@lang('index.product_add')</span>
										<svg class="icon icon-cart"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-cart"></use></svg>
									</button>
								</div>
							</div>
						@endif
					@endforeach
				@endisset
			</div>
			<div class="show_more"><a href="{{ url('/master_works',$master->href) }}" class="button"><span>@lang('index.show_more')</span><i class="ic_dir_arrow"></i></a></div>
		</div>
	</div>
	<div class="master_nav">
		<div class="wrapper">
			<a href="{{ url('masters') }}" class="prev">
				<i class="ic_dir_arrow"></i>
				<span>@lang('index.masters_go')</span>
			</a>
			<!--
			<a href="#" class="next">
				<span>Рудаева Е.Л.</span>
				<i class="ic_dir_arrow"></i>
			</a>
			-->
		</div>
	</div>
@endsection
	
@section('script')
	<script>
		$(document).ready(function () {
			$('#active_menu_2').addClass('active');
		});
	</script>
@endsection
