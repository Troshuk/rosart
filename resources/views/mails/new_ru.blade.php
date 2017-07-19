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
					<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;background: #e74c3c url(http://rosart.club/img/mail_bg_lg.jpg) center no-repeat; background-color: #e74c3c;box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.19);">
						<tbody>
							<tr>
								<td style="padding: 16px 50px;background-color: rgba(32, 32, 32,.2);">
									<img src="http://rosart.club/img/mail_logo.png" alt="РосАрт" style="vertical-align: middle;">
									<span style="display: inline-block;margin-left: 20px;font-size: 12px;font-family: Helvetica, sans-serif;color: #fff;opacity: .4;vertical-align: middle;letter-spacing: .025em;">Искусство русских мастеров</span>
								</td>
							</tr>
							<tr>
								<td style="height: 206px;padding: 5px 50px;font-size: 28px; font-family: Helvetica, sans-serif;color: #fff;letter-spacing: .03em;vertical-align: middle;">{{ $new->name }}</td>
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
						<tr><td style="padding: 30px 0 20px;"><img src="http://rosart.club/{{ $new->img }}" alt="{{ $new->name }}" style="width: 100%"></td></tr>
							<tr><td style="padding: 10px 0;">{!! $new->text !!}</td></tr>

							<tr><td style="padding: 32px 0 50px;"><a href="http://rosart.club/article/{{ $new->href }}" target="_blank" style="display: inline-block; padding: 11px 48px;font-size: 15px; font-family: Helvetica, sans-serif;background-color: #e74c3c;color: #fff;text-decoration: none; text-transform: uppercase;"><span>Читать статью</span><img src="http://rosart.club/img/mail_arrow.png" alt="arrow" style="margin-left: 7px;"></a></td></tr>
							<tr><td style="padding: 10px 0 22px; border-top: 1px solid #dfdfdf;font-size: 11px;line-height: 1.64; letter-spacing: .025em;">Вы получили это сообщение, поскольку являетесь подписчиком на новости. Если Вы не хотите получать такие сообщения, отмените <a href="http://rosart.club/unsubscribe/{{ $email->hash }}" target="_blank" style="font-size: 11px; font-family: Helvetica, sans-serif; color: #e74c3c;text-decoration: none;">подписку</a>.</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			
		</tbody>
	</table>
</body>
</html>