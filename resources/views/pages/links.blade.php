@extends('index')
@section('seo')
	<style>
		.demo {width: 50%;float: left;padding: 5rem 10rem;}
		.demo li {margin-bottom: 1rem;font-size: 2rem}
	</style>
@endsection

@section('content')
	<div class="mosaic" style="background-image: url(img/product_top_bg.jpg);">&nbsp;</div>
	<div class="wrapper">
		<ul class="demo">
			<li><a href="{{ url('/') }}" target="_blank" class="underscore_rev">@lang('index.menu_general')</a></li>
			<li><a href="{{ url('/about') }}" target="_blank" class="underscore_rev">@lang('index.menu_about')</a></li>
			<li><a href="{{ url('/masters') }}" target="_blank" class="underscore_rev">@lang('index.menu_masters')</a></li>
			<li><a href="{{ url('/master') }}" target="_blank" class="underscore_rev">@lang('index.menu_master')</a></li>
			<li><a href="{{ url('/catalog') }}" target="_blank" class="underscore_rev">@lang('index.menu_catalog')</a></li>
			<li><a href="{{ url('/category') }}" target="_blank" class="underscore_rev">@lang('index.category')</a></li>
			<li><a href="{{ url('/product') }}" target="_blank" class="underscore_rev">@lang('index.menu_product')</a></li>
			<li><a href="{{ url('/blog') }}" target="_blank" class="underscore_rev">@lang('index.menu_blog')</a></li>
			<li><a href="{{ url('/blog_popular') }}" target="_blank" class="underscore_rev">@lang('index.menu_blog_popular')</a></li>
			<li><a href="{{ url('/article') }}" target="_blank" class="underscore_rev">@lang('index.article')</a></li>
		</ul>
		<ul class="demo">
			<li><a href="{{ url('/contacts') }}" target="_blank" class="underscore_rev">@lang('index.menu_contacts')</a></li>
			<li><a href="{{ url('/how_buy') }}" target="_blank" class="underscore_rev">@lang('index.menu_how_buy')</a></li>
			<li><a href="{{ url('/cart') }}" target="_blank" class="underscore_rev">@lang('index.cart')</a></li>
			<li><a href="{{ url('/dashboard') }}" target="_blank" class="underscore_rev">@lang('index.dashboard')</a></li>
			<li><a href="{{ url('/search') }}" target="_blank" class="underscore_rev">@lang('index.search_result')</a></li>
			<li><a href="{{ url('404') }}" target="_blank" class="underscore_rev">@lang('index.error_404')</a></li>
			<li><h3>Модальные окна</h3></li>
			<li><a href="#" class="underscore_rev" onclick="$('.modal_feedback').dialog();return false;">@lang('index.dialog_title')</a></li>
			<li><a href="#" class="underscore_rev" onclick="$('.modal_alert_book').dialog();return false;">@lang('index.dialog_subscribe')</a></li>
			<li><a href="#" class="underscore_rev" onclick="$('.modal_registration').dialog();return false;">@lang('index.dialog_register')</a></li>
			<li><a href="#" class="underscore_rev" onclick="$('.modal_login').dialog();return false;">@lang('index.dialog_signin')</a></li>
		</ul>
	</div>
	
@endsection	
