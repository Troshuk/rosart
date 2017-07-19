@extends('padding')
@section('seo')
	<title>{{ $seo->metatitle }}</title>
	<meta name="keywords" content="{{ $seo->keywords }}">
	<meta name="description" content="{{ $seo->description }}">
@endsection
@section('content')
	<div class="contacts_top" style="background-image: url(img/contacts_bg.jpg);"></div>
	<section class="contacts">
		<div class="wrapper">
			<div class="contacts_info">
				<h2 class="title_">@lang('index.menu_contacts')</h2> 
				<p class="p1">{!! $contacts->text !!}</p>
				<h3 class="h4">@lang('index.dialog_phone')</h3>
				<p>
					<a class="ic" href="tel:+7 (951) 676 34 65">
						<svg class="icon icon-phone"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-phone"></use></svg>
						<span class="underscore">{!! $contacts->phone !!}</span>
					</a>
				</p>
				<h3 class="h4">@lang('index.dialog_email')</h3>
				<p>
					<a class="ic" href="mailto:{!! $contacts->email !!}" target="_blank">
						<svg class="icon icon-mail"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-mail"></use></svg>
						<span class="underscore_rev">{!! $contacts->email !!}</span>
					</a>
				</p>
				<h3 class="h4">@lang('index.adress')</h3>
				<p class="ic">
					<svg class="icon icon-location"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-location"></use></svg>
					{!! $contacts->adress !!}
				</p>
			</div>
			<div class="contacts_form" id="feedback">
				<form action="#" class="feedback">
					<h2 class="title_">@lang('index.contacts_email')</h2>
					<p class="p1">@lang('index.contacts_quest1')</p>
					<div class="input_effect">
						<input name="" type="text" class="input" id="name">
						<label class="labels">@lang('index.contacts_quest2')</label>
					</div>
					<div class="input_effect">
						<input name="" type="email" class="input" id="email">
						<label class="labels">@lang('index.dialog_email')</label>
					</div>
					<input name="" type="text" class="input" placeholder="+ _ _ ( _ _ _ ) _ _ _ - _ _ - _ _" id="phone">
					<div class="input_effect">
						<textarea name="" class="input" id="question"></textarea>
						<label class="labels">@lang('index.dialog_question3') </label>
					</div>
					<button class="button" id="button_feedback" onclick="feedback(); return false;">@lang('index.send')</button>
				</form>
			</div>
		</div>
	</section>

	<div class="b_subscribe">
		<div class="wrapper">
			<h3 class="title">@lang('index.contacts_special')</h3>
			<p>@lang('index.contacts_special')</p>
			<div class="subscribe">
				<input id="s_email" type="email" class="input" placeholder="@lang('index.dialog_email')">
				<button id="addEmail" class="button"><span>@lang('index.subscribe')</span> <i class="ic_dir_arrow"></i></button>
			</div>
		</div>
	</div>
@endsection

@section('script')	
	<script>
		$(document).ready(function () {
			$('#active_menu_5').addClass('active');
		});

		function feedback(){
			var formData = {
				"name": $('.feedback #name').val(),
				"email": $('.feedback #email').val(),
				"phone": $('.feedback #phone').val(),
				"question": $('.feedback #question').val(),
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
					$('input').removeClass('ui-state-error');
					$(".feedback")[0].reset();
						//$('#feedback').dialog();	
						//$('#feedback').empty().html(data)
						
				},
				error: function (data) {
			       	var i=0;
			       	$.each(JSON.parse(data.responseText), function(idx, obj) {
			       		i++;
			       		if (i==1) {
			       			$('input').removeClass('ui-state-error');
			       			$("#feedback #"+idx).addClass('ui-state-error');
			       			$("#feedback #"+idx).focus();
			       			$('#feedback #overlay').remove();
			       			$('#feedback #'+idx+'').after('<div id="overlay" ></div>');
			       			$('#feedback #overlay').empty().html(obj);
			       		}
			       	});
			    }
			});
		};
	</script>
@endsection
