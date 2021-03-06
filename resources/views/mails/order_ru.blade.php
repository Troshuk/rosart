<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html">
	<title>Email</title>
</head>
<body style="padding: 0;margin: 0;background-color: #fff;">
	<table border="0" cellpadding="0" cellspacing="0" style="width: 580px;padding: 0;margin: 0 auto;font-family: Helvetica, sans-serif;background-color: #fff;">
		<tbody>
			<!-- head -->
			<tr>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;background: #e74c3c url(http://rosart.club/img/mail_bg.jpg) center no-repeat; background-color: #e74c3c;box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.19);">
						<tbody>
							<tr>
								<td style="padding: 16px 50px;background-color: rgba(32, 32, 32,.2);">
									<img src="http://rosart.club/img/mail_logo.png" alt="РосАрт" style="vertical-align: middle;">
									<span style="display: inline-block;margin-left: 20px;font-size: 12px;font-family: Helvetica, sans-serif;color: #fff;opacity: .4;vertical-align: middle;letter-spacing: .025em;">Искусство русских мастеров</span>
								</td>
							</tr>
							<tr>
								<td style="height: 90px;padding: 0 50px 24px;font-size: 28px; font-family: Helvetica, sans-serif;color: #fff;letter-spacing: .03em;vertical-align: bottom;">Ваш заказ принят</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<!-- content -->
			<tr>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; padding: 20px 50px;font-size: 15px; font-family: Helvetica, sans-serif;line-height: 1.67; color: #646464;">
						<tbody>
							<tr><td style="padding: 16px 0 10px;">Здравствуйте, {{ $user->name }}!</td></tr>
							<tr><td style="padding: 10px 0;">Благодарим Вас за покупку на Росарт!</td></tr>
							<tr><td style="padding: 10px 0;">В блийшее время Ваш заказ №{{ $order->id }} будет принят в обработку.</td></tr>
							<tr><td style="padding: 10px 0 30px;">Вы можете отследить статус своего заказа в <a href="http://rosart.club/dashboard" target="_blank" style="font-size: 15px; font-family: Helvetica, sans-serif; color: #e74c3c; text-decoration: none;">личном кабинете</a>.</td></tr>

							<!-- table products -->
							<tr><td style="padding: 30px 0 10px; font-size: 18px;line-height: 1.39; color: #1e1e1e; border-top: 1px solid #dfdfdf">Товары в заказе ({{ count($orderProducts) }})</td></tr>

							<tr>
								<td style="padding: 10px 0;">
									<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
										<tbody>
											@foreach($orderProducts as $orderProduct)
												<tr>
													<td style="width: 90px; padding: 8px 12px 8px 0; vertical-align: top;"><img src="http://rosart.club/{{ $orderProduct->img }}" alt="{{ $orderProduct->name }}" style="width: 90px;"></td>
													<td style="padding: 12px 0 8px; vertical-align: top;">
														<span style="display: block;font-size: 12px;font-family: Helvetica, sans-serif;color: #1e1e1e;">{{ $orderProduct->name }}</span>
														<span style="display: block;font-size: 12px;font-family: Helvetica, sans-serif;color: #585858;">{{ $orderProduct->price }} {{ $currency }}</span>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</td>
							</tr>

							<tr><td style="padding: 5px 0 30px; font-size: 14px;font-family: Helvetica, sans-serif;color: #1e1e1e; border-bottom: 1px solid #dfdfdf"">Итого: {{ $summ }} {{ $currency }}</td></tr>

							<tr><td style="padding: 30px 0 15px;">Если у Вас возникли вопросы, мы с радостью ответим на них по телефону <a href="tel:{{ $contact->phone }}" target="_blank" style="font-size: 15px; font-family: Helvetica, sans-serif; color: #e74c3c; text-decoration: none; letter-spacing: .03em;">{{ $contact->phone }}</a>.</td></tr>
							<tr><td style="padding: 10px 0 25px;">С уважением, команда Росарт!</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>









