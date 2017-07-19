@if ($paginator->hasPages())
	<ul class="paginations">
		@if ($paginator->onFirstPage())
			<li class="no_active"></li>
		@else
			<li class="prev"><a href=" {{ $paginator->previousPageUrl() }} "></a></li>
		@endif

		@foreach($elements as $element)
			@if(is_string($element))
				<li><a href="#">{{ $element }}</a></li>
			@endif

			@if(is_array($element))
				@foreach($element as $page => $url)
					@if($page == $paginator->currentPage())
						<li class="active"><a href="#">{{ $page }}</a></li>
					@else
						<li><a href=" {{ $url }} ">{{ $page }}</a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		@if($paginator->hasMorePages())
			<li class="next"><a href=" {{ $paginator->nextPageUrl() }} "></a></li>
		@else
			<li class="no_active"><span>...</span></li>
		@endif
	</ul>
@endif