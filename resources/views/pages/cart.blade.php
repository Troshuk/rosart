@extends('padding')
@section('content')
<div class="mosaic" style="background-image: url(img/product_top_bg.jpg);">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li><a class="underscore" href="{{ url('/') }}">@lang('index.menu_general')</a></li>
			<li><span>@lang('index.cart')</span></li>
		</ul>
	</div>
</div>
<section class="cart">
	<div class="wrapper">
		@if($cart)
			<div class="rows">
				<h1 class="title_">@lang('index.cart_my') <span>({{count($cart)}})</span></h1>
				<a href="#" id="checkout" class="button || btn_2"><span>@lang('index.cart_checkout')</span> <i class="ic_dir_arrow"></i></a>
			</div>

			<table class="table_product || table_res">
				<thead>
					<tr>
						<th>@lang('index.cart_product_name')</th>
						<th>@lang('index.cart_summ')</th>
					</tr>
				</thead>
				<tbody>

					@if($cart)
					@foreach($cart as $key=>$value)
					@if($value->id)
					<tr>
						<td class="td_product" data-title="@lang('index.cart_product_name')">
							<div class="td_mob">
								<a href="{{ url('/product',$value->href) }}">
									<div class="item"><div class="img" style="background-image: url({{url($value->img)}});"></div></div>							
									<div class="item">
										<h4 class="tt">{{$value->name}}</h4>
									</div>
								</a>
							</div>
						</td>

						<td data-title="@lang('index.cart_summ')">
							<div class="td_mob">
								<div class="total_price">{{$value->price}} <span class="price_currency">{{$currency}}</span></div>
								<button class="btn_del_cart || underscore" onclick="@if(Auth::check())deletefromcart('{{ $value->id }}')@else$('.modal_login').dialog();return false;@endif">@lang('index.cart_remove')</button>
							</div>
						</td>
					</tr>
					@endif
					@endforeach
					@endif

				</tbody>
			</table>

			<div class="cart_bottom">
				<div class="full_price">@lang('index.cart_summ'): </div>
				<a href="#" id="checkoutdown" class="button || btn_3"><span>@lang('index.cart_checkout')</span> <i class="ic_dir_arrow"></i></a>
			</div>
		@else
			<div class="rows">
				<h1 class="title_">@lang('index.cart_empty')</h1>
			</div>
		@endif
	</div>
</section>
@endsection


@section('script')		
<script>

	var sum = 0;
	$('.total_price').each(function(){
   		sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
	});

	$(document).ready(function () {
		$('.full_price').empty().html('@lang('index.cart_summ')' + ': ' + sum + ' <span class="price_currency">{{$currency}}</span>');
	});

	$('#checkoutdown').on('click',function(e){
		$('#checkout').click();
	});



	function existcheckout(){
		var formData = {
			action:"existcheckout",
			_token: $('meta[name="csrf-token"]').attr('content'),
		}
		$.ajax({
			type: "POST",
			url: "/checkout",
			data: formData,
			dataType: 'html',
			success: function (data) {			
				//location.reload();
				if (data!=''){
				/*$('.modal_').dialog();	
				$('.modal_ p').empty().html(data)*/

				$('.modal_registration').dialog();	
				$('.modal_registration').empty().html(data)
			} else  checkout();
		}
	});

	};

	function checkout(){
		var cart={!!json_encode($cart)!!};
		if(cart.length > 0){

			//e.preventDefault(); 
			var formData = {
				"action":"checkout",
				"_token":$('meta[name="csrf-token"]').attr('content')
			}
			$.ajax({
				type: "POST",
				url: "/checkout",
				data: formData,
				dataType: 'html',
				success: function (data) {
					/*$('.modal_').dialog();	
					$('.modal_ p').empty().html(data)*/
					//$('.dialog_close').trigger('click');

					$('.modal_registration').dialog();	
					$('.modal_registration').empty().html(data)
					
				}
			});
		}
	};

	$('#checkout').on('click',function(e){
		existcheckout();
	});

	function deletefromcart(id) {
		$.ajax({
			url: '/deleteproduct',
			cache: false,
			dataType: 'html',
			data: {'product_id':id},
			type: "POST",
			success: function (data) {
				//$('#response').html(response);
				$('.modal_').dialog();	
				$('.modal_ p').empty().html(data)
				setTimeout(function() {
	                $('.modal_').hide(300);
	                location.reload();
	            }, 2000);
			} 
		}); 
	};
</script>
@endsection