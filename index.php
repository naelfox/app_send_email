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
			<h2>Send Mail</h2>
			<p class="lead">Your app to send emails! </p>
		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="card-body font-weight-bold">
					<form action="sendProcess.php" method="post">
						<div class="form-group">
							<label for="to">To</label>
							<input type="text" name= "to"class="form-control" id="para" placeholder="john@domain.com.br">
						</div>

						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" name="subject" class="form-control" id="assunto" placeholder="Subject of the email">
						</div>

						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" name="message" id="message"></textarea>
						</div>

						<button type="submit" class="btn btn-primary btn-lg">Send Message</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>