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
								<td style="height: 90px;padding: 0 50px 24px;font-size: 28px; font-family: Helvetica, sans-serif;color: #fff;letter-spacing: .03em;vertical-align: bottom;">Новый заказ!</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<!-- content -->
			<tr>
				<td style="padding:38px 50px 50px;">

					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 100%; font-size: 15px; font-family: Helvetica, sans-serif;line-height: 1.67; color: #646464;border-collapse:collapse;border-spacing:0;letter-spacing: .025em;">
						<tbody>
							<tr><td><strong>ID заказа:</strong> {{ $order->id }}</td></tr>
							<tr><td><strong>ID клиента:</strong> {{ $user->id }}</td></tr>
							<tr><td><strong>Имя:</strong> {{ $user->name }}</td></tr>
							<tr><td><strong>Телефон:</strong> {{ $user->phone }}</td></tr>
							<tr><td><strong>Email:</strong> {{ $user->email }}</td></tr>
							<tr><td><strong>Валюта:</strong> {{ $order->price }}</td></tr>
							<tr><td><strong>Язык:</strong> {{ $order->lang }}</td></tr>
						</tbody>
					</table>

					<hr style="margin: 25px 0; border: none; border-top: 1px solid #dfdfdf;">

					<span style="display: block;margin-bottom: 20px;font-size: 18px;line-height: 1.39; color: #1e1e1e;">Товары в заказе (3)</span>

					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 100%; font-size: 12px; font-family: Helvetica, sans-serif;line-height: 1.83; color: #1e1e1e;border-collapse:collapse;border-spacing:0;letter-spacing: .025em;">
					<thead>
						<tr>
							<th style="padding: 6px 10px; border: 1px solid #dfdfdf;">ID товара</th>
							<th style="padding: 6px 10px; border: 1px solid #dfdfdf;">Наименование товара</th>
							<th style="padding: 6px 10px; border: 1px solid #dfdfdf;">Цена RUB</th>
							<th style="padding: 6px 10px; border: 1px solid #dfdfdf;">Цена EUR</th>
						</tr>
					</thead>
						<tbody>
							@foreach($orderProducts as $orderProduct)										
								<tr>
									<td style="padding: 12px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;text-align: center;">{{ $orderProduct->id }}</td>
									<td style="padding: 12px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;">
										<table border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td style="width: 50px;vertical-align: top;"><img src="http://rosart.club/{{ $orderProduct->img }}" alt="{{ $orderProduct->name_ru }}" style="display: block;width: 40px;"></td>
													<td style="vertical-align: top;">{{ $orderProduct->name_ru }}</td>
												</tr>
											</tbody>
										</table>
									</td>
									<td style="padding: 12px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;text-align: center;">{{ $orderProduct->price_rub }}</td>
									<td style="padding: 12px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;text-align: center;">{{ $orderProduct->price_eur }}</td>
								</tr>
							@endforeach
							<!-- product item -->
							<tr>
								<td colspan="3" style="padding: 6px 10px; border: 1px solid #dfdfdf;color: #1e1e1e;text-align: right;">Итого в RUB:</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;text-align: center;">{{ $sum_rub }}</td>
							</tr>
							<tr>
								<td colspan="3" style="padding: 6px 10px; border: 1px solid #dfdfdf;color: #1e1e1e;text-align: right;">Итого в EUR:</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;text-align: center;">{{ $sum_eur }}</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>










