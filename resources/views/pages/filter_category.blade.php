			<!-- CATEGORY CONTENT -->


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
								<button class="button" onclick="addtocart('{{$value->id}}')"><span>@lang('index.add_to_cart')</span><svg class="icon icon-cart"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-cart"></use></svg></button>
							</div>
						</div>
					</div>
					@else
					@endif
					@endforeach
					@endisset
				</div>
				<div id="pagination">{!! $products->links('pagination') !!}</div>
		