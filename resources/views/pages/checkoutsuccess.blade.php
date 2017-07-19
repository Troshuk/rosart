<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='/img/svgdefs.svg#icon_close'></use></svg></span>
<span class="ico_check"></span>
<p>@lang('index.cart_success')<br>@lang('index.feedback')</p>
<a id="okbutton" href="{{ url('/cart') }}" class="button || btn_3" style="margin: 2.2rem 0 1rem;"><span>@lang('index.addtocartgo')</span> <i class="ic_dir_arrow"></i></a>


<script>
	$('.dialog_close').dialog('close');
	$('#okbutton').on('click',function(e){
		location.reload();
	});

</script>				