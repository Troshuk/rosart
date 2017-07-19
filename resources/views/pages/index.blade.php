@extends('index')
@section('seo')
<title>{{ $seo->metatitle }}</title>
<meta name="keywords" content="{{ $seo->keywords }}">
<meta name="description" content="{{ $seo->description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')	
<section class="main_adb || topPadidng">
	<div class="posTop"></div>
	<div class="main_adb_content" style="background-image: url(img/main_adb.jpg);">
		<div class="wrapper">
			<h2 class="hh">@lang('index.gallery')</h2>
			<h4 class="pp">@lang('index.gallery_desc')</h4>
			<a href="{{ url('/catalog') }}" class="button"><span>@lang('index.catalog')
			</span> <i class="ic_dir_arrow"></i></a>
		</div>
	</div>
</section>

<section class="catalog">
	<div class="wrapper">
		@include('blocks.catalog_items')
	</div>
</section>


<div class="main_bg" style="background-image: url(img/main_bg.jpg);">
	<div class="wrapper">
		

		<main class="b_about">
			<div class="column cl1">
				<div class="double_pic">
					<div class="pic || wow slideInLeft" data-wow-offset="100" data-wow-delay="0.5s" data-wow-duration="1s" style="background-image: url({{$about->img2}});"></div>
					<div class="pic ||  wow zoomIn" data-wow-offset="200" data-wow-delay="2s" data-wow-duration="1s" style="background-image: url({{$about->img1}});"></div>
				</div>
			</div>
			<div class="column cl2">
				<h1 class="title_">О Галерее</h1>
				{!!$about->text1!!}
				<a href="{{ url('/about') }}" class="read_more"><span>Подробнее</span> <i class="ic_dir_arrow"></i></a>
			</div>
		</main>


		<section class="forwhom">
			<div class="column cl1">
				<div class="double_pic_rev">
					<div class="pic || wow slideInUp" data-wow-offset="100" data-wow-delay="0.5s" data-wow-duration="1s" style="background-image: url({{$about->img4}});"></div>
					<div class="pic || wow fadeIn" data-wow-offset="200" data-wow-delay="2s" data-wow-duration="1s" style="background-image: url({{$about->img3}});"></div>
				</div>
			</div>
			<div class="column cl2">
				<h3 class="title_">Для кого?</h3>
				<div class="pp">
					<p>Краткая информация: Sed ut perspiciatis unde omnis iste natus</p>
				</div>
				<div class="forwhom_items">
					<div class="forwhom_item">
						<svg class="icon icon-painting"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-painting"></use></svg>
						<span>Любители искусства</span>
					</div>
					<div class="forwhom_item">
						<svg class="icon icon-gift"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-gift"></use></svg>
						<span>В подарок</span>
					</div>
					<div class="forwhom_item">
						<svg class="icon icon-landscape"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-landscape"></use></svg>
						<span>Коллекционерам картин</span>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<section class="gallery">
	<div class="wrapper">
		<h2 class="title_">Галерея</h2>
		<div id="mygallery" class="gallery_grid">
			@if($about->imgs)
				@foreach(explode(',', $about->imgs) as $key => $image)
					<a href="{{ url($image) }}"><img src="{{ url($image) }}"></a>
				@endforeach
			@endif
		</div>
	</div>
</section>

<section class="special" style="background-image: url(img/red_bg.jpg);">
	<div class="wrapper">
		<div class="column cl1">
			<div class="special_content">
				<h2 class="title_">@lang('index.contacts_special')</h2>
				<p>@lang('index.contacts_special_desc')</p>
				<div class="subscribe">
					<input id="s_email" type="email" class="input" placeholder="@lang('index.dialog_email')">
					<button id="addEmail" class="button"><span>@lang('index.subscribe')</span> <i class="ic_dir_arrow"></i></button>
				</div>
			</div>
		</div>
		<div class="column cl2"><img src="img/frame.png" alt="img"></div>
	</div>
</section>

<section class="b_contacts">
	<div class="wrapper">
		<h2 class="title_">@lang('index.menu_contacts')</h2> 
		<div class="rows">
			<div class="column1">
				<p class="p1">{{$contacts->text}}</p>
				<div class="rows">
					<div class="coln1">
						<p class="ic">
							<a href="tel:{{$contacts->phone}}" target="_blank"><svg class="icon icon-phone"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-phone"></use></svg>{{$contacts->phone}}</a>
						</p>
						<p class="ic">
							<a href="mailto:{{$contacts->email}}" target="_blank"><svg class="icon icon-envelope"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-envelope"></use></svg><span class="underscore_rev">{{$contacts->email}}</span></a>
						</p>
					</div>
					<div class="coln2">
						<p class="ic">
							<svg class="icon icon-marker"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/svgdefs.svg#icon-marker"></use></svg>
							{!!$contacts->adress!!}
						</p>
					</div>
				</div>
			</div>
			<div class="column2">
				<p>@lang('index.dialog_desc')</p>
				<button class="button" onclick="$('.modal_feedback').dialog()"><span>@lang('index.dialog_title')</span><i class="ic_dir_arrow"></i></button>
			</div>
		</div>
	</div>
</section>
@endsection


@section('script')
<script>
	$(document).ready(function () {

		$("#mygallery").justifiedGallery({
			rowHeight : 420,
			lastRow : 'nojustify',
			margins : 15,
			captions: false,
			rel : 'gallery1',

		})

		if (window.location.hash == '#login') {
			@if(!Auth::check())
		        $('.modal_login').dialog();
		    @endif
		        window.location.hash = '';
	    }
	});

	function feedback(){
		var formData = {
			"name": $('.modal_feedback #name').val(),
			"email": $('.modal_feedback #email').val(),
			"phone": $('.modal_feedback #phone').val(),
			"question": $('.modal_feedback #question').val(),
			"_token":$('meta[name="csrf-token"]').attr('content')
		}
		$.ajax({
			type: "POST",
			url: "/feedback",
			data: formData,
			dataType: 'html',
			success: function (data) {
					/*$('.modal_').dialog();	
					$('.modal_ p').empty().html(data)*/
					//$('.dialog_close').trigger('click');
				$('.dialog_close').trigger('click');	
				$('.modal_alert_book').dialog();
				$('.modal_alert_book').empty().html(data);

					//$('#modal_feedback').dialog();	
					//$('#modal_feedback').empty().html(data)
					
			},
			error: function (data) {
		       	var i=0;
		       	$.each(JSON.parse(data.responseText), function(idx, obj) {
		       		i++;
		       		if (i==1) {
		       			$('input').removeClass('ui-state-error');
		       			$("#modal_feedback #"+idx).addClass('ui-state-error');
		       			$("#modal_feedback #"+idx).focus();
		       			$('#modal_feedback #overlay').remove();
		       			$('#modal_feedback #'+idx+'').after('<div id="overlay" ></div>');
		       			$('#modal_feedback #overlay').empty().html(obj);
		       		}
		       	});
		    }
		});
	};

</script>
@endsection