@extends('padding')
@section('seo')
<title>@if($products->metatitle){{ $products->metatitle }}@else{{ $products->name }}@endif</title>

<meta name="keywords" content="{{ $products->keywords }}">
<meta name="description" content="{{ $products->description }}">
@endsection

@section('content')
<div class="mosaic" style="background-image: url(/img/product_top_bg.jpg);">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li><a class="underscore" href="{{ url('/') }}">@lang('index.menu_general')</a></li>
			<li><a class="underscore" href="{{ url('/catalog') }}">@lang('index.catalog')</a></li>
			<li><span>{{ $products->name }}</span></li>
		</ul>
	</div>
</div>
<section class="product">
	<div class="wrapper">
		<div class="product_picture">
			<div class="product_slider">
				<div class="product_slider_item" data-src="{{url($products->img)}}" style="background-image: url({{url($products->img)}});"></div>
				@if($products->imgs)
					@foreach(explode(',', $products->imgs) as $key => $image)
						<div class="product_slider_item" data-src="{{url($image)}}" style="background-image: url({{url($image)}});"></div>
					@endforeach
				@endif
			</div>
			<div class="product_controls"><span class="product_count"></span></div>
		</div>
		<div class="product_info">
			<h1 class="title_">{{	$products->name }}</h1>
			<div class="currency || js_DropWrap">
				<div><span>{{$products->price}}</span> <span class="price_currency">{{ $currency }}</span></div>
			</div>
			<p class="pp">{{ $products->masters }}</p>
			<p class="pp">{{ $products->technique }}</p>
			<p class="pp">{{ $products->size }}</p>
			<p class="pp">{{ $products->year }}</p>
			<button class="button" onclick="@if(Auth::check())addtocart('{{ $products->id }}')@else$('.modal_login').dialog();return false;@endif"><span>@lang('index.product_add')</span><i class="ic_dir_arrow"></i></button>
			<div class="social">
				<a onclick="Share.twitter('URL','{{ $products->name }}')">
	            	<svg class="icon icon-twitter">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-twitter">
						</use>
					</svg>
	            </a>
	            <a onclick="Share.google('URL','{{ $products->name }}', '{{url($products->img)}}','{{$desc_soc}}' + '...')">
	            	<svg class="icon icon-google">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-google">
						</use>
					</svg>
	            </a>
				<a onclick="Share.facebook('URL','{{ $products->name }}', '{{url($products->img)}}','{{$desc_soc}}' + '...')">
					<svg class="icon icon-facebook">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-facebook2">
						</use>
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="reviewed">
	<div class="wrapper">
		<div class="title_">@lang('index.product_view')</div>
		<div class="reviewed_items">


			@isset($viewed)
				@foreach($viewed as $key => $value)
					@if($value->id)
						<a href="{{ url('/product', $value->href) }}" class="reviewed_item">
							<div class="img" style="background-image: url({{url($value->img) }});"></div>
							<h3 class="hh"><span>{{ $value->name }}</span></h3>
							<div class="price">{{ $value->price }} <span class="price_currency">{{ $currency }}</span></div>
						</a>
					@endif
				@endforeach
			@endisset

		</div>
	</div>
</section>
@endsection

@section('script')		
<script>
	$(document).ready(function () {
		$('#active_menu_3').addClass('active');
	});

	function addtocart(id) {
		$.ajax({
			url: '/addproduct',
			cache: false,
			dataType: 'html',
			data: {'product_id':id},
			type: "POST",
			success: function (data) {
				//$('#response').html(response);
				$('.modal_').dialog();	
				$('.modal_ p').empty().html(data)
			} 
		}); 
	};
</script>
@endsection
