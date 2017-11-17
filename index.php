<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.js" type="text/javascript"></script>
</head>
<body>
	<script type="text/javascript">
		jQuery(function($){
			// Websocket
			var websocket_server = new WebSocket("ws://localhost:8080/");
			
			websocket_server.onopen = function(e) {
				websocket_server.send(
					JSON.stringify({

					})
				);
			};
			websocket_server.onerror = function(e) {
			}

			websocket_server.onmessage = function(e)
			{
				var json = JSON.parse(e.data);
			}
		});
	</script>
</body>
</html>