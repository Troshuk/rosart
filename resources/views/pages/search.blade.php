@extends('index')
@section('seo')
<title>search | </title>
<meta name="keywords" content="">
<meta name="description" content="">
@endsection

@section ('content')
<section class="search_result">
	<div class="wrapper">
		<div class="search_result_top"><span>@lang('index.search_result')</span><strong>{{$search}}</strong></div>
		<div class="search_result_items">

		@if($products)
			@if($products)
				<div class="search_result_top"><span>@lang('index.masters_work')</span></div>
				@foreach($products as $key=>$value)
					@if($value->id)
						<a href="{{ url('/product',$value->href) }}" class="search_result_item">
							<div class="img" style="background-image: url({{url($value->img)}});"></div>
							<h3 class="hh">{{$value->name}}</h3>			
						</a>
					@endif
				@endforeach
			@endif

			@if($blogs)
				<div class="search_result_top"><span>@lang('index.menu_blog')</span></div>
				@foreach($blogs as $key=>$value)
					@if($value->id)
						<a href="{{ url('/article',$value->href) }}" class="search_result_item">
							<div class="img" style="background-image: url({{url($value->img)}});"></div>
							<h3 class="hh">{{$value->name}}</h3>	
						</a>
					@endif
				@endforeach
			@endif
		@else
			
		@endif

		</div>
	</div>
</section>
@endsection	
@section('script')
<script>
	$(document).ready(function () {

		$("body").addClass('topPadidng');
	});
</script>
@endsection
