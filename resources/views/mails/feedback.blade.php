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
								<td style="height: 90px;padding: 0 50px 24px;font-size: 28px; font-family: Helvetica, sans-serif;color: #fff;letter-spacing: .03em;vertical-align: bottom;">Новое обращение!</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<!-- content -->
			<tr>
				<td style="padding:50px;">
					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 100%; font-size: 12px; font-family: Helvetica, sans-serif;line-height: 1.83; color: #646464;border-collapse:collapse;border-spacing:0;letter-spacing: .025em;">
						<tbody>
							<tr>
								<td style="width: 106px; padding: 6px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;">Имя</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;vertical-align: top;">{{ $name }}</td>
							</tr>
							<tr>
								<td style="width: 106px; padding: 6px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;">Телефон</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;vertical-align: top;">{{ $phone }}</td>
							</tr>
							<tr>
								<td style="width: 106px; padding: 6px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;">Email</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;vertical-align: top;">{{ $email }}</td>
							</tr>
							<tr>
								<td style="width: 106px; padding: 6px 10px; border: 1px solid #dfdfdf; color: #1e1e1e;vertical-align: top;">Сообщение</td>
								<td style="padding: 6px 10px; border: 1px solid #dfdfdf;vertical-align: top;">
									{{ $text }}
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>