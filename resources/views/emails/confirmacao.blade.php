<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirmação de email</title>
<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
                                        <p>Olá, {{ $nome }}</p>
                                        <p>Você foi cadastrado no serviço de manutenção <span>JuLab</span>.</p>
                                        <p>Pelo técnico <b>{{ $fornecedor }}</b></p>
									</td>
                                </tr>
                                <tr>
                                    <p>Para a verificação de seus serviços utilize o nome: <b>{{ $nome }}</b>, conforme foi cadastrado no sistema.</p>
                                </tr>
								<tr>
									<td class="content-block">
										É importante que você confirme sua inscrição para que possamos te enviar as atualizações e informações de todos os seus serviços.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<button class="btn btn-primary">CONFIRMAR MEU CADASTRO</button>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										&mdash; 
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block">Follow <a href="https://twitter.com/DenisrsCam">@DenisCam</a> on Twitter.</td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>