
<form action="#" class="login_form" id="register-form">
	<div class="title">@lang('index.existcart')</div>
	<label class="labels" >{{$products->name}}</label>
	
	<a id="okbutton" href="{{ url('/cart') }}" class="button || btn_3" style="margin: 2.2rem 0 1rem;"><span>@lang('index.addtocartgo')</span> <i class="ic_dir_arrow"></i></a>
</form>

<script>
	$('#okbutton').on('click',function(e){	
		location.reload();
	});
</script>		
