<span class='dialog_close || icon_close'><svg class='icon'><use xlink:href='img/svgdefs.svg#icon_close'></use></svg></span>
<form action="#" class="login_form" id="formpostcheckout">
	<div class="title">@lang('index.cart_summ') {{$cartsumm}} <span class="price_currency">{{$currency}}</span></div>
	<label class="labels">@lang('index.dialog_phone')</label>
	<input type="number" class="input" value="{{$user->phone}}" id="phone" required>
	<span id="orderPhoneError"></span>
	<label class="labels">@lang('index.adress')</label>
	<textarea type="text" class="input" placeholder="" id="address" required>{{$user->address}}</textarea>
	<span id="orderAddressError"></span>
	<button id="postcheckout" class="button || btn_wd" style="margin: 1.2rem 0 1rem;">@lang('index.cart_checkout')</button>
</form>

<script>
$('.dialog_close').dialog('close');

	$('#postcheckout').on('click',function(e){
		e.preventDefault(); 
		var r_phone = /^[\d\s\+\-]{5,20}$/;
		var address = $('#formpostcheckout #address').val()
	    var phone = $('#formpostcheckout #phone').val();
	    if (r_phone.test(phone)) {
			if (address.length > 1) {
				var formData = {
					action:"postcheckout",
					_token: $('meta[name="csrf-token"]').attr('content'),
					phone: $('#formpostcheckout #phone').val(),
					address: $('#formpostcheckout #address').val()
				}
				$.ajax({
					type: "POST",
					url: "/checkout",
					data: formData,
					dataType: 'html',
					success: function (data) {
						$('.dialog_close').trigger('click');	
						$('.modal_alert_book').dialog();
						$('.modal_alert_book').empty().html(data);

						setTimeout(function() {
							location.reload();
						}, 3000);
					}
				});
	            document.getElementById("phone").className = "input";
	            document.getElementById("address").className = "input";
	        } else {
			    $("#address").addClass("fail");
			    $("#orderAddressError").html("@lang('index.address_error')");
			}
	   	} else {
		    document.getElementById("address").className = "input";
		    $("#orderAddressError").html("");
		    $("#phone").addClass("fail");
		    $("#orderPhoneError").html("@lang('index.phone_error')");
	    }

	});

</script>				