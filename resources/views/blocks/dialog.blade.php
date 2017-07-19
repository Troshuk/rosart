<div class='dialog_wrapper'>
	<div class='table || main_table'>
		<div class='tcell || main_tcell'>
			<div class='dialog_close || dialog_bg'></div>

			<!-- заказать звонок -->
			<div class="modal_feedback dialog" id="modal_feedback">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<form action="#" class="feedback" >
					<h2 class="title">@lang('index.dialog_title')</h2>
					<p class="mp1">@lang('index.dialog_desc')</p>
					<div class="input_effect">
						<input name="" type="text" class="input" id="name">
						<label class="labels">@lang('index.dialog_question1')</label>
					</div>
					<div class="input_effect">
						<input name="" type="email" class="input" id="email">
						<label class="labels">@lang('index.dialog_question2')</label>
					</div>
					<input name="" type="text" class="input" placeholder="+ _ _ ( _ _ _ ) _ _ _ - _ _ - _ _" id="phone">
					<div class="input_effect">
						<textarea name="" class="input" id="question"></textarea>
						<label class="labels">@lang('index.dialog_question3')</label>
					</div>
					<button class="button btn_wd" id="button_feedback" onclick="feedback(); return false;">@lang('index.dialog_button_call')</button>
				</form>
			</div>

			<!-- успешная подписка -->
			<div class="modal_alert_book dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<span class="ico_check"></span>
				<p>@lang('index.dialog_subscribe')</p>
			</div>

			<div class="modal_success_reg dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<span class="ico_check"></span>
				<p class="modal_txt">@lang('index.dialog_register_success')</p>
			</div>

			@if(!Auth::check())
			<!-- регистрация -->
			<div class="modal_registration dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<form action="#" class="login_form" id="register-form">

					<div class="title">@lang('index.dialog_register')</div>
					<div class="rows">
						<a href="{{ url('/auth/google') }}" class="button btn_fb">Facebook</a>
						<a href="{{ url('/auth/google') }}" class="button btn_gp">Google +</a>
					</div>
					<label class="labels">@lang('index.dialog_name')</label>
					<input type="text" class="input" id="name">
					<label class="labels">@lang('index.dialog_email')</label>
					<input type="email" class="input" id="email">
					<label class="labels">@lang('index.dialog_password')</label>
					<input type="password" class="input" id="password">

					<label class="labels">@lang('index.dialog_password_confirm')</label>
					<input type="password" class="input" id="password_confirmation">

					<button id="register" class="button btn_wd" style="margin: 1.2rem 0 1rem;">@lang('index.dialog_register_button')</button>
					<p class="mp2" id="reg_error">@lang('index.dialog_already_register')</p>
					<div class="tc"><a href="#" class="btn_open_login || underscore_rev">@lang('index.dialog_comein')</a></div>
				</form>
			</div>

			<div class="modal_fail_email dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<span class='icon-fail'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<p class="modal_txt">Пожалуйста, введите корректный email</p>
			</div>

			<div class="modal_alert_mail_isset dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='/img/svgdefs.svg#icon_close'></use></svg></span>
				<span class="ico_check"></span>
				<p class="modal_txt">Вы уже подписаны на рассылку</p>
			</div>					

			<div class="modal_alert_unsubscribe dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='/img/svgdefs.svg#icon_close'></use></svg></span>
				<span class="ico_check"></span>
				<p class="modal_txt">Ваша подписка успешно анулирована</p>
			</div>	

			<!-- вход -->
			<div class="modal_login dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='img/svgdefs.svg#icon_close'></use></svg></span>
				<form action="#" class="login_form" id="login-form">
					
					<div class="title">@lang('index.dialog_signin')</div>
					<div class="rows">
						<a href="{{ url('/auth/facebook') }}" class="button btn_fb">Facebook</a>
						<a href="{{ url('/auth/google') }}" class="button btn_gp">Google +</a>
					</div>
					<label class="labels">@lang('index.dialog_email')</label>
					<input type="email" class="input" id="email">
					<label class="labels">@lang('index.dialog_password')</label>
					<input type="password" class="input" id="password">
					<button  id="login" class="button btn_wd" style="margin: 1.2rem 0 1rem;">@lang('index.dialog_comein')</button>
					<p class="mp2" id="login_error">@lang('index.dialog_not_register') </p>
					<div class="tc"><a href="#" class="btn_open_reg || underscore_rev">@lang('index.dialog_doregister')</a></div>
				</form>
			</div>
			@else
			<div class="modal_login dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				
				
				<div class="title">@lang('index.dialog_signin')</div>
				<p class="mp2" id="reg_error">@lang('index.dialog_already_register')</p>
				
			</div>		

			<div class="modal_registration dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				
				
				<div class="title">@lang('index.dialog_register')</div>
				<p class="mp2" id="reg_error">@lang('index.dialog_already_register')</p>
				
			</div>		
			@endif

			<div class="modal_ dialog">
				<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href="{{ url('img/svgdefs.svg#icon_close') }}"></use></svg></span>
				<p>Modal content</p>
			</div>
		</div>
	</div>
