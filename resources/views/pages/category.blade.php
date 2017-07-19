@extends('index')
@section('seo')
	@if($category)
		<title>@if($category->metatitle){{ $category->metatitle }}@else{{ $category->name }}@endif</title>
		<meta name="keywords" content="{{ $category->keywords }}">
		<meta name="description" content="{{ $category->description }}">
	@elseif($master)
		<title>@if($master->metatitle){{ $master->metatitle }}@else{{ $master->name }}@endif</title>
		<meta name="keywords" content="{{ $master->keywords }}">
		<meta name="description" content="{{ $master->description }}">
	@else
		<title>{{ $seo->metatitle }}</title>
		<meta name="keywords" content="{{ $seo->keywords }}">
		<meta name="description" content="{{ $seo->description }}">
	@endif
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
@endsection
@section('content')
<div class="adb_pic_wd" style="background-image: url(/img/category_bg.jpg);" >
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li><a class="underscore" href="{{ url('/') }}">@lang('index.menu_general')</a></li>
			<li><a class="underscore" href="{{ url('/') }}">@lang('index.catalog')</a></li>
			<li><span>Живопись</span></li>
		</ul>
	</div>
</div>
<section class="category">
	<div class="wrapper">
		<h1 class="title">@lang('index.catalog')</h1>
		<div class="category_nav">
			@isset($categories)
			@foreach($categories as $value)
			@if($value->id)
			<a href="{{ url('/catalog',$value->href) }}" class="button @isset($category->id) @if($value->id == $category->id) {{'|| active'}} @endif @endisset"><span>{{ $value->name }}</span><i class="ic_dir_arrow"></i></a>
			@else
			@endif
			@endforeach
			@endisset
		</div>
		<div class="rows">
			<!-- CATEGORY SIDEBAR -->

			<aside class="category_sidebar" id="filter_master">
				<h3 class="h3">@lang('index.category_show')</h3>
				<div class="filterWrap isOpened">
					<div class="filterHead">@lang('index.category_price')</div>
					<div class="filterBody filterSlider" id="filterSlider">
						<div id="filter_price"></div>
						<div class="rows">
							<input type="text" id="amount_from" class="from" readonly style="border:0;">
							<input type="text" id="amount_to" class="to" readonly style="border:0;">
						</div>
					</div>
				</div>
				<div class="filterWrap isOpened" > 
					<div class="filterHead" >@lang('index.category_master')</div>
					<ul class="filterBody"  >
						@isset($masters)
						@foreach($masters as $value)
						@if($value->id)
						<li>
							<input type="checkbox" class="checkbox" id="masters_{{$value->id}}" 
							data="{{$value->name}}" {{ ($value->id==$mas_id)?"checked":""}}>	
							<label for="masters_{{$value->id}}">{{$value->name}}</label>
						</li>
						@else
						@endif
						@endforeach
						@endisset
					</ul>
				</div>
				<div class="filterWrap isOpened">
					<div class="filterHead">@lang('index.category')</div>
					<ul class="filterBody">

						@isset($categories)
						@foreach($categories as $value)
						@if($value->id)
						<li><input type="checkbox" class="checkbox" id="categories_{{$value->id}}"
							data="{{$value->name}}" {{ ($value->id==$cat_id)?"checked":""}}>
							<label for="categories_{{$value->id}}">{{$value->name}}</label>
						</li>
						@else
						@endif
						@endforeach
						@endisset
					</ul>
				</div>
				<div class="filterWrap isOpened">
					<div class="filterHead">Техника</div>
					<ul class="filterBody">
						@isset($technique)
						@foreach($technique as $value)
						@if($value->id)
						<li>
							<input type="checkbox" class="checkbox" id="technique_{{$value->id}}"
							data="{{$value->name}}"
							>
							<label for="technique_{{$value->id}}">{{$value->name}}</label>
						</li>
						@else
						@endif
						@endforeach
						@endisset
					</ul>
				</div>
			</aside>

			<!-- CATEGORY CONTENT -->
			<div class="category_content">
				<div class="rows">
					<select name="" class="filter_sort_by" data-placeholder="@lang('index.sorting')" id="filter_sort_by">
						<option value="0"></option>
						<option value="1">@lang('index.category_new')</option>
						<option value="2">@lang('index.category_pricemore')</option>
						<option value="3">@lang('index.category_priceless')</option>
						<option value="4">@lang('index.category_name_az')</option>
						<option value="5">@lang('index.category_name_za')</option>
					</select>
				</div>

				<div class="category_items" id="response">
					@isset($products)
						@foreach($products as $value)
							@if($value->id)
								<div class="category_item" style="background-image: url({{url($value->img)}});">
									<div class="img" style="background-image: url({{url($value->img)}});"></div>
									<div class="category_info">
										<h3 class="hh"><span>{{$value->name}}</span></h3>
										<div class="currency || js_DropWrap">
											<div><span>{{$value->price}}</span> <span class="price_currency">{{ $currency }}</span></div>
										</div>
										<div class="category_btns">
											<a href="{{ url('/product',$value->href) }}" class="button"><span>@lang('index.category_more')</span><i class="ic_dir_arrow"></i></a>
											<button class="button" onclick="@if(Auth::check())addtocart('{{ $value->id }}')@else$('.modal_login').dialog();return false;@endif"><span>@lang('index.add_to_cart')</span><svg class="icon icon-cart"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-cart"></use></svg></button>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					@endisset
				</div>
				<div id="pagination">{!! $products->links('pagination') !!}</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')	
