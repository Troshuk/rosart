<footer class="footer" style="background-image: url(/img/footer.jpg);">
	<div class="wrapper">
		<div class="footer_content">
			<div class="column cl1">
				<a href="index.php" class="footer_logo">
					<img src="/img/logo.png" alt="РосАрт">
				</a>
				<p>@lang('index.footer_desc')</p>
			</div>
			<div class="column cl2">
				<h3 class="hh">@lang('index.catalog')</h3>
				<ul class="footer_nav">
					@isset($categories)
					@foreach($categories as $value)
					@if($value->id)
					
					<li id="active_menu_101"><a class="underscore" href="{{ url('/category',$value->href) }}">{{$value->name}}</a></li>
					@else
					
					@endif
					@endforeach
					@endisset		
				</ul>
			</div>
			<div class="column cl3">
				<h3 class="hh">@lang('index.about_us')</h3>
				<ul class="footer_nav">
					<li id="active_menu_104"><a class="underscore" href="/blog_popular">@lang('index.menu_blog_popular')</a></li>
					<li id="active_menu_105"><a class="underscore" href="/how_buy">@lang('index.menu_how_buy')</a></li>
				</ul>
			</div>
			<div class="column cl4">
				<h3 class="hh">@lang('index.footer_join')</h3>
				<div class="social">
					<a href="{{ $soc->fb }}" target="_blank"><svg class="icon icon-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-facebook"></use></svg></a>
					<a href="{{ $soc->vk }}" target="_blank"><svg class="icon icon-vk"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-vk"></use></svg></a>
				</div>
			</div>
		</div>
		<div class="watermark">
			<a href="http://altsds.com" target="_blank">
				<svg class="icon icon-phone" style="display: inline-block;width: 1em;height: .4em;stroke: currentColor;fill: rgba(255, 255, 255, 0.5);stroke-width: 0;font-size: 10rem;"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ url('/img/logo.svg#icon-logo-link') }}"></use></svg>
			</a>
		</div>
		<div class="footer_copy">© @lang('index.rosart') 2016-{{ date('Y') }}</div>
		<div class="btn_up_wrap"><div class="btn_up"></div></div>
	</div>
</footer>