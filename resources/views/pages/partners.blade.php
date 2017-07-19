@extends('index1')

@section('seo')
<title>Комплекс безопасности | </title>
<meta name="keywords" content="">
<meta name="description" content="">
@endsection

@section('content')
<section class="partners">
	<div class="wrapper">
		<h1 class="title_">Партнёры</h1>
		@if(!$partners->isEmpty())
		<div class="partners_items">
			@foreach($partners as $partner)
			@if($partner->url)
			<div class="partners_item">
				<a target="_blank" href="{{ $partner->url }}">
					<img src="../{{ $partner->image }}" alt="{{ $partner->title }}">
				</a>
			</div>
			@else
			<div class="partners_item">
				<img src="../{{ $partner->image }}" alt="{{ $partner->title }}">
			</div>
			@endif
			@endforeach
		</div>
		@endif
	</div>
</section>
@endsection

@section('script')
<script>
	$(document).ready(function () {
		$('#active_menu_13').addClass('active');
	});
</script>
@endsection
