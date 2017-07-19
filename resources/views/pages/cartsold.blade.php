<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='img/svgdefs.svg#icon_close'></use></svg></span>
<form action="#" class="login_form" id="register-form">
	<div class="title">@lang('index.cartsold')</div>
	@isset($cartsold)
		@foreach($cartsold as $key=>$value)
			@if($value->id)
				<label class="labels">{{$value->name}}</label>
			@endif
		@endforeach
	@endisset
	<a id="okbutton" href="{{ url('/cart') }}" class="button || btn_3" style="margin: 2.2rem 0 1rem;"><span>@lang('index.addtocartgo')</span> <i class="ic_dir_arrow"></i></a>
</form>

<script>
$('.dialog_close').dialog('close');
	$('#okbutton').on('click',function(e){	
		location.reload();
	});
</script>
