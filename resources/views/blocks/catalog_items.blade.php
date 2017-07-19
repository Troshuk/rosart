<div class="catalog_items">
	@isset($categories)
		@foreach($categories as $value)
			@if($value->id)
				<a href="{{ url('/category',$value->href) }}" class="catalog_item">
					<div class="img" style="background-image: url({{url($value->img)}});"></div>
					<h3 class="hh">{{ $value->name }}</h3>
				</a>
			@endif
		@endforeach
	@endisset
</div>



