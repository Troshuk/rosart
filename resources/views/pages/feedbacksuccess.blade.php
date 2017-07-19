<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='/img/svgdefs.svg#icon_close'></use></svg></span>
<span class="ico_check"></span>
<p>@lang('index.feedback')</p>
<a id="okbutton" href="#" class="button || btn_3" style="margin: 2.2rem 0 1rem;"><span>@lang('index.close')</span> <i class="ic_dir_arrow"></i></a>


<script>
	$('.dialog_close').dialog('close');
	$('#okbutton').on('click',function(e){
		$('.dialog_close').trigger('click');	
	});

</script>				