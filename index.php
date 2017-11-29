<!DOCTYPE html>
<html>

<head>
	<title>PS2 Project</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	    crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1>PS2 Final Project</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<select class="form-control" id="db">
						<option>Users</option>
						<option>Products</option>
						<option>User-Products</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<button class="btn btn-primary" id="select_db">Pokaż zawartość tabeli</button>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="query">
				</div>
			</div>
			<div class="col-sm-6">
				<button class="btn btn-primary" id="select_db">Wyślij zapytanie</button>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	    crossorigin="anonymous"></script>


	<script type="text/javascript">
		jQuery(function ($) {
			// Websocket
			var websocket_server = new WebSocket("ws://localhost:8089/");

			websocket_server.onopen = function (e) {
				websocket_server.send(
					JSON.stringify({

					})
				);
			};
			websocket_server.onerror = function (e) {}

			websocket_server.onmessage = function (e) {
				var json = JSON.parse(e.data);
			}
		});
	</script>
</body>

</html>