<header class="header">
	<div class="header_top">
		<div class="wrapper">
			<div class="navigation_btn"><span></span></div>
			<a href="/" class="header_logo"><img src="/img/logo.png" alt="@lang('index.gallery_name')"></a>

			<ol class="header_right">
				@if(!Auth::check())
					<li><a href="#" onclick="$('.modal_login').dialog();return false;"><svg class="icon icon-login"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-login"></use></svg></a></li>
					<li><a href="#" onclick="$('.modal_registration').dialog();return false;"><svg class="icon icon-user"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-user"></use></svg></a></li>
					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{App::getLocale()}} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if(!App::isLocale('ru'))
								<a href="{{ url('/setlocale/ru') }}">Ru</a>
							@endif
							@if(!App::isLocale('en'))
								<a href="{{ url('/setlocale/en') }}">En</a>
							@endif							
						</div>
					</li>
					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{ $currency }} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if($currency != 'rub')
								<a href="{{ url('/setcurrency/rub') }}">Rub</a>
							@endif
							@if($currency != 'eur')
								<a href="{{ url('/setcurrency/eur') }}">Eur</a>
							@endif							
						</div>
					</li>
					<li class="cart"><a href="#" onclick="$('.modal_login').dialog();return false;"><svg class="icon icon-cart"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-cart"></use></svg></a></li>
				@else 
					<li><a href="{{ url('/dashboard')}}" ><svg class="icon icon-user"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-user"></use></svg></a></li>
					<li><a href="#" onclick="javascript:logout();return false;"><svg class="icon icon-login"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-login"></use></svg></a></li>
					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{App::getLocale()}} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if(!App::isLocale('ru'))
								<a href="{{ url('/setlocale/ru') }}">Ru</a>
							@endif
							@if(!App::isLocale('en'))
								<a href="{{ url('/setlocale/en') }}">En</a>
							@endif							
						</div>
					</li>
					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{ $currency }} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if($currency != 'rub')
								<a href="{{ url('/setcurrency/rub') }}">Rub</a>
							@endif
							@if($currency != 'eur')
								<a href="{{ url('/setcurrency/eur') }}">Eur</a>
							@endif							
						</div>
					</li>
					<li class="cart"><a href="{{ url('/cart') }}"><svg class="icon icon-cart"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-cart"></use></svg></a></li>
					@if (Auth::user()->is_admin)
						<li class="tooltip_wr">
							<a href="{{ url('/admin') }}">
								<svg class="icon icon-pencil"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-pencil"></use></svg>
							</a>
						</li>
					@endif
				@endif
				
			</ol>
		</div>
	</div>
	<div class="navigation_wrap">
		<div class="wrapper">
			<nav class="navigation">
				<ol class="nav_btns">
					@if(!Auth::check())
					<li><a href="#" onclick="$('.modal_login').dialog();return false;"><svg class="icon icon-login"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-login"></use></svg></a></li>
					<li><a href="#" onclick="$('.modal_registration').dialog();return false;"><svg class="icon icon-user"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-user"></use></svg></a></li>
					@else 
					<li><a href="#" onclick="javascript:logout();return false;"><svg class="icon icon-login"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-login"></use></svg></a></li>
					<li><a href="{{ url('/dashboard')}}" ><svg class="icon icon-user"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-user"></use></svg></a></li>
					@endif

					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{App::getLocale()}} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if(!App::isLocale('ru'))
								<a href="{{ url('/setlocale/ru') }}">Ru</a>
							@endif
							@if(!App::isLocale('en'))
								<a href="{{ url('/setlocale/en') }}">En</a>
							@endif							
						</div>
					</li>
					<li class="header_lang || js_DropWrap">
						<div class="ttl || js_DropBtn">{{ $currency }} <i class="ic_arrow"></i></div>
						<div class="box || js_DropBox">
							@if($currency != 'rub')
								<a href="{{ url('/setcurrency/rub') }}">Rub</a>
							@endif
							@if($currency != 'eur')
								<a href="{{ url('/setcurrency/eur') }}">Eur</a>
							@endif							
						</div>
					</li>
				</ol>
				<form action="{{ url('/search')}}" class="header_search" method="GET">
				{{ csrf_field() }}
					<input type="text" class="input" placeholder="@lang('index.search')" name="search">
					<button><svg class="icon icon-search"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/svgdefs.svg#icon-search"></use></svg></button>
				</form>
				<ul>
					<li id="active_menu_1"><a href="{{ url('/about') }}">@lang('index.menu_about')</a></li>
					<li id="active_menu_2"><a href="{{ url('/masters') }}">@lang('index.menu_masters')</a></li>
					<li id="active_menu_3" class="dropDown">
						<a href="/catalog">@lang('index.catalog') <i class="ic_arrow"></i></a>
						<ul class="navigation_dropDown">
							@isset($categories)
								@foreach($categories as $value)
									@if($value->id)
										<li><a href="{{ url('/catalog',$value->href) }}">{{$value->name}}</a></li>
									@endif
								@endforeach
							@endisset		
						</ul>
					</li>
					<li id="active_menu_4"><a href="{{ url('/blog') }}">@lang('index.menu_blog')</a></li>
					<li id="active_menu_5"><a href="{{ url('/contacts') }}">@lang('index.menu_contacts')</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="dark_overlay"></div>
</header>


