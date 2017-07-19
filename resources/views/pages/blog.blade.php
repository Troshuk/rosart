@extends('padding')
@section('seo')
	@if($category)
		<title>@if($category->metatitle){{ $category->metatitle }}@else{{ $category->name }}@endif</title>
		<meta name="keywords" content="{{ $category->keywords }}">
		<meta name="description" content="{{ $category->description }}">
	@else
		<title>{{ $seo->metatitle }}</title>
		<meta name="keywords" content="{{ $seo->keywords }}">
		<meta name="description" content="{{ $seo->description }}">
	@endif
@endsection

@section('content')
<div class="blog_top" style="background-image: url(/img/blog_bg.jpg);">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li>
				<a class="underscore" href="{{ url('/') }}">
					@lang('index.menu_general')
				</a>
			</li>
			<li>
				<span>
					@lang('index.menu_blog')
				</span>
			</li>
		</ul>
	</div>
</div>

<section class="blog">
	<div class="wrapper">
		<div class="blog_nav">
			<a href="{{ url('/blog_popular') }}" class="button">
				@lang('index.menu_blog_popular')
			</a>
			@foreach($blog_categories as $value)
				@if($value->href)
					<a href="{{ url('/blog',$value->href) }}" class="button">
						{{$value->name}}
					</a>
				@endif
			@endforeach
		</div>

		@if($blog)
			<div class="blog_items">
				@for($i = 0; $i < count($blog); $i++)
					<div class="blog_item">
						<div class="blog_pic">
							<a href="{{ url('/article',$blog[$i]->href) }}" class="img">
								<i style="background-image: url({{ url($blog[$i]->img) }});">
								</i>
							</a>
						</div>
						<div class="blog_content">
							<h2 class="h3">
								{{  $blog[$i]->name }}
							</h2>
							
							{!!str_limit($blog[$i]->text, 250)!!}
							<a href="{{ url('/article',$blog[$i]->href) }}" class="more">
								<span class="underscore">
									@lang('index.readmore')
								</span>
								<i class="arr_right">
								</i>
							</a>
						</div>
					</div>
				@endfor
			</div>
		@endif
	</div>
	@include('blocks/pagination')
</section>
@endsection

@section('script')
<script>
	$(document).ready(function ()
	{
		$('#active_menu_4').addClass('active');
	});
</script>
@endsection
