<div class="login_form cart_form">
	@if($product)
		<div class="title">@lang('index.addtocart')</div>
		<label class="labels" >{{$product->name}}</label>
		<a id="okbutton" href="{{ url('/cart') }}" class="button || btn_3" style="margin: 2.2rem 0 1rem;"><span>@lang('index.addtocartgo')</span> <i class="ic_dir_arrow"></i></a>
	@else
		<div class="title">@lang('index.cartsold')</div>
	@endif
</div>