	<section class="cart">
		<div class="wrapper">
			<div class="rows">
				<h1 class="title_">@lang('index.cart_my') <span>({{count($cart)}})</span></h1>
				<a href="#" class="button || btn_2"><span>@lang('index.cart_checkout')</span> <i class="ic_dir_arrow"></i></a>
			</div>
			
			<table class="table_product || table_res">
				<thead>
					<tr>
						<th>@lang('index.cart_product_name')</th>
						<th>@lang('index.cart_summ')</th>
					</tr>
				</thead>
				<tbody>

		@isset($cart)
			@foreach($cart as $key=>$value)
			@if($value->id)
			<tr>
						<td class="td_product" data-title="@lang('index.cart_product_name')">
							<div class="td_mob">
								<a href="{{ url('/product',$value->product_id) }}">
									<div class="item"><div class="img" style="background-image: url({{url($value->img)}});"></div></div>							
									<div class="item">
										<h4 class="tt">{{$value->name}}</h4>
									<!-- 	<div class="price">{{$value->price}}</div> -->
									</div>
								</a>
							</div>
						</td>
						
						<td data-title="Итого">
							<div class="td_mob">
								<div class="total_price">{{$value->price}}</div>
								<button class="btn_del_cart || underscore">@lang('index.cart_remove')</button>
							</div>
						</td>
					</tr>
			@else
			@endif
			@endforeach
			@endisset

				</tbody>
			</table>

			<div class="cart_bottom">
				<div class="full_price">Итого: </div>
				<a href="#" class="button || btn_3"><span>@lang('index.cart_checkout')</span> <i class="ic_dir_arrow"></i></a>
			</div>
		</div>
	</section>
