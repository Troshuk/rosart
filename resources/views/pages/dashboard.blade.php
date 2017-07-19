@extends('index')
@section('content')
<div class="mosaic" style="background-image: url(img/product_top_bg.jpg);">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<li><a class="underscore" href="{{ url('/') }}">@lang('index.menu_general')</a></li>
			<li><span>@lang('index.dashboard')</span></li>
		</ul>
	</div>
</div>
<section class="dashboard">
	<div class="wrapper">
		<h1 class="title">@lang('index.dashboard')</h1>
		<div class="tab_wrapper">
			<ul class="tab_menu || dashboard_head">
				<li class="button active"><span>@lang('index.dashboard_detail')</span><i class="ic_dir_arrow"></i></li>
				<li class="button"><span>@lang('index.dashboard_orders')</span><i class="ic_dir_arrow"></i></li>
			</ul>

			<div class="tab_content || dashboard_body">
				<!-- мои данные -->
				<div class="tab_item">
					<form action="#" class="dashboard_form" id="dashboard_form">
						<label class="labels">@lang('index.dashboard_name')</label><input type="text" class="input" id="name" value="{{$user->name}}">
						<label class="labels">@lang('index.dialog_question2')</label><input type="email" class="input" id="email" value="{{$user->email}}">
						<label class="labels">@lang('index.dialog_phone')</label><input type="text" class="input" id="phone" value="{{$user->phone}}">
						@if(!isset($user->auth_via))
							<label class="labels">@lang('index.dashboard_new_passwd')</label><input type="password" class="input" placeholder="" id="password" >
							<button class="button btn_1" id="change_passwd">@lang('index.dashboard_change_passwd')</button><br/><br/>
						@endif
						<button class="button || btn_wd" id="change_all">@lang('index.dashboard_apply')</button>
					</form>
				</div>
				<!-- мои заказы -->
				<div class="tab_item">

					<!-- если есть заказы - выводится таблица -->
					<table class="table_product || table_res">
						<thead>
							<tr>
								<th>Наименование товара</th>
								<th>Дата заказа</th>
								<th>Статус</th>
							</tr>
						</thead>
						<tbody>
						

							@isset($cart)
							@foreach($cart as $key=>$value)
							@if($value->href)
							<tr>
								<td class="td_product" data-title="@lang('index.cart_product_name')">
									<div class="td_mob">
										<a href="{{ url('/product',$value->href) }}">
											<div class="item"><div class="img" style="background-image: url({{url($value->img)}});"></div></div>							
											<div class="item">
												<h4 class="tt">{{$value->name}}</h4>
												<div class="price">{{$value->price}} {{ $currency }}</div>
											</div>
										</a>
									</div>
								</td>
								<td data-title="Дата заказа">
									<div class="td_mob">
										<p>{{ $value->created_at->format('d.m.Y') }}</p>
									</div>
								</td>
								<td data-title="Статус">
									<div class="td_mob">
										<p>{{$value->status_name}}</p>
										<!--<button class="btn_follow_prod || underscore">@lang('index.dashboard_track')</button>-->
									</div>
								</td>
							</tr>
							@else
							@endif
							@endforeach
							@endisset




						</tbody>
					</table>

					<!-- если заказов нет -->

					<div class="no_orders" style="display: none;">
						<p>@lang('index.dashboard_clear')</p>
						<a href="#" class="button"><span>@lang('index.dashboard_go')</span> <i class="ic_dir_arrow"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
//$('.dialog_close').dialog('close');

$('#change_passwd').on('click',function(e){
	e.preventDefault(); 
	var formData = {
		'action':'change_passwd',
		'password': $('#dashboard_form #password').val(),
		'_token': $('meta[name="csrf-token"]').attr('content'),
	}
	$.ajax({
		type: "POST",
		url: "/dashboard",
		data: formData,
		dataType: 'html',
		success: function (data) {
			$('input').removeClass('ui-state-error');

				//location.reload();
				$('.dialog_close').trigger('click');	
				$('.modal_alert_book').dialog();
				$('.modal_alert_book').empty().html(data);
				//$('.modal_ p').empty().html(data)
			},
			error: function (data) {
				var i=0;
				$.each(JSON.parse(data.responseText), function(idx, obj) {
					i++;
					if (i==1) {
						$('input').removeClass('ui-state-error');
						$("#dashboard_form #"+idx).addClass('ui-state-error');
						$("#dashboard_form #"+idx).focus();
						$('#dashboard_form #overlay').remove();
						$('#dashboard_form #'+idx+'').after('<div id="overlay" ></div>');
						$('#dashboard_form #overlay').empty().html(obj);
					}
				});
			}
		});
});



$('#change_all').on('click',function(e){
	e.preventDefault(); 
	var formData = {
		'action':'change_all',
		'name': $('#dashboard_form #name').val(),
		'phone': $('#dashboard_form #phone').val(),
		'email': $('#dashboard_form #email').val(),
		'_token': $('meta[name="csrf-token"]').attr('content'),
	}
	$.ajax({
		type: "POST",
		url: "/dashboard",
		data: formData,
		dataType: 'html',
		success: function (data) {
			$('input').removeClass('ui-state-error');

				//location.reload();
				$('.dialog_close').trigger('click');	
				$('.modal_alert_book').dialog();
				$('.modal_alert_book').empty().html(data);
				//$('.modal_ p').empty().html(data)
			},
			error: function (data) {
				var i=0;
				$.each(JSON.parse(data.responseText), function(idx, obj) {
					i++;
					if (i==1) {
						$('input').removeClass('ui-state-error');
						$("#dashboard_form #"+idx).addClass('ui-state-error');
						$("#dashboard_form #"+idx).focus();
						$('#dashboard_form #overlay').remove();
						$('#dashboard_form #'+idx+'').after('<div id="overlay" ></div>');
						$('#dashboard_form #overlay').empty().html(obj);
					}
				});
			}
		});
});
</script>
@endsection