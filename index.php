<?php
session_start();
?>
<html>

<head>
	<meta charset="utf-8" />
	<title>App Mail Send</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

	<div class="container">

		<div class="py-3 text-center">
			<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
			<h1>Send Mail</h1>
			<p class="lead">Your app to send emails! </p>
		</div>

		<hr class="my-4">
		<?php if ($_SESSION['cod_status'] == 1) : ?>
			<div class="alert alert-success" role="alert">
				<p>Message has been sent</p>
			</div>
		<?php elseif ($_SESSION['cod_status'] == 0) : ?>
			<div class="alert alert-danger" role="alert">
				<p>Message could not be sent</p>
			</div>
		<?php endif; ?>


		<?php
		$_SESSION['cod_status'] = "";
		?>
		<div class="row">
			<div class="col-md-12">

				<div class="card-body font-weight-bold">
					<form action="data/process.php" method="post">
					<div class="mb-2">
							<label for="to">To</label>
							<input type="text" name="to" class="form-control" id="para" placeholder="john@domain.com.br">
						</div>

						<div class="mb-2">
							<label for="subject">Subject</label>
							<input type="text" name="subject" class="form-control" id="assunto" placeholder="Subject of the email">
						</div>

						<div class="mb-4">
							<label for="message">Message</label>
							<textarea class="form-control" name="message" id="message"></textarea>
						</div>

						<input type="hidden" name="type" value="sendMail">
						<button type="submit" class="btn btn-primary btn-lg">Send Message</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>