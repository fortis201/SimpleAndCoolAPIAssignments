<html>
<head>
	<title>Google Directions API</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('form').submit(function() {
				$('#directions').html("");
				$.post($(this).attr('action'), $(this).serialize(), function(res) {
					// console.log(res);
					var info = res.routes[0].legs[0].steps;
					var i=0;
					$('#directions').append("<ol>");
					for(i in info) {
						$('#directions').append("<li>"+res.routes[0].legs[0].steps[i]['html_instructions']+"</li>");						
						i++;
					}
					$('#directions').append("</ol>");
				})
				return false;
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<form action="/main/directions" method="post">
		<label for='origin'><h2>From: </h2></label>
		<input type="text" name="origin" id="origin">
		<label for='destination'><h2>To: </h2></label>
		<input type="text" name="destination" id="destination">
		<input type="submit" value="Get directions!">
		</form>
		<div id="directions">
			<!-- <ol id="directions"> </ol> -->
		</div>
	</div>
</body>
</html>