<script type="text/javascript">
	$(document).ready(function () {

		$('#active_menu_3').addClass('active');

		$("input[type='checkbox']").click(function () {
			categoryPost(getVAR("filter_master","filter_sort_by"));
		});

		$(".filterSlider").mouseup(function(){
			categoryPost(getVAR("filter_master","filter_sort_by"));
		});

		$('.filter_sort_by').on('change', function() {
			categoryPost(getVAR("filter_master","filter_sort_by"));
		})

		$(document).on('click', '#pagination a', function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			categoryPost(getVAR("filter_master","filter_sort_by"), page);
		});

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


	function categoryPost(masters, page = 1) {

		$.ajax({
			url: '/catalog?page='+page,
			cache: false,
			data: {'masters': masters, '_token': $('meta[name="csrf-token"]').attr('content')},
			type: "POST",
			success: function (response) {
				$('#pagination').html('');
				$('#response').html(response);
			} 
		}); 

	};

	function getVAR(id,idf)
	{
		history.pushState(null, null, '/catalog');
		var inputValues = {};
		$('#'+id+' input,select,input[type=checkbox],textarea').each(function(){
			if ( $(this).attr('type')=='checkbox' && $(this).is(":checked") ) inputValues[$(this).attr('id')] = $(this).attr('data');
			else if ($(this).attr('type')=='text' )  inputValues[$(this).attr('id')] = $.trim($(this).val());
			else if ($(this).attr('type')=='readonly')  inputValues[$(this).attr('id')] = $.trim($(this).val());
		});

		inputValues[$('#'+idf).attr('id')] = $.trim($('#'+idf).val());

		var params = {};
		$.each(inputValues, function(key, value) {params[key] = value;});  
		return params;
	}

	$(function() {
		$( "#filter_price" ).slider({
			range: true,
			min: {{ $min }},
			max: {{ $max }},
			values: [ {{ $min }}, {{ $max }} ],
			slide: function( event, ui ) {
				$( "#amount_from" ).val(ui.values[ 0 ] + ' {{ $currency }}');
				$( "#amount_to" ).val(ui.values[ 1 ] + ' {{ $currency }}');
			}
		});
		$( "#amount_from" ).val($( "#filter_price" ).slider( "values", 0)  + ' {{ $currency }}');
		$( "#amount_to" ).val($( "#filter_price" ).slider( "values", 1)  + ' {{ $currency }}');
	});
</script>
@endsection