</div>

@section('script')
<script>
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}	

		});

		$("#login-form").on("submit", function(){
   		$('#login').click();
   		return false;
   		})

		$('#login').on('click',function(e){
			e.preventDefault(); 
			var formData = {
				email: $('#login-form #email').val(),
				password: $('#login-form #password').val(),
				_token: $('meta[name="csrf-token"]').attr('content'),
			}
			$.ajax({
				type: "POST",
				url: "/login",
				data: formData,
				dataType: 'JSON',
				success: function (data) {
	           	window.location.replace("http://www.rosart.club/dashboard");
	       	},
       error: function (data) {
       	var i=0;
       	$.each(JSON.parse(data.responseText), function(idx, obj) {
       		i++;
       		if (i==1) {
       			$('input').removeClass('ui-state-error');
       			$("#login-form #"+idx).addClass('ui-state-error');
       			$("#login-form #"+idx).focus();
       			$('#login-form #overlay').remove();
       			$('#login-form #'+idx+'').after('<div id="overlay" ></div>');
       			$('#login-form #overlay').empty().html(obj);
       		}
       	});


       }
   });

		});

	})

	$("#register-form").on("submit", function(){
   		$('#login').click();
   		return false;
   	})
   		
	$('#register').on('click',function(e){
		e.preventDefault(); 
		var formData = {
			name: $('#register-form #name').val(),
			email: $('#register-form #email').val(),
			password: $('#register-form #password').val(),
			password_confirmation: $('#register-form #password_confirmation').val(),
			_token: $('meta[name="csrf-token"]').attr('content'),
		}
		$.ajax({
			type: "POST",
			url: "/register",
			data: formData,
			dataType: 'JSON',
			success: function (data) {
	           	$('#reg_error').empty().html('');

	           	$(".dialog_close").trigger("click");
		        $('.modal_success_reg').dialog();

		        setTimeout(function() {
		            $('.modal_success_reg').hide(300);
		        }, 4000);        

		        setTimeout(function() {
		            $(".dialog_close").trigger("click");
		        }, 4400);
	       },
	       error: function (data) {
		       	var i = 0;
		       	$.each(JSON.parse(data.responseText), function(idx, obj) {
		       		i++;
		       		if (i==1) {
		       			$('input').removeClass('ui-state-error');
		       			$("#register-form #"+idx).addClass('ui-state-error');
		       			$("#register-form #"+idx).focus();
		       			$('#register-form #overlay').remove();
		       			$('#register-form #'+idx+'').after('<div id="overlay" ></div>');
		       			$('#register-form #overlay').empty().html(obj);
		       		}
		       	});
       		}
   });

	});

	function logout(){
		$.ajax({
			type: "POST",
			url: "/logout",
			data: {},
			success: function (data) {   
				location.reload();
			},
			error: function (data) {

			}
		});

	};


	function setLang(lang){

		$.ajax({
			type: "POST",
			url: "/lang",
			data: {"lang":lang},
			success: function (data) {   
				location.reload();
				//alert(data);
			},
			error: function (data) {

			}
		});

	};



	
</script>