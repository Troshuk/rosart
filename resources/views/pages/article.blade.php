@extends('padding')
@section('seo')
<title>@if($blog->metatitle){{ $blog->metatitle }}@else{{ $blog->name }}@endif</title>
<meta name="keywords" content="{{ $blog->keywords }}">
<meta name="description" content="{{ $blog->description }}">
@endsection
@section('content')
<div class="article_top" style="background-image: url({{ url($blog->img) }});">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li>
				<a class="underscore" href="{{ url('/') }}">
					@lang('index.menu_general')
				</a>
			</li>
			<li>
				<a class="underscore" href="{{ url('/blog') }}">
					@lang('index.menu_blog')
				</a>
			</li>
			<li>
				<a class="underscore" href="{{ url('/blog',$category->href) }}">
					{{ $blog->category }}
				</a>
			</li>
			<li>
				<span>
					{{ $blog->name }}
				</span>
			</li>
		</ul>
		<div class="article_tt">
			<h1 class="ttl">
				<span>
					{{	$blog->name }}
				</span>
			</h1>
		</div>
		<div class="article_info">
			<div class="tcell">
				<svg class="icon icon-eye">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-eye">
					</use>
				</svg>&nbsp;
				<span>
					{{	$blog->view }}
				</span>
			</div>
			<div class="tcell nowrap">
				<svg class="icon icon-calendar">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-calendar">
					</use>
				</svg>
				<span>
					{{	$blog->created_at }}
				</span>
			</div>
			<div class="tcell">
				<svg class="icon icon-pencil">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-pencil">
					</use>
				</svg>
				<span>
					{{	$blog->user_name }}
				</span>
			</div>
		</div>
	</div>
</div>
<section class="article">
	<div class="wrapper">
		<div class="content">
			{!!	$blog->text !!}
		</div>
		<div class="share_soc">
			<a onclick="Share.twitter('URL','{{ $blog->name }}')">
            	<svg class="icon icon-twitter">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-twitter">
					</use>
				</svg>
            </a>
            <a onclick="Share.google('URL','{{ $blog->name }}', 'http://rosart.club/' + '{{ $blog->img }}','{{$desc_soc}}' + '...')">
            	<svg class="icon icon-google">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-google">
					</use>
				</svg>
            </a>
			<a onclick="Share.facebook('URL','{{ $blog->name }}', 'http://rosart.club/' + '{{ $blog->img }}','{{$desc_soc}}' + '...')">
				<svg class="icon icon-facebook">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-facebook2">
					</use>
				</svg>
			</a>
		</div>
	</div>
</section>
@endsection


@section('script')
<script>
	$(document).ready(function ()
	{
		$('#active_menu_104').addClass('active');
	});
</script>
@endsection
